<?php
require_once 'wp-content/themes/dxw-advisories/lib/api/json_inspections_finder.class.php';

describe('\\DxwSec\\API\\InspectionsController', function () {
    afterEach(function () {
        \Mockery::close();
    });

    class JSONInspectionsFinderScope extends Peridot\Scope\Scope
    {
        public function fakeInspectionsFinder($result)
        {
            return \Mockery::mock('\\DxwSec\\API\\InspectionsFinder')
                ->shouldReceive('find')
                ->andReturn($result)
                ->getMock();
        }
    }

    // Factory for creating doubles for the kind of inspections that get returned
    // from a WP_Query search for inspections
    class InspectionScope extends Peridot\Scope\Scope
    {
        public function fakeInspection(array $args)
        {
            $name = $args['name'];
            $slug = $args['slug'];
            $versions = $args['versions'];
            $url = $args['url'];
            $date = $args['date'];
            $result = $args['result'];

            $id = rand(1000, 9999);

            $inspection = \Mockery::mock('\\DxwSec\\API\\Inspection');
            $inspection->name = $name;
            $inspection->slug = $slug;
            $inspection->shouldReceive('versions')
                ->andReturn($versions);
            $inspection->date = $date;
            $inspection->shouldReceive('url')
                ->andReturn($url);
            $inspection->shouldReceive('result')
                ->andReturn($result);

            return $inspection;
        }
    }

    $this->peridotAddChildScope(new InspectionScope);
    $this->peridotAddChildScope(new JSONInspectionsFinderScope);

    describe('->find()', function () {
        it('returns an array corresponding to the returned inspections', function () {
            $inspections = array(
                $this->fakeInspection(array(
                    'name' => 'Advanced Custom Fields: Table Field',
                    'slug' => 'advanced-custom-fields-table-field',
                    'versions' => '1.2.0',
                    'url'  => 'https://security.dxw.com/plugins/advanced-custom-fields-table-field2/',
                    'date' => new DateTime('2016-09-01 14:00:17.000000'),
                    'result' => 'use with caution',
                )),
                $this->fakeInspection(array(
                    'name' => 'Advanced Custom Fields: Table Field',
                    'slug' => 'advanced-custom-fields-table-field',
                    'versions' => '1.1.0,1.1.1',
                    'url'  => 'https://security.dxw.com/plugins/advanced-custom-fields-table-field/',
                    'date' => new DateTime('2016-07-13 17:44:23.000000'),
                    'result' => 'no issues found'
                ))
            );

            $inspection_output = array(
                array(
                    'name' => 'Advanced Custom Fields: Table Field',
                    'slug' => 'advanced-custom-fields-table-field',
                    'versions' => '1.2.0',
                    'date' => '2016-09-01T14:00:17+00:00',
                    'url'  => 'https://security.dxw.com/plugins/advanced-custom-fields-table-field2/',
                    'result' => 'use with caution',
                ),
                array(
                    'name' => 'Advanced Custom Fields: Table Field',
                    'slug' => 'advanced-custom-fields-table-field',
                    'versions' => '1.1.0,1.1.1',
                    'date' => '2016-07-13T17:44:23+00:00',
                    'url'  => 'https://security.dxw.com/plugins/advanced-custom-fields-table-field/',
                    'result' => 'no issues found',
                )
            );

            $finder = $this->fakeInspectionsFinder($inspections);
            $json_finder = new \DxwSec\API\JSONInspectionsFinder($finder);
            $result = $json_finder->find('advanced-custom-fields-table-field');
            expect($result)->to->equal($inspection_output);
        });

        it('calls an inspections finder with the given slug', function () {
            $finder = \Mockery::mock('\\DxwSec\\API\\InspectionsFinder')
                ->shouldReceive('find')
                ->with('my-awesome-plugin')
                ->once()
                ->andReturn([])
                ->getMock();
            $json_finder = new \DxwSec\API\JSONInspectionsFinder($finder);
            $json_finder->find('my-awesome-plugin');
        });

        context('when there are no matching inspections', function () {
            it('returns an empty array', function () {
                $finder = $this->fakeInspectionsFinder([]);
                $json_finder = new \DxwSec\API\JSONInspectionsFinder($finder);
                $result = $json_finder->find('slug-with-no-matches');
                expect($result)->to->equal([]);
            });
        });
    });
});

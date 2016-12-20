<?php
require 'wp-content/themes/dxw-advisories/lib/api/inspections_controller.class.php';

describe('\\DxwSec\\API\\InspectionsController', function () {
    class ControllerScope extends Peridot\Scope\Scope
    {
        public function fake_json_inspections_finder($result)
        {
            return \Mockery::mock('\\DxwSec\\API\\JSONInspectionsFinder')
                ->shouldReceive('find')
                ->andReturn($result)
                ->getMock();
        }
    }

    $this->peridotAddChildScope(new ControllerScope);

    describe('->show()', function () {
        it('returns a list of inspections matching the slug', function () {
            $inspection = array(
                'name' => 'Advanced Custom Fields: Table Field',
                'slug' => 'advanced-custom-fields-table-field',
                'date' => '2016-07-13T17:44:23',
                'url'  => 'https://security.dxw.com/plugins/advanced-custom-fields-table-field/',
                'result' => 'use with caution',
            );
            $controller = new \DxwSec\API\InspectionsController($this->fake_json_inspections_finder([$inspection]));
            $params = new FakeParams(array('slug' => 'my-awesome-plugin'));
            $result = $controller->show($params);
            expect($result)->to->equal([$inspection]);
        });

        it('calls a finder object with the slug', function () {
            $finder = \Mockery::mock('\\DxwSec\\API\\JSONInspectionsFinder')
                ->shouldReceive('find')
                ->once()
                ->with('my-awesome-plugin')
                ->getMock();
            $controller = new \DxwSec\API\InspectionsController($finder);
            $params = new FakeParams(array('slug' => 'my-awesome-plugin'));
            $controller->show($params);
        });

        context('when there are no matching inspections', function () {
            it('returns an empty array', function () {
                $controller = new \DxwSec\API\InspectionsController($this->fake_json_inspections_finder([]));
                $params = new FakeParams(array('slug' => 'foo'));
                $result = $controller->show($params);
                expect($result)->to->equal([]);
            });
        });
    });


    class FakeParams
    {
        public function __construct(array $url_params)
        {
            $this->url_params = $url_params;
        }

        public function get_url_params()
        {
            return $this->url_params;
        }
    }
});

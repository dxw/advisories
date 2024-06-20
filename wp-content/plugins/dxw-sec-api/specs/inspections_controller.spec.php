<?php
require 'lib/InspectionsController.php';
require 'lib/JSONInspectionsFinder.php';

describe('\\DxwSec\\API\\InspectionsController', function () {
    beforeEach(function () {
        $this->fakeJsonInspectionsFinder = function ($result) {
            return \Mockery::mock('\\DxwSec\\API\\JSONInspectionsFinder')
                ->shouldReceive('find')
                ->andReturn($result)
                ->getMock();
        };

        $this->fakeParams = function ($url_params) {
            return \Mockery::mock()
                ->shouldReceive('get_url_params')
                ->andReturn($url_params)
                ->getMock();
        };
    });

    describe('->show()', function () {
        it('returns a list of inspections matching the slug', function () {
            $inspection = array(
                'name' => 'Advanced Custom Fields: Table Field',
                'slug' => 'advanced-custom-fields-table-field',
                'date' => '2016-07-13T17:44:23',
                'url'  => 'https://security.dxw.com/plugins/advanced-custom-fields-table-field/',
                'result' => 'use with caution',
            );
            $controller = new \DxwSec\API\InspectionsController($this->fakeJsonInspectionsFinder([$inspection]));
            $params = $this->fakeParams(array('slug' => 'my-awesome-plugin'));
            $result = $controller->show($params);
            expect($result)->toBe([$inspection]);
        });

        it('calls a finder object with the slug', function () {
            $finder = \Mockery::mock('\\DxwSec\\API\\JSONInspectionsFinder')
                ->shouldReceive('find')
                ->once()
                ->with('my-awesome-plugin')
                ->getMock();
            $controller = new \DxwSec\API\InspectionsController($finder);
            $params = $this->fakeParams(array('slug' => 'my-awesome-plugin'));
            $controller->show($params);
        });

        context('when there are no matching inspections', function () {
            it('returns an empty array', function () {
                $controller = new \DxwSec\API\InspectionsController($this->fakeJsonInspectionsFinder([]));
                $params = $this->fakeParams(array('slug' => 'foo'));
                $result = $controller->show($params);
                expect($result)->toBe([]);
            });
        });
    });
});

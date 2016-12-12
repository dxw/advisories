<?php
include(__DIR__.'/api/json_inspections_finder.class.php');
include(__DIR__.'/api/inspections_controller.class.php');

add_action( 'rest_api_init', function () {
    $slug_regex = '[a-z0-9]+(?:-[a-z0-9]+)*';
    $finder = new \DxwSec\API\InspectionsFinder();
    $json_finder = new \DxwSec\API\JSONInspectionsFinder($finder);
    $controller = new \DxwSec\API\InspectionsController($json_finder);
    register_rest_route( 'v1', 'inspections/(?P<slug>'.$slug_regex.')', array(
        'methods' => 'GET',
        'callback' => array($controller, 'show'),
    ) );
} );

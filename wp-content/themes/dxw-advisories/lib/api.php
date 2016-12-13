<?php
include(__DIR__.'/api/inspections_controller.class.php');

add_action( 'rest_api_init', function () {
    $slug_regex = '[a-z0-9]+(?:-[a-z0-9]+)*';
    $controller = new \DxwSec\API\InspectionsController(new \DxwSec\API\JSONInspectionsFinder);
    register_rest_route( 'v1', 'inspections/(?P<slug>'.$slug_regex.')', array(
        'methods' => 'GET',
        'callback' => array($controller, 'show'),
    ) );
} );

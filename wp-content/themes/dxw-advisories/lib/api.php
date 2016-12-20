<?php
add_action('rest_api_init', function () {
    $slug_regex = '[a-z0-9]+(?:-[a-z0-9]+)*';
    $finder = new \DxwSec\API\InspectionsFinder();
    $json_finder = new \DxwSec\API\JSONInspectionsFinder($finder);
    $controller = new \DxwSec\API\InspectionsController($json_finder);
    register_rest_route('v1', 'inspections/(?P<slug>'.$slug_regex.')', [
        'methods' => 'GET',
        'callback' => [$controller, 'show'],
    ]);
});

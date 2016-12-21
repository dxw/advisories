<?php
add_action('rest_api_init', function () {
    $finder = new \DxwSec\API\InspectionsFinder();
    $json_finder = new \DxwSec\API\JSONInspectionsFinder($finder);

    $inspections_controller = new \DxwSec\API\InspectionsController($json_finder);

    $router = new \DxwSec\API\Router($inspections_controller);
    $router->registerRoutes();
});

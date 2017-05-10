<?php
/*
Plugin Name: dxw Security API
Description: Exposes an API of the information on the site
Author: dxw
Author URI: https://www.dxw.com/
*/

require_once(__DIR__.'/vendor/autoload.php');

add_action('rest_api_init', function () {
    $finder = new \DxwSec\API\InspectionsFinder();
    $json_finder = new \DxwSec\API\JSONInspectionsFinder($finder);

    $inspections_controller = new \DxwSec\API\InspectionsController($json_finder);

    $router = new \DxwSec\API\Router($inspections_controller);
    $router->registerRoutes();
});

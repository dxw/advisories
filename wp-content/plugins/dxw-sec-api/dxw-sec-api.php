<?php
/*
Plugin Name: dxw Security API
Description: Exposes an API of the information on the site
Author: dxw
Author URI: https://www.dxw.com/
*/

include(__DIR__.'/vendor.phar');

add_action('rest_api_init', function () {
    $loader = new \Aura\Autoload\Loader;
    $loader->register();
    $loader->addPrefix('DxwSec\\API\\', __DIR__.'/lib/');

    $finder = new \DxwSec\API\InspectionsFinder();
    $json_finder = new \DxwSec\API\JSONInspectionsFinder($finder);

    $inspections_controller = new \DxwSec\API\InspectionsController($json_finder);

    $router = new \DxwSec\API\Router($inspections_controller);
    $router->registerRoutes();
});

<?php

namespace DxwSec\API;

class Router
{
    private $inspections_controller;
    private $slug_regex;

    public function __construct($inspections_controller)
    {
        $this->inspections_controller = $inspections_controller;
        $this->slug_regex = '[a-z0-9]+(?:-[a-z0-9]+)*';
    }

    public function registerRoutes()
    {
        register_rest_route('v1', 'inspections/(?P<slug>'.$this->slug_regex.')', [
            'methods' => 'GET',
            'callback' => [$this->inspections_controller, 'show'],
        ]);
    }
}

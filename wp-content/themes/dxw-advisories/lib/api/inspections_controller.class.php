<?php

namespace DxwSec\API;

class InspectionsController
{
    public function __construct($json_inspections_finder)
    {
        $this->json_inspections_finder = $json_inspections_finder;
    }

    public function show($params) {
        $slug = $params->get_url_params()['slug'];

        return $this->json_inspections_finder->find($slug);
    }
}

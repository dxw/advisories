<?php

namespace DxwSec\API;

/* Responsible for creating a representation of an Inspection */
/* that can be converted to JSON and sent as the response to an API call */
class JSONInspectionsFinder
{
    public function __construct($inspections_finder)
    {
        $this->inspections_finder = $inspections_finder;
    }

    public function find($slug)
    {
        $inspections = $this->inspections_finder->find($slug);
        return array_map(array($this, 'inspection_to_array'), $inspections);
    }

    private function inspection_to_array($inspection)
    {
        // DATE_ATOM is ISO8601. DATE_ISO8601 is an incorrect legacy implementation in php
        return array(
            'name' => $inspection->name,
            'slug' => $inspection->slug,
            'date' => $inspection->date->format(DATE_ATOM),
            'url' => $inspection->url(),
            'result' => $inspection->result(),
        );
    }

}

class InspectionsFinder
{
    public function find()
    {
    }
}

class Inspection
{
    public function url()
    {
    }

    public function result()
    {
    }
}

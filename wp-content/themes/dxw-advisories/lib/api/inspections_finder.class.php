<?php

namespace DxwSec\API;

// Responsible for querying the WordPress database and wrapping the results in an
// object to make it easier to get at the ACF data
class InspectionsFinder
{
    public function find($slug)
    {
        $args = [
            'post_type' => 'plugins',
            'post_status' => 'publish',
            'meta_query' => [
                'relation' => 'AND',
                [
                    'key' => 'codex_link',
                    'value' => '/'.$slug.'/',
                    'compare' => 'LIKE',
                ],
            ],
        ];
        $inspections = get_posts($args);

        return array_map(function($inspection) {
            return new Inspection($inspection);
        }, $inspections);
    }
}

class Inspection
{
    public $name;
    public $slug;
    public $date;

    private $post_id;

    public function __construct($raw_inspection) {
        $this->post_id = $raw_inspection->ID;
        $this->name = $raw_inspection->post_title;
        $this->slug = $raw_inspection->post_name;
        $this->date = date_create($raw_inspection->post_date);
    }

    public function url()
    {
        return get_permalink($this->post_id);
    }

    public function result()
    {
        $recommendation = get_field('recommendation', $this->post_id);
        return $this->recommendation_map($recommendation);
    }

    private function recommendation_map($code) {
        return [
          'green' => 'No issues found',
          /* 'yellow' => 'Use with caution', */
          /* 'red' => 'Potentially unsafe', */
        ][$code];
    }
}

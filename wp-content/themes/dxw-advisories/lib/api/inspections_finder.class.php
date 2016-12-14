<?php

namespace DxwSec\API;

include_once(__DIR__.'/inspection.class.php');

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

<?php

namespace DxwSec\API;

// Responsible for querying the WordPress database and wrapping the results in an
// object to make it easier to get at the ACF data
class InspectionsFinder
{

    public function find($slug)
    {
        global $wpdb;
        $args = [
            'post_type' => 'plugins',
            'post_status' => 'publish',
            'meta_query' => [
                'relation' => 'AND',
                [
                    'key' => 'slug',
                    'value' => $slug,
                    'compare' => '=',
                ],
            ],
        ];
        $inspections = get_posts($args);

        return array_map(function ($inspection) {
            return new Inspection($inspection);
        }, $inspections);
    }
}

<?php

namespace Dxw\DxwSecurity2017\Posts;

class PostTypes implements \Dxw\Iguana\Registerable
{
    public function register()
    {
        add_action('init', [$this, 'addPluginsPostType']);
        add_action('init', [$this, 'addAdvisoriesPostType']);
    }

    public function addPluginsPostType()
    {
        register_post_type(
            'plugins',
            [
                'labels' => [
                    'name' => 'Inspections',
                    'singular_name' => 'Inspection'
                ],
                'supports' => array('author', 'revisions', 'title'),
                'public' => true,
                'has_archive' => true,
            ]
        );
    }

    public function addAdvisoriesPostType()
    {
        register_post_type(
            'advisories',
            [
                'labels' => [
                    'name' => 'Advisories',
                    'singular_name' => 'Advisory'
                ],
                'public' => true,
                'has_archive' => true,
                'supports' => array('author', 'revisions', 'title'),
            ]
        );
    }
}

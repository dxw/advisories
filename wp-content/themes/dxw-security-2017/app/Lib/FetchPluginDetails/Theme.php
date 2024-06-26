<?php

namespace Dxw\DxwSecurity2017\Lib\FetchPluginDetails;

class Theme implements \Dxw\Iguana\Registerable
{
    private $plugin;

    public function __construct(Plugin $plugin)
    {
        $this->plugin = $plugin;
    }

    public function register()
    {
        add_action('wp_ajax_fetch_plugin_details', [$this, 'wp_ajax_fetch_plugin_details']);

        add_action('admin_enqueue_scripts', [$this, 'admin_enqueue_scripts']);

        add_filter('language_attributes', [$this, 'language_attributes'], 10, 1);
    }

    public function wp_ajax_fetch_plugin_details()
    {
        check_ajax_referer('fetch_plugin_details');
        $data = $this->plugin->getDetails($_POST['plugin-slug']);

        echo(json_encode($data)."\n");
        wp_die();
    }

    public function admin_enqueue_scripts()
    {
        foreach ([
            'fetch-plugin-details',
            'async',
        ] as $script) {
            wp_enqueue_script($script, get_theme_root_uri().'/dxw-security-2017/assets/js/admin/'.$script.'.js', [], false, true);
        }
    }

    public function language_attributes($output)
    {
        return $output . ' data-nonce-fetch-plugin-details="'.wp_create_nonce('fetch_plugin_details').'" ';
    }
}

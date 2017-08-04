<?php

namespace Dxw\DxwSecurity2017\Theme;

class WordPressToTwitter implements \Dxw\Iguana\Registerable
{
    public function register()
    {
        add_filter('wpt_custom_shortcode', [$this, 'wpt_custom_shortcode'], 10, 3);
    }

    public function wpt_custom_shortcode($meta, $post, $field)
    {
        return get_field_label($field);
    }
}

<?php

namespace Dxw\DxwSecurity2017\Theme;

class ThemeSettings implements \Dxw\Iguana\Registerable
{
    public function register()
    {
        add_action('customize_register', [$this, 'footerText']);
        add_theme_support('post-thumbnails');
    }

    public function footerText($wp_customize)
    {
        $wp_customize->add_setting(
            'digital_marketplace_text',
            array(
                'sanitize_callback' => 'wp_kses',
            )
        );

        $wp_customize->add_control(
            new \WP_Customize_Control(
                $wp_customize,
                'digital_marketplace',
                array(
                    'label'      => ('Digital Marketplace text'),
                    'section'    => 'title_tagline',
                    'type'       => 'textarea',
                    'settings'   => 'digital_marketplace_text'
                )
            )
        );
    }
}

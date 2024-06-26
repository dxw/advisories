<?php

namespace Dxw\DxwSecurity2017\Theme;

class Menus implements \Dxw\Iguana\Registerable
{
    public function __construct(\Dxw\Iguana\Theme\Helpers $helpers)
    {
        $helpers->registerFunction('footerMenu', [$this, 'footerMenu']);
    }

    public function register()
    {
        register_nav_menu('header', 'Header Menu');
        register_nav_menu('footer_first', 'Footer Menu - First column');
        register_nav_menu('footer_second', 'Footer Menu - Second column');
        register_nav_menu('footer_third', 'Footer Menu - Third column');
    }

    public function footerMenu($location)
    {
        $locations = get_nav_menu_locations();
        if (empty($locations[$location])) {
            return false;
        }
        $menuObj = get_term($locations[$location], 'nav_menu');
        wp_nav_menu([
            'theme_location' => $location,
            'container' => false,
            'items_wrap'=> '<h5>'.esc_html($menuObj->name).'</h5><ul id="%1$s" class="%2$s">%3$s</ul>'
        ]);
    }
}

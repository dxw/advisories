<?php

$registrar->addInstance(\Dxw\Iguana\Theme\Helpers::class, new \Dxw\Iguana\Theme\Helpers());
$registrar->addInstance(\Dxw\Iguana\Theme\LayoutRegister::class, new \Dxw\Iguana\Theme\LayoutRegister(
    $registrar->getInstance(\Dxw\Iguana\Theme\Helpers::class)
));
$registrar->addInstance(\Dxw\Iguana\Extras\UseAtom::class, new \Dxw\Iguana\Extras\UseAtom());

// Libraries and support code
$registrar->addInstance(\Dxw\DxwSecurity2017\Lib\Whippet\TemplateTags::class, new \Dxw\DxwSecurity2017\Lib\Whippet\TemplateTags(
    $registrar->getInstance(\Dxw\Iguana\Theme\Helpers::class)
));

// Theme behaviour, media, assets and template tags
$registrar->addInstance(\Dxw\DxwSecurity2017\Theme\Scripts::class, new \Dxw\DxwSecurity2017\Theme\Scripts(
    $registrar->getInstance(\Dxw\Iguana\Theme\Helpers::class)
));
$registrar->addInstance(\Dxw\DxwSecurity2017\Theme\Helpers::class, new \Dxw\DxwSecurity2017\Theme\Helpers(
    $registrar->getInstance(\Dxw\Iguana\Theme\Helpers::class)
));
$registrar->addInstance(\Dxw\DxwSecurity2017\Theme\Media::class, new \Dxw\DxwSecurity2017\Theme\Media());
$registrar->addInstance(\Dxw\DxwSecurity2017\Theme\Menus::class, new \Dxw\DxwSecurity2017\Theme\Menus(
    $registrar->getInstance(\Dxw\Iguana\Theme\Helpers::class)));
$registrar->addInstance(\Dxw\DxwSecurity2017\Theme\Widgets::class, new \Dxw\DxwSecurity2017\Theme\Widgets());
$registrar->addInstance(\Dxw\DxwSecurity2017\Theme\Footer::class, new \Dxw\DxwSecurity2017\Theme\Footer());
$registrar->addInstance(\Dxw\DxwSecurity2017\Theme\TitleTag::class, new \Dxw\DxwSecurity2017\Theme\TitleTag());
$registrar->addInstance(\Dxw\DxwSecurity2017\Theme\Pagination::class, new \Dxw\DxwSecurity2017\Theme\Pagination(
    $registrar->getInstance(\Dxw\Iguana\Theme\Helpers::class)
));
$registrar->addInstance(\Dxw\DxwSecurity2017\Theme\ThemeSettings::class, new \Dxw\DxwSecurity2017\Theme\ThemeSettings());
$registrar->addInstance(\Dxw\DxwSecurity2017\Theme\AjaxHandlers::class, new \Dxw\DxwSecurity2017\Theme\AjaxHandlers());
$registrar->addInstance(\Dxw\DxwSecurity2017\Theme\Feeds::class, new \Dxw\DxwSecurity2017\Theme\Feeds());
$registrar->addInstance(\Dxw\DxwSecurity2017\Theme\PostClasses::class, new \Dxw\DxwSecurity2017\Theme\PostClasses());

// Post types and additional fields
$registrar->addInstance(\Dxw\DxwSecurity2017\Posts\PostTypes::class, new \Dxw\DxwSecurity2017\Posts\PostTypes());
$registrar->addInstance(\Dxw\DxwSecurity2017\Posts\CustomFields::class, new \Dxw\DxwSecurity2017\Posts\CustomFields());

// Plugin dependency check - pass in any required plugins
$registrar->addInstance(\Dxw\DxwSecurity2017\Theme\Plugins::class, new \Dxw\DxwSecurity2017\Theme\Plugins([
//    'advanced-custom-fields/acf.php', // Path to main plugin file
]));

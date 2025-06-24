<nav class="header-navigation" role="navigation">
    <?php
    if (has_nav_menu('header')) {
        wp_nav_menu(array(
            'theme_location' => 'header',
            'container_class' => 'menu-header',
        ));
    }
    ?>
</nav>

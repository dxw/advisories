<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta name="description" content="<?php
    if (get_post_type() === 'plugins') {
        echo esc_attr('dxw plugin review: ' . single_post_title('', false) . ' - ' . get_the_date());
    } elseif (get_post_type() === 'advisories') {
        echo esc_attr('dxw advisory: ' . single_post_title('', false) . ' (' . esc_html(get_field('workflow_state')) . ')' . ' - ' . get_the_date());
    } else {
        echo esc_attr(get_bloginfo('name') . ' - ' . get_bloginfo('description'));
    }
    ?>" />
    <script defer data-domain="advisories.dxw.com" src="https://plausible.io/js/script.js"></script>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <a href="#main-content" class="sr-only focus:not-sr-only">Skip to main content</a>

    <?php get_template_part('partials/global-header'); ?>

    <main class="main" id="main-content" role="main">
        <?php h()->w_requested_template(); ?>
    </main>

    <?php get_template_part('partials/global-footer'); ?>

    <?php wp_footer(); ?>
</body>
</html>

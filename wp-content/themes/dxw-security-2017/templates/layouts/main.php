<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <script defer data-domain="advisories.dxw.com" src="https://plausible.io/js/script.js"></script>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <?php get_template_part('partials/global-header'); ?>

    <main class="main" role="main">
        <?php h()->w_requested_template(); ?>
    </main>

    <?php get_template_part('partials/global-footer'); ?>

    <?php wp_footer(); ?>
</body>
</html>

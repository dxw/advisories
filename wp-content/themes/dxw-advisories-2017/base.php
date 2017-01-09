<!DOCTYPE html>
<!--[if lt IE 8]> <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie10 lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]> <html class="no-js lt-ie10" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <title><?php wp_title('-', true, 'right') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/static/img/touch-icon.png">
    <link rel="dns-prefetch" href="//www.google-analytics.com/">
    <?php wp_head() ?>
  </head>
  <body <?php body_class() ?>>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-29555961-5', 'auto');
      ga('send', 'pageview');
    </script>

    <div class="wrapper">

    <?php do_action('get_header') ?>
    <?php get_template_part('templates/header') ?>

    <main class="main" role="main">
        <?php include roots_template_path() ?>
    </main>

    <?php get_template_part('templates/about-footer') ?>

    <?php get_template_part('templates/global-footer') ?>

    </div>

    <?php wp_footer() ?>

  </body>
</html>

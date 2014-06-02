<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lte-ie8 lte-ie7 lte-ie6" <?php language_attributes() ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lte-ie8 lte-ie7" <?php language_attributes() ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lte-ie8" <?php language_attributes() ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes() ?>> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <title><?php wp_title('|', true, 'right') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
  </head>
  <body <?php body_class() ?>>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-41912524-1', 'dxw.com');
      ga('send', 'pageview');
    </script>

    <div class="container">
      <?php do_action('get_header') ?>
      <?php get_template_part('templates/header') ?>
    </div>
    
    <?php include roots_template_path() ?>
    
    
      <?php get_template_part('templates/footer') ?>

    </div>

    <?php wp_footer() ?>

  </body>
</html>

<?php

add_action('init', function () {
  remove_action('wp_enqueue_scripts', 'roots_scripts', 100);
});

add_action('wp_enqueue_scripts', function () {
  wp_enqueue_script('_jquery', get_template_directory_uri().'/static/js/lib/jquery.min.js');
  wp_enqueue_script('modernizr', get_template_directory_uri().'/static/js/lib/modernizr.min.js');
  wp_enqueue_script('media-match', get_template_directory_uri().'/static/js/lib/media.match.min.js');

  wp_enqueue_script('main', get_template_directory_uri().'/static/js/main.min.js', array(), false, true);
  wp_enqueue_style('main', get_stylesheet_directory_uri().'/static/css/main.min.css');
});

<?php 

add_action('wpt_custom_shortcode', function($meta, $post, $field) {
  return get_field_label($field);
}, 10, 3);

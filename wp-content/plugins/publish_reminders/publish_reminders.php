<?php
/*
Plugin Name: Publishing Reminders
Description: Checks the dates on draft advisories and asks authors if they should be published yet
Author: dxw
Version: 1.0
*/

require(__DIR__.'/lib/acf.php');

if(!wp_next_scheduled('dxw_advisories_pub_reminder')) {
  wp_schedule_event(time(), 'daily', 'dxw_advisories_pub_reminder');
}

add_action('dxw_advisories_pub_reminder', function() {
  // Retrieve all draft advisories
  $posts = get_posts(array('post_status' => 'private', 'post_type' => 'advisories'));

  foreach($posts as $post) {
    $age_in_days = round((time() - strtotime($post->post_date)) / 86400);

    // If it is 8, 31 or 61 days since the date the advisory was written, send a reminder 
    if($age_in_days == 14 || $age_in_days == 30 || $age_in_days == 60) {
      if (function_exists('get_field')) {
        foreach (get_field('send_an_email_to', 'option') as $email) {
          wp_mail(
            $email,
            "Should this be published? ({$post->post_title})",
            "Should this be published yet? Consult the disclosure policy if you're not sure:\n\n  " . get_option('siteurl') . "/disclosure\n\nHere's the post:\n\n  " . get_permalink($post) . "\n"
          );
        }
      }
    }
  }
});

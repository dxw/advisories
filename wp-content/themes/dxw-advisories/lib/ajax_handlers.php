<?php

add_action('wp_ajax_send_email', function() {
  $targets = array(
    'email_wp_plugins' => 'plugins@wordpress.org',
    'email_fd'         => 'fulldisclosure@seclists.org',
    'email_wpscan'     => 'wpscanteam@gmail.com',
    'email_dxw_wp_sec' => 'dxw-wp-security@lists.dxw.com',
  );

  $sanitised['subject'] = sanitize_text_field($_POST['subject']);
  $sanitised['body']    = ($_POST['body']);

  if(array_key_exists($_POST['target'], $targets)) {
    $sanitised['target'] = $_POST['target'];
  }

  foreach($sanitised as $var => $value) {
    if(empty($value)) {
      header("HTTP/1.1 400 Bad Request");
      echo "Failed: {$var} was empty.";
      return 0;
    }
  }

  if(!wp_mail($targets[$sanitised['target']], $sanitised['subject'], $sanitised['body'], array('From: dxw Security <security@dxw.com>'))){
    header("HTTP/1.1 500 Internal Server Error");
    echo "Failed: {$var} was empty.";
    return 0;
  }

  header("HTTP/1.1 200 OK");
  echo "Email sent to " . $targets[$sanitised['target']];

  die();
});

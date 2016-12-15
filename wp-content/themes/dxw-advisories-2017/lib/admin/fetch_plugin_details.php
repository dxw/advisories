<?php

class FetchPluginDetails {
  function __construct($slug) {
    $this->slug = $slug;
  }

  function get_description($uri) {
    // Scrape WP.org

    $response = wp_remote_get($uri);
    $html = $response['body'];

    preg_match('_<p itemprop="description" class="shortdesc">(.*?)</p>_s', $html, $m);
    if ($m) {
      return trim($m[1]);
    }
    return 'ERROR';
  }

  function request() {
    // Whoever thought PHP serialized objects were a good idea for an API needs a slap

    $response = wp_remote_post(
      'http://api.wordpress.org/plugins/info/1.0/',
      array(
        'body' => array(
          'action' => 'plugin_information',
          'request' => serialize((object)array(
            'slug' => $this->slug,
            'fields' => array(
              'description' => true,
            ),
          )),
        ),
      )
    );

    return unserialize($response['body']);
  }

  function get_data() {

    $response = $this->request();

    if ($response === null) {
      echo(json_encode(array('ok' => false))."\n");
      die();
    }

    $data = array();
    $data['ok'] = true;
    $data['slug'] = $this->slug;
    $data['name'] = $response->name;
    $data['version'] = $response->version;
    $data['author'] = implode(', ', array_keys($response->contributors));
    $data['link'] = 'http://wordpress.org/plugins/'.$this->slug.'/';
    $data['description'] = $response->sections['description'];
    $data['description'] = $this->get_description($data['link']);

    return $data;
  }

  static function get_details($slug) {
    $fpd = new FetchPluginDetails($slug);
    return $fpd->get_data();
  }
}

add_action('wp_ajax_fetch_plugin_details', function () {
  check_ajax_referer('fetch_plugin_details');
  $data = FetchPluginDetails::get_details($_POST['plugin-slug']);

  echo(json_encode($data)."\n");
  die();
});

add_action('admin_enqueue_scripts', function () {
  foreach (array(
    'fetch-plugin-details',
    'async',
  ) as $script) {
    wp_enqueue_script($script, get_template_directory_uri().'/static/admin/'.$script.'.js', array(), false, true);
  }
});

add_filter('language_attributes', function ($output) {
  return $output . ' data-nonce-fetch-plugin-details="'.wp_create_nonce('fetch_plugin_details').'" ';
});

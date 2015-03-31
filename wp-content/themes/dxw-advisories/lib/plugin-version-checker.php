<?php

class PluginVersionChecker {
  function __construct() {
    $this->id = (int)get_the_ID();
    $this->versions = explode(',', get_field('version_of_plugin'));
    $this->version = end($this->versions);
    $this->codex_link = get_field('codex_link');

    preg_match('_https?://wordpress.org/plugins/(.*)/_', $this->codex_link, $m);
    if ($m) {
      $this->is_codex = true;
      $this->slug = $m[1];
    }
    else {
      $this->is_codex = false;
    }
  }

  ////////////////////////////////////////////////////////////////////////////
  // Public API

  function is_old() {
    if ($this->most_recent_version_on_dxwsec() !== $this->version) {
      return true;
    }

    if ($this->is_codex) {
      $version = $this->most_recent_version_on_wporg();
      if ($version && $version != $this->version) {
        return true;
      }
    }

    return false;
  }

  function have_latest() {
    $version = $this->most_recent_version_on_wporg();
    if ($version && $version !== $this->most_recent_version_on_dxwsec()) {
      return false;
    }

    return true;
  }

  function most_recent_version() {
    $version = $this->most_recent_version_on_wporg();
    if ($version) {
      return $version;
    }

    return $this->most_recent_version_on_dxwsec();
  }

  function our_most_recent_version() {
    return $this->most_recent_version_on_dxwsec();
  }

  function our_most_recent_link() {
    return $this->get_link($this->our_most_recent_version());
  }

  ////////////////////////////////////////////////////////////////////////////
  // "Private" functions

  function most_recent_version_on_dxwsec() {
    $posts = get_posts(array(
      'post_type' => 'plugins',
      'meta_key' => 'codex_link',
      'meta_value' => $this->codex_link,
    ));

    $versions = array();

    foreach ($posts as $p) {
      $versions[] = end(explode(',', get_field('version_of_plugin', $p->ID)));
    }

    usort($versions, 'version_compare');
    return array_pop($versions);
  }

  /**
   * May return null, careful!
   */
  function most_recent_version_on_wporg() {
    $response = $this->get_plugin_information($this->slug);
    if (isset($response->error) || empty($response)) {
      return null;
    }

    return $response->version;
  }

  function get_link($version) {
    $posts = get_posts(array(
      'post_type' => 'plugins',
      'meta_key' => 'version_of_plugin',
      'meta_value' => $version,
    ));

    if (count($posts)) {
      return get_permalink($posts[0]->ID);
    }

    return '';
  }

  function get_plugin_information($slug) {
    $t_name = 'dxwsec_plugin_information_'.$slug;
    $response = get_transient($t_name);
    if ($response) {
      return $response;
    }

    $response = $this->_get_plugin_information($slug);
    set_transient($t_name, $response, 60 * 60);
    return $response;
  }

  function _get_plugin_information($slug) {
    $response = wp_remote_post(
      'http://api.wordpress.org/plugins/info/1.0/',
      array(
        'body' => array(
          'action' => 'plugin_information',
          'request' => serialize((object)array(
            'slug' => $slug,
          )),
        ),
      )
    );

    return unserialize($response['body']);
  }
}

<?php

namespace Dxw\DxwSecurity2017\Lib;

class PluginVersionChecker
{
	private int $id;
	private array $versions;
	private string $version;
	private string $codex_link;
	private bool $is_codex;
	private string $slug;

	public function __construct()
	{
		$this->id = (int)get_the_ID();
		$this->versions = explode(',', get_field('version_of_plugin'));
		$this->version = end($this->versions);
		$this->codex_link = get_field('codex_link');

		preg_match('_https?://wordpress.org/plugins/(.*)/_', $this->codex_link, $m);
		if ($m) {
			$this->is_codex = true;
			$this->slug = $m[1];
		} else {
			$this->is_codex = false;
		}
	}

	////////////////////////////////////////////////////////////////////////////
	// Public API

	public function is_old()
	{
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

	public function have_latest()
	{
		$version = $this->most_recent_version_on_wporg();
		if ($version && $version !== $this->most_recent_version_on_dxwsec()) {
			return false;
		}

		return true;
	}

	public function most_recent_version()
	{
		$version = $this->most_recent_version_on_wporg();
		if ($version) {
			return $version;
		}

		return $this->most_recent_version_on_dxwsec();
	}

	public function our_most_recent_version()
	{
		return $this->most_recent_version_on_dxwsec();
	}

	public function our_most_recent_link()
	{
		return $this->get_link($this->our_most_recent_version());
	}

	////////////////////////////////////////////////////////////////////////////
	// "Private" functions

	public function most_recent_version_on_dxwsec()
	{
		$posts = get_posts([
			'post_type' => 'plugins',
			'meta_key' => 'codex_link',
			'meta_value' => $this->codex_link,
		]);

		$versions = [];

		foreach ($posts as $p) {
			$versions[] = end(explode(',', get_field('version_of_plugin', $p->ID)));
		}

		usort($versions, 'version_compare');
		return array_pop($versions);
	}

	/**
	* May return null, careful!
	*/
	public function most_recent_version_on_wporg()
	{
		$response = $this->get_plugin_information($this->slug);
		if (isset($response->error) || empty($response)) {
			return null;
		}

		return $response->version;
	}

	public function get_link($version)
	{
		$posts = get_posts(
			[
				'numberposts' => 1,
				'post_type' => 'plugins',
				'meta_query' => [
					[
						'key' => 'codex_link',
						'value' => $this->codex_link,
					],
					[
						'key' => 'version_of_plugin',
						'value' => $version,
					],
				]
			]
		);

		if (count($posts)) {
			return get_permalink($posts[0]->ID);
		}

		return '';
	}

	public function get_plugin_information($slug)
	{
		$t_name = 'dxwsec_plugin_information_'.$slug;
		$response = get_transient($t_name);
		if ($response) {
			return $response;
		}

		$response = $this->_get_plugin_information($slug);
		set_transient($t_name, $response, 60 * 60);
		return $response;
	}

	public function _get_plugin_information($slug)
	{
		$response = wp_remote_post(
			'http://api.wordpress.org/plugins/info/1.0/',
			[
				'body' => [
					'action' => 'plugin_information',
					'request' => serialize((object)[
						'slug' => $slug,
					]),
				],
				]
		);

		return unserialize($response['body']);
	}
}

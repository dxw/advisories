<?php

namespace Dxw\DxwSecurity2017\Theme;

class WpHead implements \Dxw\Iguana\Registerable
{
	private static $GB_LANG = "en-GB";

	public function register()
	{
		add_action('init', [$this, 'init']);
		add_filter('language_attributes', [$this, 'customLanguageAttribute']);
	}

	public function init()
	{
		// Remove Emoji script
		remove_action('wp_head', 'print_emoji_detection_script', 7);
		remove_action('wp_print_styles', 'print_emoji_styles');
		remove_action('admin_print_styles', 'print_emoji_styles');
		remove_action('admin_print_scripts', 'print_emoji_detection_script');
		// Remove extra crap from wp_head
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wp_generator');
		remove_action('wp_head', 'wlwmanifest_link');
		remove_action('wp_head', 'wp_resource_hints', 2);
		remove_action('wp_head', 'feed_links_extra', 3);
		remove_action('wp_head', 'start_post_rel_link', 10, 0);
		remove_action('wp_head', 'parent_post_rel_link', 10, 0);
		remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
		remove_action('wp_head', 'rest_output_link_wp_head', 10);
		remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
	}

	public function customLanguageAttribute($output)
	{
		$output = preg_replace('/lang=".*?"/i', '', $output);
		$output .= 'lang="' . esc_attr(self::$GB_LANG) . '"';
		return $output;
	}
}

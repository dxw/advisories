<?php

describe(\Dxw\DxwSecurity2017\Theme\WpHead::class, function () {
	beforeEach(function () {
		\WP_Mock::setUp();
		$this->wpHead = new \Dxw\DxwSecurity2017\Theme\WpHead();
	});

	afterEach(function () {
		\WP_Mock::tearDown();
	});

	it('is registrable', function () {
		expect($this->wpHead)->toBeAnInstanceOf(\Dxw\Iguana\Registerable::class);
	});

	describe('->register()', function () {
		it('adds actions', function () {
			\WP_Mock::expectActionAdded('init', [$this->wpHead, 'init']);
			\WP_Mock::expectFilterAdded('language_attributes', [$this->wpHead, 'customLanguageAttribute']);
			$this->wpHead->register();
		});
	});

	describe('->init()', function () {
		it('modifies the output of the WordPress head', function () {
			$actions = [
				['wp_head', 'print_emoji_detection_script', 7],
				['wp_print_styles', 'print_emoji_styles'],
				['admin_print_styles', 'print_emoji_styles'],
				['admin_print_scripts', 'print_emoji_detection_script'],
				['wp_head', 'rsd_link'],
				['wp_head', 'wp_generator'],
				['wp_head', 'wlwmanifest_link'],
				['wp_head', 'wp_resource_hints', 2],
				['wp_head', 'feed_links_extra', 3],
				['wp_head', 'start_post_rel_link', 10, 0],
				['wp_head', 'parent_post_rel_link', 10, 0],
				['wp_head', 'adjacent_posts_rel_link', 10, 0],
				['wp_head', 'rest_output_link_wp_head', 10],
				['wp_head', 'wp_oembed_add_discovery_links', 10],
			];

			foreach ($actions as $args) {
				\WP_Mock::userFunction('remove_action', [
					'args' => $args,
					'times' => 1
				]);
			}
			$this->wpHead->init();
		});
	});

	describe('->customLanguageAttribute()', function () {
		it('changes the lang attribute to en-GB', function () {
			$output = $this->wpHead->customLanguageAttribute('lang="CY"');
			expect($output)->toEqual('lang="en-GB"');
		});
	});
});

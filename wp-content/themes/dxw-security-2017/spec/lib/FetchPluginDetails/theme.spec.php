<?php

describe(\Dxw\DxwSecurity2017\Lib\FetchPluginDetails\Theme::class, function () {
	beforeEach(function () {
		\WP_Mock::setUp();
		$this->plugin = Mockery::mock(\Dxw\DxwSecurity2017\Lib\FetchPluginDetails\Plugin::class);
		$this->theme = new \Dxw\DxwSecurity2017\Lib\FetchPluginDetails\Theme($this->plugin);
	});

	afterEach(function () {
		\WP_Mock::tearDown();
	});

	it('is registrable', function () {
		expect($this->theme)->toBeAnInstanceOf(\Dxw\Iguana\Registerable::class);
	});

	describe('->register()', function () {
		it('adds the actions and filters', function () {
			WP_Mock::expectActionAdded('wp_ajax_fetch_plugin_details', [$this->theme, 'wp_ajax_fetch_plugin_details']);
			WP_Mock::expectActionAdded('admin_enqueue_scripts', [$this->theme, 'admin_enqueue_scripts']);
			WP_Mock::expectFilterAdded('language_attributes', [$this->theme, 'language_attributes'], 10, 1);
			$this->theme->register();
		});
	});

	describe('wp_ajax_fetch_plugin_details', function () {
		it('calls check_ajax_referer first then echoes plugin details', function () {
			WP_Mock::userFunction('check_ajax_referer', [
				'times' => 1,
				'args' => ['fetch_plugin_details'],
				'return' => function () {
					echo "checking referer ";
				}
			]);
			$_POST['plugin-slug'] = 'foo';

			$this->plugin->shouldReceive('getDetails')
				->once()
				->with('foo')
				->andReturn(["a" => 1]);
			WP_Mock::userFunction('wp_die', [
				'times' => 1,
			]);

			ob_start();
			$this->theme->wp_ajax_fetch_plugin_details();
			$result = ob_get_clean();
			expect($result)->toBe("checking referer {\"a\":1}\n");
		});
	});

	describe('admin_enqueue_scripts', function () {
		it('enqueues each script', function () {
			WP_Mock::userFunction('get_theme_root_uri', [
				'return' => 'http://foo/theme'
			]);
			WP_Mock::userFunction('wp_enqueue_script', [
				'times' => 1,
				'args' => [
					'fetch-plugin-details',
					'http://foo/theme/dxw-security-2017/assets/js/admin/fetch-plugin-details.js',
					[],
					false,
					true
				]
			]);
			WP_Mock::userFunction('wp_enqueue_script', [
				'times' => 1,
				'args' => [
					'async',
					'http://foo/theme/dxw-security-2017/assets/js/admin/async.js',
					[],
					false,
					true
				]
			]);
			$this->theme->admin_enqueue_scripts();
		});
	});

	describe('language_attributes', function () {
		it('appends a nonce', function () {
			WP_Mock::userFunction('wp_create_nonce', [
				'times' => 1,
				'args' => 'fetch_plugin_details',
				'return' => 'foo'
			]);
			$result = $this->theme->language_attributes('english');
			expect($result)->toBe('english data-nonce-fetch-plugin-details="foo" ');
		});
	});
});

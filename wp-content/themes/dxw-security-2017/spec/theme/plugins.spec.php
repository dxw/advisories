<?php

describe(\Dxw\DxwSecurity2017\Theme\Plugins::class, function () {
	beforeEach(function () {
		\WP_Mock::setUp();
		\WP_Mock::userFunction('esc_html', [
			'return' => function ($a) {
				return '_'.$a.'_';
			},
		]);
		if (!defined('WP_PLUGIN_DIR')) {
			define('WP_PLUGIN_DIR', '/path/to/plugins');
		}
	});

	afterEach(function () {
		\WP_Mock::tearDown();
	});

	it('is registrable', function () {
		$plugins = new \Dxw\DxwSecurity2017\Theme\Plugins([]);
		expect($plugins)->toBeAnInstanceOf(\Dxw\Iguana\Registerable::class);
	});

	describe('->register()', function () {
		it('registers theme activation hook', function () {
			$plugins = new \Dxw\DxwSecurity2017\Theme\Plugins([]);
			\WP_Mock::expectActionAdded('after_switch_theme', [$plugins, 'checkDependencies']);
			$plugins->register();
		});
	});

	describe('->checkDependencies()', function () {
		it('flags any required plugins that aren\'t activated', function () {
			WP_Mock::userFunction('get_option', [
				'args' => ['active_plugins'],
				'times' => 1,
				'return' => [
					'some-other/plugin.php'
				]
			]);
			WP_Mock::userFunction('get_plugin_data', [
				'args' => [WP_PLUGIN_DIR.'/path-to/a-required-plugin.php'],
				'times' => 1,
				'return' => [
					'Name' => 'A plugin'
				]
			]);
			WP_Mock::userFunction('get_plugin_data', [
				'args' => [WP_PLUGIN_DIR.'/advanced-custom-fields-pro/acf.php'],
				'times' => 1,
				'return' => [
					'Name' => 'Advanced Custom Fields Pro'
				]
			]);
			WP_Mock::userFunction('admin_url', [
				'args' => ['plugins.php'],
				'times' => 2,
				'return' => 'http://localhost/wp-admin/plugins.php'
			]);
			$plugins = new \Dxw\DxwSecurity2017\Theme\Plugins([
				'path-to/a-required-plugin.php',
				'advanced-custom-fields-pro/acf.php'
			]);
			ob_start();
			$plugins->checkDependencies();
			$result = ob_get_contents();
			ob_end_clean();
			expect($result)->toContain('<div class="notice notice-warning">');
			expect($result)->toContain('<a href="http://localhost/wp-admin/plugins.php">Visit plugins page</a>');
			expect($result)->toContain('</div>');

			expect($result)->toContain('<strong>_A plugin_</strong>');
			expect($result)->toContain('<strong>_Advanced Custom Fields Pro_</strong>');
		});

		context('when the plugins are already active', function () {
			it('doesn\'t print anything', function () {
				WP_Mock::userFunction('get_option', [
					'args' => ['active_plugins'],
					'times' => 1,
					'return' => [
						'some-other/plugin.php',
						'path-to/a-required-plugin.php',
						'advanced-custom-fields-pro/acf.php'
					]
				]);
				$plugins = new \Dxw\DxwSecurity2017\Theme\Plugins([
					'path-to/a-required-plugin.php',
					'advanced-custom-fields-pro/acf.php'
				]);
				ob_start();
				$plugins->checkDependencies();
				$result = ob_get_contents();
				ob_end_clean();
				expect($result)->toBeEmpty();
			});
		});

		context('when there\'s no plugin data available', function () {
			it('displays the path of the plugin instead', function () {
				WP_Mock::userFunction('get_option', [
					'args' => ['active_plugins'],
					'times' => 1,
					'return' => [
						'some-other/plugin.php',
						'advanced-custom-fields-pro/acf.php'
					]
				]);
				WP_Mock::userFunction('get_plugin_data', [
					'args' => [WP_PLUGIN_DIR.'/path-to/a-required-plugin.php'],
					'times' => 1,
					'return' => [
						'Name' => ''
					]
				]);
				WP_Mock::userFunction('admin_url', [
					'args' => ['plugins.php'],
					'times' => 1,
					'return' => 'http://localhost/wp-admin/plugins.php'
				]);
				$plugins = new \Dxw\DxwSecurity2017\Theme\Plugins([
					'path-to/a-required-plugin.php',
					'advanced-custom-fields-pro/acf.php'
				]);
				ob_start();
				$plugins->checkDependencies();
				$result = ob_get_contents();
				ob_end_clean();

				expect($result)->toContain('<strong>_path-to/a-required-plugin.php_</strong>');
			});
		});
	});
});

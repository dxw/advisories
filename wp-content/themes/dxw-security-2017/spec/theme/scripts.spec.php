<?php

describe(\Dxw\DxwSecurity2017\Theme\Scripts::class, function () {
	beforeEach(function () {
		\WP_Mock::setUp();
		\WP_Mock::userFunction('esc_url', [
			'return' => function ($a) {
				return '_'.$a.'_';
			},
		]);
		$this->helpers = new \Dxw\Iguana\Theme\Helpers();
		$this->scripts = new \Dxw\DxwSecurity2017\Theme\Scripts($this->helpers);
	});

	afterEach(function () {
		\WP_Mock::tearDown();
	});

	it('is registrable', function () {
		expect($this->scripts)->toBeAnInstanceOf(\Dxw\Iguana\Registerable::class);
	});

	describe('->register()', function () {
		it('registers nav scripts', function () {
			\WP_Mock::expectActionAdded('wp_enqueue_scripts', [$this->scripts, 'wpEnqueueScripts']);
			\WP_Mock::expectActionAdded('wp_print_scripts', [$this->scripts, 'wpPrintScripts']);

			$this->scripts->register();
		});
	});

	describe('->getAssetPath()', function () {
		it('gets the path of the assets', function () {
			\WP_Mock::userFunction('get_stylesheet_directory_uri', [
				'args' => [],
				'return' => 'http://foo.bar.invalid/cat/dog'
			]);
			expect($this->scripts->getAssetPath('meow'))->toBe('http://foo.bar.invalid/cat/static/meow');
		});
	});

	describe('->assetPath()', function () {
		it('echos the path of the assets', function () {
			\WP_Mock::userFunction('get_stylesheet_directory_uri', [
				'args' => [],
				'return' => 'http://foo.bar.invalid/cat/dog',
			]);
			ob_start();
			$this->scripts->assetPath('meow');
			$result = ob_get_contents();
			ob_end_clean();
			expect($result)->toBe('_http://foo.bar.invalid/cat/static/meow_');
		});
	});

	describe('->wpEnqueueScripts()', function () {
		it('enqueues some of the JavaScript files', function () {
			\WP_Mock::userFunction('get_stylesheet_directory_uri', [
				'args' => [],
				'return' => 'http://a.invalid/zzz',
			]);

			\WP_Mock::userFunction('wp_deregister_script', [
				'args' => ['jquery'],
				'times' => 1,
			]);

			\WP_Mock::userFunction('wp_enqueue_script', [
				'args' => ['jquery', 'http://a.invalid/static/lib/jquery.min.js'],
				'times' => 1,
			]);

			\WP_Mock::userFunction('wp_enqueue_script', [
				'args' => ['modernizr', 'http://a.invalid/static/lib/modernizr.min.js'],
				'times' => 1,
			]);

			\WP_Mock::userFunction('wp_enqueue_script', [
				'args' => ['main', 'http://a.invalid/static/main.min.js', ['jquery', 'modernizr'], '', true],
				'times' => 1,
			]);

			\WP_Mock::userFunction('wp_enqueue_style', [
				'args' => ['main', 'http://a.invalid/static/main.min.css'],
				'times' => 1,
			]);

			$this->scripts->wpEnqueueScripts();
		});
	});

	describe('->wpPrintScripts()', function () {
		it('prints some elements tags directly', function () {
			\WP_Mock::userFunction('get_stylesheet_directory_uri', [
				'args' => [],
				'return' => 'http://a.invalid/zzz',
			]);
			ob_start();
			$this->scripts->wpPrintScripts();
			$result = ob_get_contents();
			ob_end_clean();
			$expectedTags = [
				'<meta name="viewport" content="width=device-width, initial-scale=1.0">',
				'<link rel="icon" type="image/png" href="_http://a.invalid/static/img/favicon-96x96.png_" sizes="96x96" />',
				'<link rel="icon" type="image/svg+xml" href="_http://a.invalid/static/img/favicon.svg_" />',
				'<link rel="shortcut icon" href="_http://a.invalid/static/img/favicon.ico_" />',
				'<link rel="apple-touch-icon" sizes="180x180" href="_http://a.invalid/static/img/apple-touch-icon.png_" />',
				'<link rel="manifest" href="_http://a.invalid/static/img/site.webmanifest_" />',
			];
			foreach ($expectedTags as $expected) {
				expect($result)->toContain($expected);
			}
		});
	});
});

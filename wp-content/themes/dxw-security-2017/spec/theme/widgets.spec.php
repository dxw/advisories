<?php

describe(\Dxw\DxwSecurity2017\Theme\Widgets::class, function () {
	beforeEach(function () {
		\WP_Mock::setUp();
		$this->widgets = new \Dxw\DxwSecurity2017\Theme\Widgets();
	});

	afterEach(function () {
		\WP_Mock::tearDown();
	});

	it('is registrable', function () {
		expect($this->widgets)->toBeAnInstanceOf(\Dxw\Iguana\Registerable::class);
	});

	describe('->register()', function () {
		it('initialises the widgets', function () {
			\WP_Mock::expectActionAdded('widgets_init', [$this->widgets, 'widgetsInit']);
			$this->widgets->register();
		});
	});

	describe('->widgetsInit()', function () {
		it('registers any widgets in the theme ', function () {
			\WP_Mock::userFunction('__', [
				'return' => function ($a) {
					return $a;
				}
			]);

			\WP_Mock::userFunction('register_sidebar', [
				'args' => [[
					'name' => __('Primary'),
					'id' => 'sidebar-primary',
					'before_widget' => '<section class="widget %1$s %2$s">',
					'after_widget' => '</section>',
					'before_title' => '<h3>',
					'after_title' => '</h3>',
				]],
				'times' => 1,
			]);

			\WP_Mock::userFunction('register_sidebar', [
				'args' => [[
					'name' => __('Advisories archive'),
					'id' => 'sidebar-advisories',
					'before_widget' => '<section class="widget %1$s %2$s">',
					'after_widget' => '</section>',
					'before_title' => '<h3>',
					'after_title' => '</h3>',
				]],
				'times' => 1,
			]);

			\WP_Mock::userFunction('register_sidebar', [
				'args' => [[
					'name' => __('Plugins archive'),
					'id' => 'sidebar-plugins',
					'before_widget' => '<section class="widget %1$s %2$s">',
					'after_widget' => '</section>',
					'before_title' => '<h3>',
					'after_title' => '</h3>',
				]],
				'times' => 1,
			]);
			$this->widgets->widgetsInit();
		});
	});
});

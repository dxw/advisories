<?php

describe(\Dxw\DxwSecurity2017\Theme\Menus::class, function () {
	beforeEach(function () {
		\WP_Mock::setUp();
		$this->helpers = Mockery::mock(\Dxw\Iguana\Theme\Helpers::class);
		$this->helpers
			->shouldReceive('registerFunction')
			->once();
		$this->menus = new \Dxw\DxwSecurity2017\Theme\Menus($this->helpers);
	});

	afterEach(function () {
		\WP_Mock::tearDown();
	});

	it('is registrable', function () {
		expect($this->menus)->toBeAnInstanceOf(\Dxw\Iguana\Registerable::class);
	});

	describe('->register()', function () {
		it('registers nav menus', function () {
			\WP_Mock::wpFunction('register_nav_menu', [
				'args' => ['header', 'Header Menu'],
				'times' => 1
			]);

			\WP_Mock::wpFunction('register_nav_menu', [
				'args' => ['footer_first', 'Footer Menu - First column'],
				'times' => 1
			]);

			\WP_Mock::wpFunction('register_nav_menu', [
				'args' => ['footer_second', 'Footer Menu - Second column'],
				'times' => 1
			]);

			\WP_Mock::wpFunction('register_nav_menu', [
				'args' => ['footer_third', 'Footer Menu - Third column'],
				'times' => 1
			]);

			$this->menus->register();
		});
	});

	describe('->footerMenu()', function () {
		context('location is not in nav_menu_locations', function () {
			it('returns false', function () {
				$location = 'foo';
				WP_Mock::wpFunction('get_nav_menu_locations', [
					'times' => 1,
					'return' => [
						'bar' => 1
					]
				]);
				$result = $this->menus->footerMenu($location);
				expect($result)->toBe(false);
			});
		});
		context('location is in nav_menu_locations', function () {
			it('calls wp_nav_menu', function () {
				$location = 'foo';
				$menuObj = new stdClass();
				$menuObj->name = 'objectName';
				WP_Mock::wpFunction('get_nav_menu_locations', [
					'times' => 1,
					'return' => [
						'foo' => 'atest'
					]
				]);
				WP_Mock::wpFunction('get_term', [
					'times' => 1,
					'args' => [
						'atest',
						'nav_menu'
					],
					'return' => $menuObj
				]);
				WP_Mock::wpFunction('esc_html', [
					'times' => 1,
					'args' => [
						'objectName'
					],
					'return' => '_objectName_'
				]);
				WP_Mock::wpFunction('wp_nav_menu', [
					'times' => 1,
					'args' => [
						[
							'theme_location' => $location,
							'container' => false,
							'items_wrap' => '<h5>_objectName_</h5><ul id="%1$s" class="%2$s">%3$s</ul>'
						]
					]
				]);
				$result = $this->menus->footerMenu($location);
				expect($result)->not->toBe(false);
			});
		});
	});
});

<?php

describe(\Dxw\DxwSecurity2017\Posts\PostTypes::class, function () {
	beforeEach(function () {
		\WP_Mock::setUp();
		$this->postTypes = new \Dxw\DxwSecurity2017\Posts\PostTypes();
	});

	afterEach(function () {
		\WP_Mock::tearDown();
	});

	it('is registrable', function () {
		expect($this->postTypes)->toBeAnInstanceOf(\Dxw\Iguana\Registerable::class);
	});

	describe('->register()', function () {
		xit('registers any custom post types', function () {
			$this->postTypes->register();
		});
	});
});

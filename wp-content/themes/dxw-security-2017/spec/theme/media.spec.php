<?php

describe(\Dxw\DxwSecurity2017\Theme\Media::class, function () {
	beforeEach(function () {
		\WP_Mock::setUp();
		$this->media = new \Dxw\DxwSecurity2017\Theme\Media();
	});

	afterEach(function () {
		\WP_Mock::tearDown();
	});

	it('is registrable', function () {
		expect($this->media)->toBeAnInstanceOf(\Dxw\Iguana\Registerable::class);
	});

	describe('->register()', function () {
		it('registers thumbnail sizes', function () {
			\WP_Mock::userFunction('set_post_thumbnail_size', [
				'args' => [150, 150, true],
				'times' => 1
			]);

			\WP_Mock::userFunction('add_image_size', [
				'args' => ['medium', 200, 200, true],
				'times' => 1
			]);

			\WP_Mock::userFunction('add_image_size', [
				'args' => ['large', 800, 300, true],
				'times' => 1
			]);

			$this->media->register();
		});
	});
});

<?php

describe(\Dxw\AdvisoriesHeaders\Headers::class, function () {
	beforeEach(function () {
		$this->headers = new \Dxw\AdvisoriesHeaders\Headers();
	});

	describe('->register()', function () {
		it('does registers filters for wp_headers', function () {
			allow('add_filter')->toBeCalled();
			expect('add_filter')->toBeCalled()->with(
				'wp_headers',
				[$this->headers, 'addCacheControl']
			);
			$this->headers->register();
			expect(true)->toBeTruthy();
		});
	});

	describe('->addCacheControl()', function () {
		context('if the user is logged in', function () {
			it('does not cache the page', function () {
				allow('is_user_logged_in')->toBeCalled()->andReturn(true);
				$expected = ['Cache-Control' => 'no-cache, private'];
				$result = $this->headers->addCacheControl([]);
				expect($result)->toEqual($expected);
			});
		});
		context('if the user is not logged in and the request is a search query', function () {
			it('caches the page with a short TTL', function () {
				allow('is_user_logged_in')->toBeCalled()->andReturn(false);
				allow('is_search')->toBeCalled()->andReturn(true);
				allow('is_front_page')->toBeCalled()->andReturn(false);
				allow('is_archive')->toBeCalled()->andReturn(true);
				$expected = ['Cache-Control' => 'public, max-age=1800'];
				$result = $this->headers->addCacheControl([]);
				expect($result)->toEqual($expected);
			});
		});
		context('if the user is not logged in and the page is the homepage', function () {
			it('caches the page with a short TTL', function () {
				allow('is_user_logged_in')->toBeCalled()->andReturn(false);
				allow('is_search')->toBeCalled()->andReturn(false);
				allow('is_front_page')->toBeCalled()->andReturn(true);
				$expected = ['Cache-Control' => 'public, max-age=1800'];
				$result = $this->headers->addCacheControl([]);
				expect($result)->toEqual($expected);
			});
		});
		context('if the user is not logged in and the page is an archive page', function () {
			it('caches the page with a short TTL', function () {
				allow('is_user_logged_in')->toBeCalled()->andReturn(false);
				allow('is_search')->toBeCalled()->andReturn(false);
				allow('is_front_page')->toBeCalled()->andReturn(false);
				allow('is_archive')->toBeCalled()->andReturn(true);
				$expected = ['Cache-Control' => 'public, max-age=1800'];
				$result = $this->headers->addCacheControl([]);
				expect($result)->toEqual($expected);
			});
		});
		context('if the user is not logged in and the page is not the homepage or an archive page', function () {
			it('does caches the page with a long TTL', function () {
				allow('is_user_logged_in')->toBeCalled()->andReturn(false);
				allow('is_search')->toBeCalled()->andReturn(false);
				allow('is_front_page')->toBeCalled()->andReturn(false);
				allow('is_archive')->toBeCalled()->andReturn(false);
				$expected = ['Cache-Control' => 'public, max-age=86400'];
				$result = $this->headers->addCacheControl([]);
				expect($result)->toEqual($expected);
			});
		});
	});
});

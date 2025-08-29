<?php

describe(\Dxw\AdvisoriesHeaders\Headers::class, function () {
	beforeEach(function () {
		$this->headers = new \Dxw\AdvisoriesHeaders\Headers();
	});

	describe('->register()', function () {
		it('it registers filters', function () {
			allow('add_filter')->toBeCalled();
			expect('add_filter')->toBeCalled()->times(6);
			expect('add_filter')->toBeCalled()->once()->with(
				'wp_headers',
				[$this->headers, 'addCacheControl']
			);
			expect('add_filter')->toBeCalled()->once()->with(
				'wp_headers',
				[$this->headers, 'addStrictTransportPolicy']
			);
			expect('add_filter')->toBeCalled()->once()->with(
				'wp_headers',
				[$this->headers, 'addContentSecurityPolicy']
			);
			expect('add_filter')->toBeCalled()->once()->with(
				'wp_script_attributes',
				[$this->headers, 'addCSPScriptAttributes'],
				99999
			);
			expect('add_filter')->toBeCalled()->once()->with(
				'wp_inline_script_attributes',
				[$this->headers, 'addCSPScriptAttributes'],
				99999
			);
			expect('add_filter')->toBeCalled()->once()->with(
				'get_avatar',
				[$this->headers, 'removeGravatarSupport'],
			);
			$this->headers->register();
			expect(true)->toBeTruthy();
		});
	});

	describe('addCSPScriptAttributes->()', function () {
		context('a nonce is already set', function () {
			it('does nothing', function () {
				$input = ['src' => 'https://example.com', 'nonce' => '12345', 'foo' => 'bar'];
				$result = $this->headers->addCSPScriptAttributes($input);
				expect($result)->toEqual($input);
			});
		});
		context('a nonce is not set', function () {
			it('adds a nonce', function () {
				allow('wp_create_nonce')->toBeCalled()->with('csp')->andReturn('012345');
				allow('esc_attr')->toBeCalled()->andRun(function ($val) {
					return $val;
				});
				$input = ['src' => 'https://example.com', 'foo' => 'bar'];
				$expected = ['src' => 'https://example.com', 'nonce' => '012345', 'foo' => 'bar'];
				$result = $this->headers->addCSPScriptAttributes($input);
				expect($result)->toEqual($expected);
			});
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
		context('if the page is a preview page', function () {
			it('does not cache the page', function () {
				allow('is_user_logged_in')->toBeCalled()->andReturn(false);
				allow('is_preview')->toBeCalled()->andReturn(true);
				$expected = ['Cache-Control' => 'no-cache, private'];
				$result = $this->headers->addCacheControl([]);
				expect($result)->toEqual($expected);
			});
		});
		context('if the user is not logged in and the request is a search query', function () {
			it('caches the page with a short TTL', function () {
				allow('is_user_logged_in')->toBeCalled()->andReturn(false);
				allow('is_preview')->toBeCalled()->andReturn(false);
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
				allow('is_preview')->toBeCalled()->andReturn(false);
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
				allow('is_preview')->toBeCalled()->andReturn(false);
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
				allow('is_preview')->toBeCalled()->andReturn(false);
				allow('is_search')->toBeCalled()->andReturn(false);
				allow('is_front_page')->toBeCalled()->andReturn(false);
				allow('is_archive')->toBeCalled()->andReturn(false);
				$expected = ['Cache-Control' => 'public, max-age=86400'];
				$result = $this->headers->addCacheControl([]);
				expect($result)->toEqual($expected);
			});
		});
	});

	describe('->addStrictTransportPolicy()', function () {
		context('on local environments', function () {
			it('does nothing', function () {
				allow('wp_get_environment_type')->toBeCalled()->andReturn('local');
				allow('get_site_url')->toBeCalled()->andReturn('https://example.com');
				$expected = [];
				$result = $this->headers->addStrictTransportPolicy([]);
				expect($result)->toEqual($expected);
			});
		});
		context('on localhost with no SSL cert', function () {
			it('does nothing', function () {
				allow('wp_get_environment_type')->toBeCalled()->andReturn('local');
				allow('get_site_url')->toBeCalled()->andReturn('http://localhost');
				$expected = [];
				$result = $this->headers->addStrictTransportPolicy([]);
				expect($result)->toEqual($expected);
			});
		});
		context('on non-local environments', function () {
			it('adds an STS header without subdomains', function () {
				allow('wp_get_environment_type')->toBeCalled()->andReturn('staging');
				allow('get_site_url')->toBeCalled()->andReturn('https://example.com');
				$expected = ['Strict-Transport-Security' => 'max-age=31536000'];
				$result = $this->headers->addStrictTransportPolicy([]);
				expect($result)->toEqual($expected);
			});
		});
	});

	describe('->addContentSecurityPolicy()', function () {
		beforeEach(function () {
			allow('is_admin')->toBeCalled()->andReturn(false);
			allow('is_login')->toBeCalled()->andReturn(false);
			allow('wp_create_nonce')->toBeCalled()->with('csp')->andReturn('012345');
			allow('esc_attr')->toBeCalled()->andRun(function ($val) {
				return $val;
			});
		});
		context('on localhost with no SSL', function () {
			it('adds a CSP which only allows CORS between this site and Plausible or wordpress.org', function () {
				allow('get_site_url')->toBeCalled()->andReturn('http://localhost');
				$policy = "default-src 'self'; script-src 'self' 'nonce-012345' data: https://plausible.io ";
				$policy .= "https://wordpress.org; connect-src 'self' data: https://plausible.io https://wordpress.org; ";
				$policy .= "img-src 'self' data: https://plausible.io https://wordpress.org; style-src 'self' ";
				$policy .= "'unsafe-inline'; font-src 'self' data: https://wordpress.org; object-src 'none'; media-src ";
				$policy .= "'none'; frame-src 'none'; child-src 'none'; worker-src 'none'; manifest-src 'self'; ";
				$policy .= "base-uri 'self'; form-action 'self'; frame-ancestors 'none';";
				$expected = ['Content-Security-Policy' => $policy];
				$result = $this->headers->addContentSecurityPolicy([]);
				expect($result)->toEqual($expected);
			});
		});
		context('on any other URL', function () {
			it('adds a CSP which includes upgrade-insecure-requests', function () {
				allow('get_site_url')->toBeCalled()->andReturn('https://example.com');
				$result = $this->headers->addContentSecurityPolicy([])['Content-Security-Policy'];
				expect(explode('; ', $result))->toContain('upgrade-insecure-requests;');
			});
		});
	});
});

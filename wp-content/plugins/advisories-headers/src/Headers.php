<?php

namespace Dxw\AdvisoriesHeaders;

class Headers
{
	private int $ttl_short = 1800;  // 30 mins..
	private int $ttl_long = 86400;  // 1 day.

	public function register(): void
	{
		add_filter('wp_headers', [$this, 'addCacheControl']);
		add_filter('wp_headers', [$this, 'addStrictTransportPolicy']);
		add_filter('wp_headers', [$this, 'addContentSecurityPolicy']);
	}

	/**
	 * Add Cache-Control headers to the site.
	 *
	 * If the user is logged in, we do not cache; if the page requested is an
	 * archive or homepage we have a short TTL, otherwise we use a longer TTL.
	 *
	 * @param string[] $headers
	 * @return string[]
	 */
	public function addCacheControl(array $headers): array
	{
		if (is_user_logged_in() || is_preview()) {
			$headers['Cache-Control'] = 'no-cache, private';
		} elseif (is_front_page() || is_archive() || is_search()) {
			$headers['Cache-Control'] = 'public, max-age=' . $this->ttl_short;
		} else {
			$headers['Cache-Control'] = 'public, max-age=' . $this->ttl_long;
		}
		return $headers;
	}

	/**
	 * Add a Strict Transport Security header.
	 *
	 * This header is copied from the current Playbook configuration, which
	 * does not (yet) include subdomains.
	 *
	 * @param string[] $headers
	 * @return string[]
	 */
	public function addStrictTransportPolicy(array $headers): array
	{
		if (wp_get_environment_type() !== 'local' && get_site_url() !== 'http://localhost') {
			$headers['Strict-Transport-Security'] = 'max-age=31536000';
		}
		return $headers;
	}

	/**
	 * Add a Content Security Policy.
	 *
	 * This policy is quite strict, it disallows everything except Plausible
	 * (which we use for analytics) and wordpress.org (which provides some
	 * basic functionality via an API).
	 *
	 * @param string[] $headers
	 * @return string[]
	 */
	public function addContentSecurityPolicy(array $headers): array
	{
		$policy = [
			"default-src 'self';",
			"script-src 'self' 'unsafe-inline' data: https://plausible.io https://wordpress.org;",
			"connect-src 'self' data: https://plausible.io https://wordpress.org;",
			"img-src 'self' data: https://plausible.io https://wordpress.org;",
			"style-src 'self' 'unsafe-inline';",
			"font-src 'self' data: https://wordpress.org;",
			"object-src 'none';",  // <object> and <embed>
			"media-src 'none';",  // <video>, <audio> and <track>
			"frame-src 'none';",
			"child-src 'none';",  // web workers
			"worker-src 'none';",
			"manifest-src 'self';",
			"base-uri 'self';",
			"form-action 'self';",
			"frame-ancestors 'none';",
		];
		if (get_site_url() !== 'http://localhost') {
			array_push($policy, "upgrade-insecure-requests;");
		}
		$headers['Content-Security-Policy'] = implode(' ', $policy);
		return $headers;
	}

}

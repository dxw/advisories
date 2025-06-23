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
		if (is_user_logged_in()) {
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
		if (wp_get_environment_type() !== 'local') {
			$headers['Strict-Transport-Security'] = 'max-age=31536000';
		}
		return $headers;
	}
}

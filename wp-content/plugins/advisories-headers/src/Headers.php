<?php

namespace Dxw\AdvisoriesHeaders;

class Headers
{
	public function register(): void
	{
		add_filter('wp_headers', [$this, 'addCacheControl']);
	}

	/**
	 * @param string[] $headers
	 * @return string[]
	 */
	public function addCacheControl(array $headers): array
	{
		return $headers;
	}
}

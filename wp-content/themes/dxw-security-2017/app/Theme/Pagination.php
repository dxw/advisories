<?php

namespace Dxw\DxwSecurity2017\Theme;

class Pagination implements \Dxw\Iguana\Registerable
{
	public function register(): void
	{
		add_filter('paginate_links_output', [$this, 'makeCurrentPageClickable'], 10, 1);
	}

	public function makeCurrentPageClickable(string $html): string
	{
		$current = max(1, get_query_var('paged'));
		$span = sprintf(
			'<span aria-current="page" class="page-numbers current"><span class="sr-only">Page</span>%d</span>',
			$current
		);

		$link = sprintf(
			'<a class="page-numbers current" href="%s" aria-current="page">%d</a>',
			esc_url(get_pagenum_link($current)),
			$current
		);

		return str_replace($span, $link, $html);
	}
}

<?php

describe(\Dxw\DxwSecurity2017\Theme\Pagination::class, function () {
	beforeEach(function () {
		\WP_Mock::setUp();
	});

	afterEach(function () {
		\WP_Mock::tearDown();
	});

	it('is registerable', function () {
		$pagination = new \Dxw\DxwSecurity2017\Theme\Pagination();
		expect($pagination)->toBeAnInstanceOf(\Dxw\Iguana\Registerable::class);
	});

	it('registers a filter', function () {
		$pagination = new \Dxw\DxwSecurity2017\Theme\Pagination();
		allow('add_filter')->toBeCalled();
		expect('add_filter')->toBeCalled()->once()->with(
			'paginate_links_output',
			[$pagination, 'makeCurrentPageClickable'],
			10,
			1
		);
		$pagination->register();
	});

	it('makes the current page link an anchor', function () {
		$pagination = new \Dxw\DxwSecurity2017\Theme\Pagination();
		allow('get_query_var')->toBeCalled()->andReturn(27);
		allow('esc_url')->toBeCalled()->andRun(function ($s) { return $s; });
		allow('get_pagenum_link')->toBeCalled()->andReturn('http://localhost/plugins/page/27/');

		$input = <<<HTML
<li><a class="prev page-numbers" href="http://localhost/plugins/page/26/">Previous</a></li>
<li><a class="page-numbers" href="http://localhost/plugins/"><span class="sr-only">Page</span>1</a></li>
<li><span class="page-numbers dots">&hellip;</span></li>
<li><a class="page-numbers" href="http://localhost/plugins/page/26/"><span class="sr-only">Page</span>26</a></li>
<li><span aria-current="page" class="page-numbers current"><span class="sr-only">Page</span>27</span></li>
<li><a class="page-numbers" href="http://localhost/plugins/page/28/"><span class="sr-only">Page</span>28</a></li>
<li><span class="page-numbers dots">&hellip;</span></li>
<li><a class="page-numbers" href="http://localhost/plugins/page/30/"><span class="sr-only">Page</span>30</a></li>
<li><a class="next page-numbers" href="http://localhost/plugins/page/28/">Next</a></li>
HTML;
		$expected = <<<HTML
<li><a class="prev page-numbers" href="http://localhost/plugins/page/26/">Previous</a></li>
<li><a class="page-numbers" href="http://localhost/plugins/"><span class="sr-only">Page</span>1</a></li>
<li><span class="page-numbers dots">&hellip;</span></li>
<li><a class="page-numbers" href="http://localhost/plugins/page/26/"><span class="sr-only">Page</span>26</a></li>
<li><a class="page-numbers current" href="http://localhost/plugins/page/27/" aria-current="page">27</a></li>
<li><a class="page-numbers" href="http://localhost/plugins/page/28/"><span class="sr-only">Page</span>28</a></li>
<li><span class="page-numbers dots">&hellip;</span></li>
<li><a class="page-numbers" href="http://localhost/plugins/page/30/"><span class="sr-only">Page</span>30</a></li>
<li><a class="next page-numbers" href="http://localhost/plugins/page/28/">Next</a></li>
HTML;

		$result = $pagination->makeCurrentPageClickable($input);
		expect($result)->toEqual($expected);
	});
});

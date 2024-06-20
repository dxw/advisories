<?php

describe(\Dxw\DxwSecurity2017\Theme\Footer::class, function () {
	beforeEach(function () {
		\WP_Mock::setUp();
		$this->footer = new \Dxw\DxwSecurity2017\Theme\Footer();
	});

	afterEach(function () {
		\WP_Mock::tearDown();
	});

	it('is registrable', function () {
		expect($this->footer)->toBeAnInstanceOf(\Dxw\Iguana\Registerable::class);
	});

	describe('->register()', function () {
		it('registers actions', function () {
			WP_Mock::expectActionAdded('wp_footer', [$this->footer, 'wpFooter']);
			$this->footer->register();
		});
	});

	describe('->wpFooter()', function () {
		it('adds HTML to the footer', function () {
			ob_start();
			$this->footer->wpFooter();
			$result = ob_get_contents();
			ob_end_clean();
			expect($result)->toBe(implode("\n", [
				'        <script type="text/javascript">',
				'            var _gaq = _gaq || [];',
				"            var TRACKING_CODE = 'UA-29555961-5'; // Put the Google Analytics tracking code here",
				"            _gaq.push(['_setAccount', TRACKING_CODE]);",
				"            _gaq.push(['_trackPageview']);",
				'            if (!TRACKING_CODE.length) {',
				"              console.warn('Google Analytics requires a tracking code to function correctly');",
				'            }',
				'',
				'            (function() {',
				"                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;",
				"                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';",
				"                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);",
				'            })();',
				'        </script>',
				'        ',
			]));
		});
	});
});

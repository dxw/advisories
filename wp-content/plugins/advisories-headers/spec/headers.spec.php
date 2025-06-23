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
		it('does nothing', function () {
			$headers = [];
			$result = $this->headers->addCacheControl($headers);
			expect($result)->toEqual($headers);
		});
	});
});

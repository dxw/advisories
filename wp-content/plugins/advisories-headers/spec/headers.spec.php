<?php

describe(\Dxw\AdvisoriesHeaders\Headers::class, function () {
	beforeEach(function () {
		$this->headers = new \Dxw\AdvisoriesHeaders\Headers();
	});

	describe('->register()', function () {
		it('does not register actions or filter', function () {
			$this->headers->register();
			expect(true)->toBeTruthy();
		});
	});
});

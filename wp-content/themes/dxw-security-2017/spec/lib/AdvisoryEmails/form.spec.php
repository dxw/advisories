<?php

describe(\Dxw\DxwSecurity2017\Lib\AdvisoryEmails\Form::class, function () {
	beforeEach(function () {
		\WP_Mock::setUp();
		$this->form = new \Dxw\DxwSecurity2017\Lib\AdvisoryEmails\Form();
	});

	afterEach(function () {
		\WP_Mock::tearDown();
	});

	describe('->displayIfSuperAdmin()', function () {
		context('user is not super admin', function () {
			it('does nothing', function () {
				WP_Mock::wpFunction('is_super_admin', [
					'times' => 1,
					'return' => false
				]);
				ob_start();
				$this->form->displayIfSuperAdmin();
				$result = ob_get_clean();
				expect($result)->toBe('');
			});
		});
	});
});

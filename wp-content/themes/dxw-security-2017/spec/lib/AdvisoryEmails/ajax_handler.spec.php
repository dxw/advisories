<?php

describe(\Dxw\DxwSecurity2017\Lib\AdvisoryEmails\AjaxHandler::class, function () {
    beforeEach(function () {
        \WP_Mock::setUp();
        $this->ajaxHandler = new \Dxw\DxwSecurity2017\Lib\AdvisoryEmails\AjaxHandler();
    });

    afterEach(function () {
        \WP_Mock::tearDown();
    });

    it('is registrable', function () {
        expect($this->ajaxHandler)->toBeAnInstanceOf(\Dxw\Iguana\Registerable::class);
    });

    describe('->register()', function () {
        it('adds the action', function () {
            WP_Mock::expectActionAdded('wp_ajax_send_email', [$this->ajaxHandler, 'wp_ajax_send_email']);
            $this->ajaxHandler->register();
        });
    });
});

<?php

describe(\Dxw\DxwSecurity2017\Theme\AjaxHandlers::class, function () {
    beforeEach(function () {
        \WP_Mock::setUp();
        $this->ajaxHandlers = new \Dxw\DxwSecurity2017\Theme\AjaxHandlers();
    });

    afterEach(function () {
        \WP_Mock::tearDown();
    });

    it('is registrable', function () {
        expect($this->ajaxHandlers)->to->be->an->instanceof(\Dxw\Iguana\Registerable::class);
    });

    describe('->register()', function () {
        it('adds the action', function () {
            WP_Mock::expectActionAdded('wp_ajax_send_email', [$this->ajaxHandlers, 'wp_ajax_send_email']);
            $this->ajaxHandlers->register();
        });
    });

});

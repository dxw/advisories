<?php

describe(\Dxw\DxwSecurity2017\Posts\CustomFields::class, function () {
    beforeEach(function () {
        \WP_Mock::setUp();
        $this->customFields = new \Dxw\DxwSecurity2017\Posts\CustomFields();
    });

    afterEach(function () {
        \WP_Mock::tearDown();
    });

    it('is registrable', function () {
        expect($this->customFields)->to->be->an->instanceof(\Dxw\Iguana\Registerable::class);
    });

    describe('->register()', function () {
        xit('registers any custom fields', function () {
            $this->customFields->register();
        });
    });
});

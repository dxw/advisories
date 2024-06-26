<?php

describe(\Dxw\DxwSecurity2017\Theme\WordPressToTwitter::class, function () {
    beforeEach(function () {
        \WP_Mock::setUp();
        $this->wordPressToTwitter = new \Dxw\DxwSecurity2017\Theme\WordPressToTwitter();
    });

    afterEach(function () {
        \WP_Mock::tearDown();
    });

    it('is registrable', function () {
        expect($this->wordPressToTwitter)->to->be->an->instanceof(\Dxw\Iguana\Registerable::class);
    });

    describe('->register()', function () {
        it('adds the filter', function () {
            WP_Mock::expectFilterAdded('wpt_custom_shortcode', [$this->wordPressToTwitter, 'wpt_custom_shortcode'], 10, 3);
            $this->wordPressToTwitter->register();
        });
    });

    describe('->wpt_custom_shortcode()', function () {
        it('returns the field label', function () {
            $this->h = Mockery::Mock(stdClass::class);
            WP_Mock::wpFunction('h', [
                'times' => 1,
                'return' => $this->h
            ]);
            $this->h->shouldReceive('get_field_label')
                ->once()
                ->with('foo')
                ->andReturn('bar');
            $result = $this->wordPressToTwitter->wpt_custom_shortcode('meta', 'post', 'foo');
            expect($result)->to->equal('bar');
        });
    });
});

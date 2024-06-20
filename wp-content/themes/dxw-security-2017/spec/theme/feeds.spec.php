<?php

describe(\Dxw\DxwSecurity2017\Theme\Feeds::class, function () {
    beforeEach(function () {
        \WP_Mock::setUp();
        $this->feeds = new \Dxw\DxwSecurity2017\Theme\Feeds();
    });

    afterEach(function () {
        \WP_Mock::tearDown();
    });

    it('is registrable', function () {
        expect($this->feeds)->toBeAnInstanceOf(\Dxw\Iguana\Registerable::class);
    });

    describe('->register()', function () {
        it('adds the action', function () {
            WP_Mock::expectActionAdded('wp_head', [$this->feeds, 'wp_head']);
            $this->feeds->register();
        });
    });

    describe('->wp_head()', function () {
        it('outputs two feed links', function () {
            WP_Mock::wpFunction('get_bloginfo', [
                'times' => 2,
                'args' => 'name',
                'return' => 'dxwsec'
            ]);
            WP_Mock::wpFunction('get_post_type_archive_feed_link', [
                'times' => 1,
                'args' => [
                    'advisories',
                    'atom'
                ],
                'return' => 'feed_link_1'
            ]);
            WP_Mock::wpFunction('esc_attr', [
                'times' => 1,
                'args' => 'feed_link_1',
                'return' => '_feed_link_1_'
            ]);
            WP_Mock::wpFunction('get_post_type_archive_feed_link', [
                'times' => 1,
                'args' => [
                    'plugins',
                    'atom'
                ],
                'return' => 'feed_link_2'
            ]);
            WP_Mock::wpFunction('esc_attr', [
                'times' => 1,
                'args' => 'feed_link_2',
                'return' => '_feed_link_2_'
            ]);
            ob_start();
            $this->feeds->wp_head();
            $result = ob_get_clean();
            expect($result)->toContain(
                '<link rel="alternate" type="application/atom+xml" title="dxwsec Advisory Feed" href="_feed_link_1_">'
            );
            expect($result)->toContain(
                '<link rel="alternate" type="application/atom+xml" title="dxwsec Plugin Feed" href="_feed_link_2_">'
            );
        });
    });
});

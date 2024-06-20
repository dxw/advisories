<?php

describe(\Dxw\DxwSecurity2017\Theme\PostClasses::class, function () {
    beforeEach(function () {
        \WP_Mock::setUp();
        $this->postClasses = new \Dxw\DxwSecurity2017\Theme\PostClasses();
    });

    afterEach(function () {
        \WP_Mock::tearDown();
    });

    it('is registrable', function () {
        expect($this->postClasses)->toBeAnInstanceOf(\Dxw\Iguana\Registerable::class);
    });

    describe('->register()', function () {
        it('adds the filter', function () {
            \WP_Mock::expectFilterAdded('post_class', [$this->postClasses, 'recommendationStatusClass']);
            $this->postClasses->register();
        });
    });

    describe('->recommendationStatusClass()', function () {
        context('post does not have recommendation field', function () {
            it('returns the classes array unaltered', function () {
                global $post;
                $post = new stdClass();
                $post->ID = 123;
                WP_Mock::wpFunction('get_field', [
                    'times' => 1,
                    'args' => [
                        'recommendation',
                        123
                    ],
                    'return' => false
                ]);
                $result = $this->postClasses->recommendationStatusClass(['foo', 'bar']);
                expect($result)->toBe(['foo', 'bar']);
            });
        });
        context('post does have recommendation field', function () {
            it('returns the classes array with recommendation status', function () {
                global $post;
                $post = new stdClass();
                $post->ID = 123;
                WP_Mock::wpFunction('get_field', [
                    'times' => 1,
                    'args' => [
                        'recommendation',
                        123
                    ],
                    'return' => 'avoid'
                ]);
                $result = $this->postClasses->recommendationStatusClass(['foo', 'bar']);
                expect($result)->toBe(['foo', 'bar', 'avoid']);
            });
        });
    });
});

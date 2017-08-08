<?php

describe(\Dxw\DxwSecurity2017\Lib\FetchPluginDetails\WordPressAPIGetter::class, function () {
    beforeEach(function () {
        \WP_Mock::setUp();
        $this->getter = new \Dxw\DxwSecurity2017\Lib\FetchPluginDetails\WordPressAPIGetter();
    });

    afterEach(function () {
        \WP_Mock::tearDown();
    });

    describe('->getPluginInfo()', function () {
        context('response is wp_error', function () {
            it('returns an error result', function () {
                $this->error = Mockery::Mock(\WP_Error::class);
                WP_Mock::wpFunction('wp_remote_post', [
                    'times' => 1,
                    'args' => [
                        'https://api.wordpress.org/plugins/info/1.0/',
                        [
                            'body' => [
                                'action' => 'plugin_information',
                                'request' => serialize((object)array(
                                    'slug' => 'foo',
                                ))
                            ],
                            'timeout' => 15
                        ]
                    ],
                    'return' => $this->error
                ]);
                WP_Mock::wpFunction('is_wp_error', [
                    'times' => 1,
                    'args' => [$this->error],
                    'return' => true
                ]);
                $this->error->shouldReceive('get_error_message')
                    ->once()
                    ->andReturn('errormessage');
                $result = $this->getter->getPluginInfo('foo');
                expect($result)->to->be->instanceof(\Dxw\Result\Result::class);
                expect($result->isErr())->to->equal(true);
                expect($result->getErr())->to->equal('errormessage');
            });
        });
        it('returns the unserialized response', function () {
            $this->response = [
                'body' => 'a:2:{i:0;s:5:"first";i:1;s:6:"second";}'
            ];
            WP_Mock::wpFunction('wp_remote_post', [
                'times' => 1,
                'args' => [
                    'https://api.wordpress.org/plugins/info/1.0/',
                    [
                        'body' => [
                            'action' => 'plugin_information',
                            'request' => serialize((object)array(
                                'slug' => 'foo',
                            ))
                        ],
                        'timeout' => 15
                    ]
                ],
                'return' => $this->response
            ]);
            WP_Mock::wpFunction('is_wp_error', [
                'times' => 1,
                'args' => [$this->response],
                'return' => false
            ]);
            $result = $this->getter->getPluginInfo('foo');
            expect($result)->to->be->instanceof(\Dxw\Result\Result::class);
            expect($result->isErr())->to->equal(false);
            expect($result->unwrap())->to->equal([
                'first',
                'second'
            ]);
        });
    });

});

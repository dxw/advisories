<?php

describe(\Dxw\DxwSecurity2017\Lib\FetchPluginDetails\Getter::class, function () {
    beforeEach(function () {
        \WP_Mock::setUp();
        $this->getter = new \Dxw\DxwSecurity2017\Lib\FetchPluginDetails\Getter();
    });

    afterEach(function () {
        \WP_Mock::tearDown();
    });

    describe('->getPluginDescription()', function () {
        context('no description in response', function () {
            it('returns ERROR', function () {
                $uri = 'http://foo.bar/';
                $response = [
                    'body' => 'no match here',
                    'header' => 'a head'
                ];
                WP_Mock::wpFunction('wp_remote_get', [
                    'times' => 1,
                    'args' => [
                        $uri,
                        [
                           'timeout' => 15
                        ]
                    ],
                    'return' => $response
                ]);
                $result = $this->getter->getPluginDescription($uri);
                expect($result)->to->equal('ERROR');
            });
        });
        context('matching description in response', function () {
            it('returns first match', function () {
                $uri = 'http://foo.bar/';
                $response = [
                    'body' => '<p itemprop="description" class="shortdesc">First para of description</p><p itemprop="description" class="shortdesc">Second para of description</p>',
                    'header' => 'a head'
                ];
                WP_Mock::wpFunction('wp_remote_get', [
                    'times' => 1,
                    'args' => [
                        $uri,
                        [
                           'timeout' => 15
                        ]
                    ],
                    'return' => $response
                ]);
                $result = $this->getter->getPluginDescription($uri);
                expect($result)->to->equal('First para of description');
            });
        });
    });

    describe('->getPluginInfo()', function () {
        it('returns the unserialized response', function () {
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
                'return' =>[
                    'body' => 'a:2:{i:0;s:5:"first";i:1;s:6:"second";}'
                ]
            ]);
            $result = $this->getter->getPluginInfo('foo');
            expect($result)->to->equal([
                'first',
                'second'
            ]);
        });
    });

});

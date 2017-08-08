<?php

describe(\Dxw\DxwSecurity2017\Lib\FetchPluginDetails\Getter::class, function () {
    beforeEach(function () {
        \WP_Mock::setUp();
        $this->getter = new \Dxw\DxwSecurity2017\Lib\FetchPluginDetails\Getter();
    });

    afterEach(function () {
        \WP_Mock::tearDown();
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

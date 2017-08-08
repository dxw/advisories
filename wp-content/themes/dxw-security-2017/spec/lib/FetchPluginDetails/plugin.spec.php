<?php

describe(\Dxw\DxwSecurity2017\Lib\FetchPluginDetails\Plugin::class, function () {
    beforeEach(function () {
        \WP_Mock::setUp();
        $this->getter = Mockery::mock(\Dxw\DxwSecurity2017\Lib\FetchPluginDetails\WordPressApiGetter::class);
        $this->plugin = new \Dxw\DxwSecurity2017\Lib\FetchPluginDetails\Plugin($this->getter);
    });

    afterEach(function () {
        \WP_Mock::tearDown();
    });

    describe('->getDetails()', function () {
        context('result isErr()', function () {
            it('echoes ok=>false then dies', function () {
                $slug = 'foo';
                $result = Mockery::Mock(\Dxw\Result\Result::class);
                $this->getter->shouldReceive('getPluginInfo')
                    ->once()
                    ->with($slug)
                    ->andReturn($result);
                $result->shouldReceive('isErr')
                    ->once()
                    ->andReturn(true);
                WP_Mock::wpFunction('wp_die', [
                    'times' => 1,
                ]);
                ob_start();
                $this->plugin->getDetails($slug);
                $result = ob_get_clean();
                expect($result)->to->equal("{\"ok\":false}\n");
            });
        });

        context('valid response', function () {
            context('description has multiple paras', function () {
                it('gets first para of description and returns data', function () {
                    $slug = 'foo';
                    $response = Mockery::Mock(\Dxw\Result\Result::class);
                    $responseContent = new stdClass();
                    $responseContent->name = 'Plugin name';
                    $responseContent->version = '1.1.1';
                    $responseContent->contributors = [
                        'author1' => 'about1',
                        'author2' => 'about2'
                    ];
                    $responseContent->sections = [
                        'description' => '<h1>A heading</h1><p>First para</p><p>Second para</p>'
                    ];
                    $this->getter->shouldReceive('getPluginInfo')
                        ->once()
                        ->with($slug)
                        ->andReturn($response);
                    WP_Mock::wpFunction('wp_die', [
                        'times' => 0,
                    ]);
                    $response->shouldReceive('isErr')
                        ->once()
                        ->andReturn(false);
                    $response->shouldReceive('unwrap')
                        ->once()
                        ->andReturn($responseContent);
                    $result = $this->plugin->getDetails($slug);
                    expect($result)->to->equal([
                        'description' => 'First para',
                        'ok' => true,
                        'slug' => $slug,
                        'name' => 'Plugin name',
                        'version' => '1.1.1',
                        'author' => 'author1, author2',
                        'link' => 'http://wordpress.org/plugins/foo/',
                    ]);
                });
            });
            context('description has no paras', function () {
                it('returns data with empty description', function () {
                    $slug = 'foo';
                    $response = Mockery::Mock(\Dxw\Result\Result::class);
                    $responseContent = new stdClass();
                    $responseContent->name = 'Plugin name';
                    $responseContent->version = '1.1.1';
                    $responseContent->contributors = [
                        'author1' => 'about1',
                        'author2' => 'about2'
                    ];
                    $responseContent->sections = [
                        'description' => '<h1>A heading</h1>'
                    ];
                    $this->getter->shouldReceive('getPluginInfo')
                        ->once()
                        ->with($slug)
                        ->andReturn($response);
                    WP_Mock::wpFunction('wp_die', [
                        'times' => 0,
                    ]);
                    $response->shouldReceive('isErr')
                        ->once()
                        ->andReturn(false);
                    $response->shouldReceive('unwrap')
                        ->once()
                        ->andReturn($responseContent);
                    $result = $this->plugin->getDetails($slug);
                    expect($result)->to->equal([
                        'description' => '',
                        'ok' => true,
                        'slug' => $slug,
                        'name' => 'Plugin name',
                        'version' => '1.1.1',
                        'author' => 'author1, author2',
                        'link' => 'http://wordpress.org/plugins/foo/',
                    ]);
                });
            });
        });
    });

});

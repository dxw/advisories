<?php

namespace Dxw\DxwSecurity2017\Lib\FetchPluginDetails;

class WordPressApiGetter
{
    public function getPluginInfo($slug)
    {
        // Whoever thought PHP serialized objects were a good idea for an API needs a slap

        $response = wp_remote_post(
            'https://api.wordpress.org/plugins/info/1.0/',
            [
                'body' => [
                    'action' => 'plugin_information',
                    'request' => serialize((object)[
                        'slug' => $slug,
                    ]),
                ],
                'timeout' => 15
            ]
        );
        if (is_wp_error($response)) {
            return \Dxw\Result\Result::err($response->get_error_message());
        }
        return \Dxw\Result\Result::ok(unserialize($response['body']));
    }
}

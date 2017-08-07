<?php

namespace Dxw\DxwSecurity2017\Lib\FetchPluginDetails;

class Getter {

    public function getPluginDescription($uri) {
        // Scrape WP.org

        $response = wp_remote_get(
            $uri,
            [
                'timeout' => 15
            ]
        );
        $html = $response['body'];

        preg_match('_<p itemprop="description" class="shortdesc">(.*?)</p>_s', $html, $m);
        if ($m) {
            return trim($m[1]);
        }
        return 'ERROR';
    }

    public function getPluginInfo($slug) {
        // Whoever thought PHP serialized objects were a good idea for an API needs a slap

        $response = wp_remote_post(
            'https://api.wordpress.org/plugins/info/1.0/',
            array(
                'body' => array(
                    'action' => 'plugin_information',
                    'request' => serialize((object)array(
                        'slug' => $slug,
                    )),
                ),
                'timeout' => 15
                )
            );
        return unserialize($response['body']);
    }

}

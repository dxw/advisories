<?php

namespace Dxw\DxwSecurity2017\Lib\FetchPluginDetails;

class Getter {

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

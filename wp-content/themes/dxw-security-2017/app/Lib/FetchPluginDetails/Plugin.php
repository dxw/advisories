<?php

namespace Dxw\DxwSecurity2017\Lib\FetchPluginDetails;

class Plugin
{
    private $getter;

    public function __construct(WordPressApiGetter $getter)
    {
        $this->getter = $getter;
    }

    public function getDetails($slug)
    {
        $result = $this->getter->getPluginInfo($slug);

        if ($result->isErr()) {
            return(['ok' => false]);
        } else {
            $response = $result->unwrap();
            $data = [];
            $bigDesc = $response->sections['description'];
            preg_match('/<p>(.*?)<\/p>/', $bigDesc, $m);
            if ($m) {
                $data['description'] = strip_tags($m[0]);
            } else {
                $data['description'] = '';
            }
            $data['ok'] = true;
            $data['slug'] = $slug;
            $data['name'] = $response->name;
            $data['version'] = $response->version;
            $data['author'] = strip_tags($response->author);
            $data['link'] = 'https://wordpress.org/plugins/'.$slug.'/';

            return $data;
        }
    }
}

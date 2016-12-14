<?php

namespace DxwSec\API;

// Responsible for packaging up the interesting data about an inspection
class Inspection
{
    public $name;
    public $slug;
    public $date;

    private $post_id;

    public function __construct($raw_inspection) {
        $this->post_id = $raw_inspection->ID;
        $this->name = trim($raw_inspection->post_title);
        $this->slug = $this->strip_trailing_digits($raw_inspection->post_name);
        $this->date = date_create($raw_inspection->post_date);
    }

    public function url()
    {
        return get_permalink($this->post_id);
    }

    public function result()
    {
        $recommendation = get_field('recommendation', $this->post_id);
        return $this->recommendation_map($recommendation);
    }

    private function strip_trailing_digits($string)
    {
        return preg_replace('/-\d+$/', '', $string);
    }

    private function recommendation_map($code) {
        return [
          'green' => 'No issues found',
          'yellow' => 'Use with caution',
          'red' => 'Potentially unsafe',
        ][$code];
    }
}

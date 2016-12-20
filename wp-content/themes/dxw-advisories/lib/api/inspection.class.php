<?php

namespace DxwSec\API;

// Responsible for packaging up the interesting data about an inspection
class Inspection
{
    public $name;
    public $slug;
    public $date;

    private $post_id;

    public function __construct($raw_inspection)
    {
        $this->post_id = $raw_inspection->ID;
        $this->name = trim($raw_inspection->post_title);
        $this->slug = $this->stripTrailingDigits($raw_inspection->post_name);
        $this->date = $this->parseDate($raw_inspection->post_date);
    }

    public function versions()
    {
        return get_field('version_of_plugin', $this->post_id);
    }

    public function url()
    {
        return get_permalink($this->post_id);
    }

    public function result()
    {
        $recommendation = get_field('recommendation', $this->post_id);
        return $this->recommendationMap($recommendation);
    }

    private function stripTrailingDigits($string)
    {
        return preg_replace('/-\d+$/', '', $string);
    }

    private function recommendationMap($code)
    {
        return [
          'green' => 'No issues found',
          'yellow' => 'Use with caution',
          'red' => 'Potentially unsafe',
        ][$code];
    }

    private function parseDate($string)
    {
        return date_create($string, timezone_open('UTC'));
    }
}

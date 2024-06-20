<?php

namespace Dxw\DxwSecurity2017\Theme;

class Helpers implements \Dxw\Iguana\Registerable
{
	private $helpers;

	public function __construct(\Dxw\Iguana\Theme\Helpers $helpers)
	{
		$this->helpers = $helpers;
	}

	public function register()
	{
		$this->helpers->registerFunction('the_title_for_email', [$this, 'the_title_for_email']);
		$this->helpers->registerFunction('the_advisory_id', [$this, 'the_advisory_id']);
		$this->helpers->registerFunction('the_short_recommendation', [$this, 'the_short_recommendation']);
		$this->helpers->registerFunction('the_recommendation', [$this, 'the_recommendation']);
		$this->helpers->registerFunction('recommendation_data', [$this, 'recommendation_data']);
		$this->helpers->registerFunction('get_field_label', [$this, 'get_field_label']);
		$this->helpers->registerFunction('the_field_label', [$this, 'the_field_label']);
		$this->helpers->registerFunction('the_other_versions', [$this, 'the_other_versions']);
		$this->helpers->registerFunction('get_plugin_vulnerabilities', [$this, 'get_plugin_vulnerabilities']);
		$this->helpers->registerFunction('the_plugin_vulnerabilities', [$this, 'the_plugin_vulnerabilities']);
		$this->helpers->registerFunction('get_cvss_score', [$this, 'get_cvss_score']);
		$this->helpers->registerFunction('the_cvss_score', [$this, 'the_cvss_score']);
		$this->helpers->registerFunction('get_cvss_severity', [$this, 'get_cvss_severity']);
		$this->helpers->registerFunction('the_cvss_severity', [$this, 'the_cvss_severity']);
	}

	public function the_title_for_email($post_id = 0)
	{
		echo preg_replace("/^Private: /", "", get_the_title($post_id));

		if (get_field('is_plugin', $post_id) == 'yes') {
			echo " (WordPress plugin)";
		}
	}

	public function the_advisory_id($post_id = 0)
	{
		global $post;

		if (!$post_id) {
			$post_id = $post->ID;
		}

		$date = get_post_meta($post_id, '_first_published', true);

		echo "dxw-" . date('Y', strtotime($date)) . "-" . $post_id;
	}

	public function the_short_recommendation($post_id = 0)
	{
		$recommendation = $this->recommendation_data(get_field('recommendation', $post_id)); ?>

        <p class="<?php echo $recommendation->slug ?> recommendation"><span class="name"><?php echo str_replace(',', ', ', get_field('version_of_plugin')) ?> -</span> <?php echo $recommendation->name ?></p>
    <?php
	}

	public function the_recommendation()
	{
		$recommendation = $this->recommendation_data(get_field('recommendation'));
		$assurance = get_field('assurance_level');

		if ($assurance == 'codereviewed') {
			$assurance_level = 'High';
			$assurance = 'This plugin has been given a thorough, line-by-line review.';
		} else {
			$assurance_level = 'Medium';
			$assurance = 'This plugin has been given a short, targeted code review.';
		} ?>
        <header>
            <h2 class="<?php echo $recommendation->slug ?>"><?php echo $recommendation->name ?></h2>
            <p class="review">Last revised: <time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time></p>
        </header>
        <div class="recommendation-description">
            <p><strong>Confidence: <?php echo $assurance_level; ?></strong>
            <br><?php echo $assurance; ?></p>
            <p><?php echo $recommendation->text ?> <a href="/about/plugin-inspections/#recommendations" class="recs">Read more about this recommendation.</a></p>
        </div>
    <?php
	}

	public function recommendation_data($recommendation)
	{
		$data = new \stdClass();

		switch ($recommendation) {
			case 'red':
				$data->name = 'Potentially unsafe';
				$data->slug = 'unsafe';
				$data->text = 'Before using this plugin, you should very carefully consider its potential problems and should conduct a thorough assessment.';
				break;
			case 'yellow':
				$data->name = 'Use with caution';
				$data->slug = 'caution';
				$data->text = 'Before using this plugin, you should carefully consider these findings.';
				break;
			case 'green':
				$data->name = 'No issues found';
				$data->slug = 'good';
				$data->text = "We didn't find anything worrying in this plugin. It's probably safe.";
				break;
		}

		return $data;
	}

	public function get_field_label($field_key, $post_id = null, $options = [])
	{
		global $post;
		$field = get_field_object($field_key, $post_id, $options);

		if (is_array($field['value'])) {
			$labels = [];
			foreach ($field['value'] as $i => $value) {
				$labels[$value] = $field['choices'][$value];
			}

			return $labels;
		}

		return isset($field['choices'][$field['value']]) ? $field['choices'][$field['value']] : '';
	}

	public function the_field_label($field_key, $post_id = null, $options = [])
	{
		echo $this->get_field_label($field_key, $post_id, $options);
	}

	public function the_other_versions()
	{
		$posts = get_posts([
		'post_type' => 'plugins',
		'meta_key' => 'codex_link',
		'meta_value' => get_field('codex_link')
		]);

		if (count($posts) <= 1) {
			?> <dd>None listed</dd> <?php

			return;
		}

		foreach ($posts as $p) {
			if ($p->ID == get_the_id()) {
				continue;
			} ?>
            <dd><a href="<?php echo get_permalink($p); ?>"><?php echo $p->post_title; ?></a></dd>
            <?php
		}
	}

	public function get_plugin_vulnerabilities($codex_link, $version)
	{
		return get_posts([
		'post_type' => 'advisories',
		'meta_query' => [
		  'relation' => 'and',
		  [
			'key' => 'codex_link',
			'value' => $codex_link,
			'compare' => '='
		  ],
		  [
			'key' => 'is_plugin',
			'value' => 'yes',
			'compare' => '='
		  ],
		  [
			'key' => 'version',
			'value' => explode(',', $version),
			'compare' => 'IN'
		  ]
		]
		]);
	}

	public function the_plugin_vulnerabilities()
	{
		return $this->get_plugin_vulnerabilities(get_field('codex_link'), get_field('version_of_plugin'));
	}

	public function get_cvss_score()
	{
		$exploitability = 20 * get_field('access_vector') * get_field('access_complexity') * get_field('authentication');
		$impact = 10.41 * (1 - (1 - get_field('confidentiality')) * (1 - get_field('availability')) * (1 - get_field('integrity')));
		$f_impact = $impact == 0 ? 0 : 1.176;

		return round(((0.6 * $impact) + (0.4 * $exploitability) - 1.5) * $f_impact, 1);
	}

	public function the_cvss_score()
	{
		echo $this->get_cvss_score();
	}

	public function get_cvss_severity()
	{
		$s = $this->get_cvss_score();

		if ($s < 3.9) {
			return "Low";
		} elseif ($s < 6.9) {
			return "Medium";
		} else {
			return "High";
		}
	}

	public function the_cvss_severity()
	{
		echo $this->get_cvss_severity();
	}
}

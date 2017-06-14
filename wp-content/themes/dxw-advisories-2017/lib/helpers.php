<?php

function the_title_for_email($post_id = 0)
{
    echo preg_replace("/^Private: /", "", get_the_title($post_id));

    if (get_field('is_plugin', $post_id) == 'yes') {
        echo " (WordPress plugin)";
    }
}

function the_advisory_id($post_id = 0)
{
    global $post;

    if (!$post_id) {
        $post_id = $post->ID;
    }

    $date = get_post_meta($post_id, '_first_published', true);

    echo "dxw-" . date('Y', strtotime($date)) . "-" . $post_id;
}

function the_short_recommendation($post_id = 0)
{
    $recommendation = recommendation_data(get_field('recommendation', $post_id));
?>
    <span class="<?php echo $recommendation->slug ?> short"><?php echo $recommendation->name ?></span>
<?php
}

function the_recommendation()
{
    $recommendation = recommendation_data(get_field('recommendation'));
    $assurance = get_field('assurance_level');

    if ($assurance == 'codereviewed') {
        $assurance = 'High <span>This plugin has been given a thorough, line-by-line review</span>';
    } else {
        $assurance = 'Medium <span>This plugin has been given a short, targeted code review.</span>';
    }
?>
    <h5 class="<?php echo $recommendation->slug ?>"><?php echo $recommendation->name ?></h5>
    <div>
      <p class="confidence">Confidence: <a class="tooltipo"><?php echo $assurance; ?></a></p>
      <p><?php echo $recommendation->text ?></p>
      <p><a href="/about/plugin-inspections/#recommendations" class="recs">More information about this recommendation</a></p>
    </div>
<?php
}

function recommendation_data($recommendation)
{
    $data = new stdClass();

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

function get_field_label($field_key, $post_id = null, $options = array())
{
    global $post;
    $field = get_field_object($field_key, $post_id, $options);

    if (is_array($field['value'])) {
        $labels = array();
        foreach ($field['value'] as $i => $value) {
            $labels[$value] = $field['choices'][$value];
        }

        return $labels;
    }

    return isset($field['choices'][$field['value']]) ? $field['choices'][$field['value']] : '';
}


function the_field_label($field_key, $post_id = null, $options = array())
{
    echo get_field_label($field_key, $post_id, $options);
}

function the_other_versions()
{
    $posts = get_posts(array(
    'post_type' => 'plugins',
    'meta_key' => 'codex_link',
    'meta_value' => get_field('codex_link')
    ));

    if (count($posts) <= 1) {
        ?> <p class="other_versions no_results">None listed</p> <?php

    return;
    }

    ?><ul class="other_versions"><?php
foreach ($posts as $p) {
    if ($p->ID == get_the_id()) {
        continue;
    }
    ?>
    <li><a href="<?php echo get_permalink($p); ?>"><?php echo $p->post_title; ?></a></li>
    <?php
}
    ?></ul><?php
}

function get_plugin_vulnerabilities($codex_link, $version)
{
    return get_posts(array(
    'post_type' => 'advisories',
    'meta_query' => array(
      'relation' => 'and',
      array(
        'key' => 'codex_link',
        'value' => $codex_link,
        'compare' => '='
      ),
      array(
        'key' => 'is_plugin',
        'value' => 'yes',
        'compare' => '='
      ),
      array(
        'key' => 'version',
        'value' => explode(',', $version),
        'compare' => 'IN'
      )
    )
    ));
}


function plugin_vulnerabilities()
{
    $posts = get_plugin_vulnerabilities(get_field('codex_link'), get_field('version_of_plugin'));

    if (!count($posts)) {
        ?> <p class="other-versions no_results">None</p> <?php

    return;
    }

    ?><ul class="vulnerabilities"><?php
foreach ($posts as $p) {
    ?>
    <li><a href="<?php echo get_permalink($p); ?>"><?php echo $p->post_title; ?></a></li>
    <?php
}
    ?></ul><?php
}
function get_cvss_score()
{
    $exploitability = 20 * get_field('access_vector') * get_field('access_complexity') * get_field('authentication');
    $impact = 10.41 * (1 - (1 - get_field('confidentiality')) * (1 - get_field('availability')) * (1 - get_field('integrity')));
    $f_impact = $impact == 0 ? 0 : 1.176;

    return round(((0.6 * $impact) + (0.4 * $exploitability) - 1.5) * $f_impact, 1);
}

function the_cvss_score()
{
    echo get_cvss_score();
}

function get_cvss_severity()
{
    $s = get_cvss_score();

    if ($s < 3.9) {
        return "Low";
    } elseif ($s < 6.9) {
        return "Medium";
    } else {
        return "High";
    }
}

function the_cvss_severity()
{
    echo get_cvss_severity();
}

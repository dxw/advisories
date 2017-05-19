<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="span8">
        <h1><?php the_title() ?></h1>
        <p><?php echo get_field('description') ?></p>
        <p><a href="<?php echo get_field('codex_link') ?>">More information &raquo;</a></p>
      </div>
      <div class="span4">
        <div class="recommendation plugin <?php echo get_field('recommendation'); ?>"><?php the_recommendation() ?></div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
  <article <?php post_class() ?>>

    <?php $vulns = get_plugin_vulnerabilities(get_field('codex_link'), get_field('version_of_plugin')); ?>
    <?php if(count($vulns)): ?>
      <div class="span12 content alert alert-error">
        <div>
          <h3>Warning: Version <?php the_field('version_of_plugin'); ?> of this plugin has known vulnerabilities</h3>
          <p>The version of this plugin that this recommendation was based on is known to be vulnerable to attack:</p>
          <?php plugin_vulnerabilities(); ?>
        </div>
      </div>
    <?php endif; ?>

    <?php $plugin = new PluginVersionChecker() ?>
    <?php if ($plugin->is_old()) : ?>
      <div class="span12 content alert alert-error">
        <div>
          <h3>Warning: old version</h3>
          <p>This recommendation applies to version <?php echo end(explode(',',get_field('version_of_plugin'))) ?> of this plugin, but the most recent version is <?php echo esc_html($plugin->most_recent_version()) ?>. These findings may no longer be correct.</p>

          <?php if ($plugin->have_latest()) : ?>
            <p><a href="<?php echo esc_html($plugin->our_most_recent_link()) ?>">View the recommendation for version <?php echo esc_html($plugin->our_most_recent_version()) ?> of this plugin instead</a></p>
          <?php endif ?>
        </div>
      </div>
    <?php endif ?>

    <div class="span8 content">
      <h3>Findings</h3>
      <p><?php echo get_field('findings') ?></p>
      <?php
        $failure_criteria = get_field_label('matched_criteria');
        if(is_array($failure_criteria) && count($failure_criteria)) {
      ?>

        <h3>Failure criteria</h3>
        <?php
          $recommendation = get_field('recommendation');

          if($recommendation != 'green') {
            echo '<p>' . get_field_label('recommendation_criterion_' . $recommendation) . ':</p>';
            echo '<blockquote><p>' . get_field('reason') . '</p></blockquote>';
          }
        ?>

        <p>Read more about our <a href="/about/plugin-inspections/#failure_criteria">failure criteria</a>.</p>
        <table class="failure_criteria table-striped table">
        <tbody>
          <?php foreach($failure_criteria as $criterion) { ?>
            <tr>
              <td class="span1 bad"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/bad.png" width="22" height="22" alt="Fail"></td>
              <td><?php echo $criterion ?></td>
            </tr>
          <?php } ?>
        </tbody>
        </table>
      <?php } ?>
    </div>

    <div class="span4">
      <?php get_template_part('templates/disclaimer') ?>

      <dl>
        <dt>Testers</dt>
        <dd><?php  if(function_exists('coauthors')) { coauthors(); } else { the_author(); } ?> </dd>

        <dt>Last revised</dt>
        <dd><?php the_modified_date() ?></dd>

        <dt>Versions tested</dt>
        <dd><?php echo str_replace(',', ', ', get_field('version_of_plugin')) ?></dd>

        <dt>Plugin homepage</dt>
        <dd><a href="<?php the_field('codex_link'); ?>"><?php the_field('name_of_plugin'); ?></a>

        <dt>Other versions</dt>
        <dd> <?php the_other_versions(); ?></dd>
      </dl>
    </div>
  </article>
<?php get_template_part('templates/footer-page') ?>

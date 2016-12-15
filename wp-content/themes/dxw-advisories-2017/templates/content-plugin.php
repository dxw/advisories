<section class="content-plugins">

    <header class="page-title">
        <div class="row">
            <div class="title">
                <h1><?php the_title() ?></h1>
                <p><?php echo get_field('description') ?></p>
                <a href="<?php echo get_field('codex_link') ?>" class="button button--inverted">View plugin homepage</a>
            </div>
            <section class="recommendation plugin <?php echo get_field('recommendation'); ?>">
                <div class="inner"><?php the_recommendation() ?></div>
            </section>
        </div>
    </header>

    <article <?php post_class('row rich-text') ?>>

        <div class="findings">

            <?php $vulns = get_plugin_vulnerabilities(get_field('codex_link'), get_field('version_of_plugin')); ?>
            <?php if(count($vulns)): ?>
            <section class="alert alert-error">
                <h2>Warning: Version <?php the_field('version_of_plugin'); ?> of this plugin has known vulnerabilities</h2>
                <p>The version of this plugin that this recommendation was based on is known to be vulnerable to attack:</p>
                <?php plugin_vulnerabilities(); ?>
            </section>
            <?php endif; ?>

            <?php $plugin = new PluginVersionChecker() ?>
            <?php if ($plugin->is_old()) : ?>
            <section class="alert alert-error">
                <h2>Warning: old version</h2>
                <p>This recommendation applies to version <?php echo end(explode(',',get_field('version_of_plugin'))) ?> of this plugin, but the most recent version is <?php echo esc_html($plugin->most_recent_version()) ?>. These findings may no longer be correct.</p>
                <?php if ($plugin->have_latest()) : ?>
                <p><a href="<?php echo esc_html($plugin->our_most_recent_link()) ?>">View the recommendation for version <?php echo esc_html($plugin->our_most_recent_version()) ?> of this plugin instead</a></p>
                <?php endif ?>
            </section>
            <?php endif ?>

            <section class="report">
                <h2>Findings</h2>
                <?php echo get_field('findings') ?>
                <?php
                    $failure_criteria = get_field_label('matched_criteria');
                    if (is_array($failure_criteria) && count($failure_criteria)) {
                ?>

                <h3>Failure criteria</h3>
                <?php
                    $recommendation = get_field('recommendation');
                    if ($recommendation != 'green') {
                        echo '<p>' . get_field_label('recommendation_criterion_' . $recommendation) . ':</p>';
                        echo get_field('reason');
                    }
                ?>
                <p>Read more about our <a href="/about/plugin-inspections/#failure_criteria">failure criteria</a>.</p>

                <table class="failure-criteria table">
                    <thead>
                        <tr>
                            <th class="status">Status</th>
                            <th>Reasons</th>
                        </tr>
                    </thead>
                  <tbody>
                    <?php
                        foreach($failure_criteria as $criterion) {
                    ?>
                    <tr>
                        <td class="fail"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/bad.svg" width="22" height="22" alt="Fail"></td>
                        <td><?php echo $criterion ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <?php } ?>
            </section>
        </div>

        <aside role="complementary" class="meta">
            <?php get_template_part('templates/disclaimer') ?>

            <dl>
                <dt>Testers</dt>
                <dd><?php  if(function_exists('coauthors')) { coauthors(); } else { the_author(); } ?> </dd>

                <dt>Last revised</dt>
                <dd><?php the_modified_date() ?></dd>

                <dt>Versions tested</dt>
                <dd><?php echo str_replace(',', ', ', get_field('version_of_plugin')) ?></dd>

                <dt>Plugin homepage</dt>
                <dd><a href="<?php the_field('codex_link'); ?>"><?php the_field('name_of_plugin'); ?></a></dd>

                <dt>Other versions</dt>
                <dd> <?php the_other_versions(); ?></dd>
            </dl>
            
        </aside>

    </article>

</section>

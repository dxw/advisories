<section class="content-plugins">

    <header class="page-title">
        <div class="row rich-text">
            <h1><?php the_title() ?></h1>
            <p><?php echo get_field('description') ?></p>
            <a href="<?php echo get_field('codex_link') ?>" class="button button--inverted">View plugin homepage</a>
        </div>
    </header>

    <div class="row">

        <article class="rich-text findings">

            <section class="recommendation plugin <?php echo get_field('recommendation'); ?>">
                <?php the_recommendation() ?>
            </section>

            <?php if(count(the_plugin_vulnerabilities())): ?>
            <section class="alert alert-error">
                <h2>Warning: Version <?php the_field('version_of_plugin'); ?> of this plugin has known vulnerabilities</h2>
                <p>The version of this plugin that this recommendation was based on is known to be vulnerable to attack:</p>

                <ul class="vulnerabilities">
                <?php foreach ($posts as $p) { ?>
                    <li><a href="<?php echo get_permalink($p); ?>"><?php echo $p->post_title; ?></a></li>
                <?php } ?>
                </ul>
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
                    $recommendation = get_field('recommendation');
                    if ($recommendation != 'green') :
                ?>
                    <?php $recommendation_data = recommendation_data($recommendation); ?>
                    <h3>Reason for the '<?php echo $recommendation_data->name ?>' result</h3>
                    <p><?php echo get_field_label('recommendation_criterion_' . $recommendation) ?>:</p>
                    <?php echo get_field('reason') ?>

                    <?php
                        $failure_criteria = get_field_label('matched_criteria');
                        if(is_array($failure_criteria) && count($failure_criteria)) :
                    ?>
                        <h3>Failure criteria</h3>
                        <table class="failure_criteria">
                            <tbody>
                            <?php foreach($failure_criteria as $criterion) { ?>
                                <tr>
                                    <td class="fail"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/bad.svg" width="22" height="22" alt="Fail"></td>
                                    <td><?php echo $criterion ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <p>Read more about our <a href="/about/plugin-inspections/#failure_criteria">failure criteria</a>.</p>
                    <?php endif ?>
                <?php endif ?>
            </section>

        </article>

        <aside class="rich-text meta" role="complementary" >
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
                <dd><?php the_other_versions(); ?></dd>
            </dl>
        </aside>

    </div>

</section>

<section class="page-header-panel">
    <header class="row">
        <h2>
            <?php
                $assurance = get_field('assurance_level');
                if ($assurance == 'codereviewed') :
                    echo 'Plugin review:';
                elseif ($assurance == 'inspected') :
                    echo 'Plugin inspection:';
                endif;
            ?>
        </h2>
        <h1><?php the_title(); ?></h1>
    </header>
</section>

<section class="inspection-introduction">
    <div class="row">
        <div class="inspection-container">
            <?php h()->the_recommendation(); ?>
        </div>
    </div>
</section>

<div class="row">
    <section class="page-section inspection-content">

        <?php
            $plugin = new \Dxw\DxwSecurity2017\Lib\PluginVersionChecker();
            $posts = h()->the_plugin_vulnerabilities();
            if (count($posts) || $plugin->is_old()) :
                echo '<h2>Warnings</h2>';
            endif;

            if (count($posts)) : ?>
                <section class="warning">
                    <button type="button" id="vulnerabilities" class="anchor">Version <?php the_field('version_of_plugin'); ?> of this plugin has known vulnerabilities</button>
                    <div id="vulnerabilities" class="details">
                        <p>The version of this plugin that this recommendation was based on is known to be vulnerable to attack:</p>
                        <ul>
                        <?php foreach ($posts as $p) { ?>
                            <li><a href="<?php echo get_permalink($p); ?>"><?php echo $p->post_title; ?></a></li>
                        <?php } ?>
                        </ul>
                    </div>
                </section>
            <?php endif;

            if ($plugin->is_old()) : ?>
                <section class="warning">
                    <button type="button" id="old-versions" class="anchor">Old version</button>
                    <div id="old-versions" class="details">
                        <?php $version_list = explode(',',get_field('version_of_plugin')); ?>
                        <p>This recommendation applies to version <?php echo end($version_list) ?> of this plugin, but the most recent version is <?php echo esc_html($plugin->most_recent_version()) ?>. These findings may no longer be correct.</p>
                        <?php if ($plugin->have_latest()) : ?>
                            <p><a href="<?php echo esc_html($plugin->our_most_recent_link()) ?>">View the recommendation for version <?php echo esc_html($plugin->our_most_recent_version()) ?> of this plugin instead</a></p>
                        <?php endif ?>
                    </div>
                </section>
            <?php endif;
        ?>

        <article class="report">
            <h2>Findings</h2>
            <div class="rich-text">
                <?php the_field('findings') ?>
            </div>

            <?php
                $recommendation = get_field('recommendation');
                if ($recommendation != 'green') :
            ?>
                <?php $recommendation_data = h()->recommendation_data($recommendation); ?>
                <h2>Reason for the '<?php echo $recommendation_data->name ?>' result</h2>
                <div class="rich-text">
                    <p><?php echo h()->get_field_label('recommendation_criterion_' . $recommendation) ?>:</p>
                    <?php the_field('reason') ?>
                </div>
            <?php endif ?>
        </article>
        
        <?php
            $failure_criteria = h()->get_field_label('matched_criteria');
            if(is_array($failure_criteria) && count($failure_criteria)) :
        ?>
            <section class="failure-criteria rich-text">
                <h2>Failure criteria</h2>
                <ul class="criteria-list">
                    <?php foreach($failure_criteria as $criterion) { ?>
                        <li><?php echo $criterion ?></li>
                    <?php } ?>
                </ul>
                <p>Read more about our <a href="/about/plugin-inspections/#failure-criteria">failure criteria</a>.</p>
            </section>
        <?php endif ?>

    </section>

    <aside class="sidebar page-section">
        <section>
            <dl class="inspection-details">
                <dt>Testers:</dt>
                <dd><?php if(function_exists('coauthors')) { coauthors(); } else { the_author(); } ?></dd>

                <dt>Versions tested:</dt>
                <dd><?php the_field('version_of_plugin'); ?></dd>

                <dt>Other versions:</dt>
                <?php h()->the_other_versions(); ?>

                <dt>Plugin homepage:</dt>
                <dd><a href="<?php the_field('codex_link'); ?>"><?php the_field('name_of_plugin'); ?></a></dd>
            </dl>
        </section>
        <?php dynamic_sidebar( 'sidebar-primary' ); ?>
    </aside>
</div>

<?php get_template_part('partials/options-banner'); ?>

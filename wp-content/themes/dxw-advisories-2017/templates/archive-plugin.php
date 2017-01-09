<section class="content-plugins">
    <header class="page-title">
        <div class="row rich-text">
            <h1>Plugins</h1>
            <p>This section contains the results of plugin <a href="/about/plugin-inspections">inspections</a> and <a href="/about/plugin-reviews">reviews</a> that we conduct for our clients.</p>
            <p>We release them publicly to help the community make better decisions about plugin use, and to help plugin authors increase the quality of their code.</p>
            <p>Please read this site's <a href="/terms">terms of service</a> before taking any action based on information published here.</p>
        </div>
    </header>

    <?php get_search_form() ?>

    <div class="archive-posts row">
        <div class="posts">

            <?php while (have_posts()) : ?>
              <?php the_post() ?>
              <article>
                <h2>
                    <a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                    <span class="version">Version: <?php echo str_replace(',', ', ', get_field('version_of_plugin')) ?></span>
                </h2>
                <time class="updated" datetime="<?php echo get_the_time('c') ?>" pubdate><?php echo get_the_date('j F Y') ?></time>
                <span class="recommendation <?php echo the_field('recommendation'); ?>"><?php the_field_label('recommendation'); ?></span>

                <div class="summary rich-text">
                    <?php echo get_field('description') ?>
                </div>
              </article>
            <?php endwhile ?>

            <?php get_template_part('templates/pager') ?>
        </div>
        <?php get_template_part('templates/order', 'plugin') ?>
    </div>
</section>

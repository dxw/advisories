<section class="content-plugins">
    <header class="page-title">
        <div class="row rich-text">
            <h1>Advisories</h1>
            <p>This section contains advisories about security vulnerabilities that we identify. Most will relate to WordPress plugins.</p>
            <p>We release vulnerability information publicly only after coordination (or attempted coordination) with software authors. For more information, please see our <a href="/disclosure">disclosure policy</a>.</p>
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
                </h2>

                <time class="updated" datetime="<?php echo get_the_time('c') ?>" pubdate><?php echo get_the_date('j F Y') ?></time>
                <span class="severity <?php echo strtolower(get_cvss_severity()); ?>">Severity: <?php the_cvss_severity(); ?></span>

              </article>
            <?php endwhile ?>

            <?php get_template_part('templates/pager') ?>
        </div>
        <?php get_template_part('templates/order', 'plugin') ?>
    </div>
</section>

<section class="content-plugins">
    <header class="page-title">
        <div class="row">
            <h1>Notices</h1>
            <p>This section contains details of past and ongoing attacks against our infrastructure and the sites hosted on it.</p>
            <p>This information is shared with a select group of individuals and organisations, and should not be recklessly shared.</p>
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
                <?php get_template_part('templates/entry-meta', 'advisory') ?>
                <div class="summary rich-text">
                    <?php echo get_field('summary') ?>
                </div>
              </article>
            <?php endwhile ?>

            <?php get_template_part('templates/pager') ?>
        </div>
        <?php get_template_part('templates/order', 'plugin') ?>
    </div>
</section>

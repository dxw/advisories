<?php get_template_part('partials/homepage-panel'); ?>

<?php get_template_part('partials/global-search-form'); ?>

<?php if (get_field('heading')) : ?>
    <section class="page-section homepage-services">
        <div class="row">
            <header>
                <h2><?php the_field('heading'); ?></h2>
            </header>
            <div class="row services">
                <?php if( have_rows('services') ):
                    while ( have_rows('services') ) : the_row(); ?>

                        <article class="service">
                            <a href="<?php the_sub_field('link'); ?>" class="icon-<?php the_sub_field('icon_name'); ?>">
                                <h3><?php the_sub_field('title'); ?></h3>
                                <?php the_sub_field('description'); ?>
                            </a>
                        </article>

                    <?php endwhile;
                endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<section class="page-section homepage-feeds">
    <div class="row">

        <section class="homepage-feed-container feed-container">
            <h2>Recent plugin recommendations</h2>
            <?php global $post;
                $args = array('post_type' => 'Plugins');
                $custom_posts = get_posts($args);
                foreach($custom_posts as $post) : setup_postdata($post); ?>
                <?php get_template_part('partials/article-list-item'); ?>
            <?php endforeach; ?>
            <a href="/plugins" class="button">All plugin recommendations</a>
        </section>

        <section class="homepage-feed-container feed-container">
            <h2>Recent advisories</h2>
            <?php global $post;
                $args = array('post_type' => 'Advisories');
                $custom_posts = get_posts($args);
                foreach($custom_posts as $post) : setup_postdata($post); ?>
                <?php get_template_part('partials/article-list-item'); ?>
            <?php endforeach; ?>
            <a href="/advisories" class="button">All advisories</a>
        </section>

    </div>
</section>

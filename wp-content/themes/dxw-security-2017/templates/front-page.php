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
            <h4>Recent plugin recommendations</h4>
            <?php global $post;
                $args = array('post_type' => 'Plugins');
                $custom_posts = get_posts($args);
                foreach($custom_posts as $post) : setup_postdata($post); ?>
                <article class="short-review">
                    <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
                    <time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>
                    <?php h()->the_short_recommendation(); ?>
                </article>
            <?php endforeach; ?>
            <a href="/plugins" class="button">All plugin recommendations</a>
        </section>

        <section class="homepage-feed-container feed-container">
            <h4>Recent advisories</h4>
            <?php global $post;
                $args = array('post_type' => 'Advisories');
                $custom_posts = get_posts($args);
                foreach($custom_posts as $post) : setup_postdata($post); ?>
                <article class="short-review">
                    <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
                    <time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>
                    <p class="score <?php echo strtolower(h()->get_cvss_severity()); ?>">Severity: <span class="score"><?php h()->the_cvss_severity(); ?></span></p>
                </article>
            <?php endforeach; ?>
            <a href="/advisories" class="button">All advisories</a>
        </section>

    </div>
</section>

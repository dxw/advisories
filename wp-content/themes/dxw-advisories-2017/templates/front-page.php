<section class="front-page-title">
    <div class="row">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="content-block">
                <h1><?php the_title(); ?></h1>

                <div class="content rich-text">
                    <?php the_content(); ?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
    </div>
</section>

<?php get_search_form() ?>

<div class="container row">

    <div class="recent-reviews">
        <div class="plugin-recommendations">
            <h4>Recent plugin recommendations</h4>
            <ul>
            <?php global $post;
                $args = array('post_type' => 'Plugins');
                $custom_posts = get_posts($args);
                foreach($custom_posts as $post) : setup_postdata($post); ?>
                <li>
                    <div class="short-review">
                        <?php the_short_recommendation(); ?><a href="<?php the_permalink();?>"><?php the_title(); ?> (<?php echo str_replace(',', ', ', get_field('version_of_plugin')) ?>)</a>
                    </div>
                </li>
            <?php endforeach; ?>
            </ul>

            <a href="/plugins" class="button">All plugin recommendations</a>
        </div>

        <div class="recent-advisories">
            <h4>Recent advisories</h4>
            <ul>
            <?php global $post;
                $args = array('post_type' => 'Advisories');
                $custom_posts = get_posts($args);
                foreach($custom_posts as $post) : setup_postdata($post); ?>
                <li>
                    <div class="short-review">
                        <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
                    </div>
                </li>
            <?php endforeach; ?>
            </ul>

            <a href="/advisories" class="button">All advisories</a>
        </div>
    </div>

</div>

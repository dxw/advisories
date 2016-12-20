<div class="page-title">
    <header class="row">
        <h1>Search results for <?php the_search_query(); ?></h1>
    </header>
</div>

<div class="filter">
    <?php get_search_form(); ?>
</div>

<div class="search-results row">

    <div class="posts">
        <?php
        while (have_posts()) : the_post();
            switch(get_post_type()) {
                case 'advisories':
                    get_template_part('templates/result', 'advisory');
                    break;
                case 'plugins':
                    get_template_part('templates/result', 'plugin');
                    break;
                default:
                    get_template_part('templates/result');
            }
        endwhile ?>

    <?php if ($wp_query->max_num_pages > 1) : ?>

    <div class="pager">
        <?php the_posts_pagination( array(
            'mid_size' => 3,
            'prev_text' => __( 'Newer'),
            'next_text' => __( 'Older'),
            'screen_reader_text' => '',
        ) ); ?>
    </div>

    <?php endif; ?>
    </div>

    <aside class="get-a-quote" role="complementary">
        <h3>Get a quote</h3>
        <p>Need an updated review or inspection, or assurance for another plugin?</p>
        <div class="buttons">
            <a href="mailto:contact@dxw.com" class="button">Contact us for a quote</a>
        </div>
    </aside>

</div>

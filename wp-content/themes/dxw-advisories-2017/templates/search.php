<div class="page-title">
    <header class="row">
        <h1>Search results for <?php the_search_query(); ?></h1>
    </header>
</div>

<div class="filter">
    <?php get_search_form(); ?>
</div>

<div class="search-results-posts row">

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

    <?php get_template_part('templates/pager') ?>

    </div>

    <?php get_template_part('templates/order', 'plugin') ?>

</div>

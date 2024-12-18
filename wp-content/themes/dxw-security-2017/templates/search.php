<section class="page-header-panel">
    <div class="row">
        <h1>Search results for <?php the_search_query(); ?></h1>
    </div>
</section>

<?php
    if(isset($_GET['post_type']) && ($_GET['post_type']) == 'plugins') {
        get_template_part('partials/plugins-search-form');
    }
    elseif(isset($_GET['post_type']) && ($_GET['post_type']) == 'advisories') {
        get_template_part('partials/advisories-search-form');
    }
    else {
        get_template_part('partials/global-search-form');
    }
?>

<div class="row">
    <div class="page-content">
        <section class="feed-container page-section">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : ?>
                    <?php the_post(); ?>
                    <?php get_template_part('partials/article-list-item'); ?>
                <?php endwhile; ?>
            <?php endif; ?>
            <div class="pager">
                <?php get_template_part('partials/pager') ?>
            </div>
        </section>
    </div>
</div>

<?php get_template_part('partials/options-banner'); ?>

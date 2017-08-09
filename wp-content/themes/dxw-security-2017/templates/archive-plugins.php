<section class="page-header-panel">
    <div class="row">
        <h1>Plugin inspections and reviews</h1>
    </div>
</section>

<?php get_template_part('partials/plugins-search-form'); ?>

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
        <?php if ( is_active_sidebar( 'sidebar-plugins' ) ) : ?>
            <aside class="sidebar page-section">
                <?php dynamic_sidebar( 'sidebar-plugins' ); ?>
            </aside>
        <?php endif; ?>
    </div>
</div>

<?php get_template_part('partials/options-banner'); ?>

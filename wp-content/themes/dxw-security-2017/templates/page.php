<?php get_template_part('partials/page-header'); ?>

<?php get_template_part('partials/global-search-form'); ?>

<?php get_template_part('partials/page-introduction'); ?>

<div class="row">
    <div class="page-container">
        <article class="page-content rich-text">
            <?php the_post();
            the_content(); ?>
        </article>
    </div>
</div>

<?php get_template_part('partials/options-banner'); ?>

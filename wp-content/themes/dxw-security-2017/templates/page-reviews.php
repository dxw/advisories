<?php /* Template name: Plugin reviews */ ?>

<?php get_template_part('partials/page-header'); ?>

<?php get_template_part('partials/page-introduction'); ?>

<div class="row">
    <div class="page-container">
        <div class="page-content">
            <article class="rich-text">
                <?php the_post();
                the_content(); ?>
            </article>
            <?php get_template_part('partials/recommendations'); ?>
        </div>
    </div>
</div>

<?php get_template_part('partials/options-banner'); ?>
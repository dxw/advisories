<?php get_template_part('partials/page-header'); ?>

<?php get_template_part('partials/page-introduction'); ?>

<div class="row">
    <div class="page-container">
        <article class="rich-text">
            <?php the_post();
            the_content(); ?>
        </article>
    </div>
</div>

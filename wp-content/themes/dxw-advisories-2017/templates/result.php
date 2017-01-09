<article>
    <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
    <?php if ( has_post_thumbnail() ) {
        the_post_thumbnail('large');
        } ?>
    <?php get_template_part('templates/entry-meta') ?>
    <div class="summary rich-text">
        <?php the_excerpt() ?>
    </div>
</article>

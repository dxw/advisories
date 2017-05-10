<article>
    <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
    <?php if ( has_post_thumbnail() ) {
        the_post_thumbnail('large');
        } ?>
    <?php get_template_part('templates/entry-meta') ?>
    <span class="type">Plugin</span>
    <span class="recommendation <?php echo the_field('recommendation'); ?>"><?php the_field_label('recommendation'); ?></span>
    <div class="summary rich-text">
        <p><?php echo get_field('description'); ?></p>
    </div>
</article>

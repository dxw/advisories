<article>
    <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
    <?php
    if ( has_post_thumbnail() ) {
      the_post_thumbnail('large');
    } ?>
    <?php get_template_part('templates/entry-meta') ?>
    <span class="type">Advisory</span>
    <span class="severity <?php echo strtolower(get_cvss_severity()); ?>">Severity: <?php the_cvss_severity(); ?></span>
    <div class="summary rich-text">
        <p><?php echo get_field('description'); ?></p>
    </div>
</article>

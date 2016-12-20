<article <?php post_class() ?>>
  <header>
    <span>Plugin</span>
    <h2 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
    <?php if ( has_post_thumbnail() ) {
        the_post_thumbnail('large');
        } ?>
  </header>
  <p class="recommendation"><?php the_field_label('recommendation'); ?></p>
  <p><?php echo get_field('description'); ?></p>
  <footer>
      <?php get_template_part('templates/entry-meta') ?>
  </footer>
</article>

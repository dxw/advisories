<article <?php post_class() ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
    <?php if ( has_post_thumbnail() ) {
        the_post_thumbnail('large');
        } ?>
  </header>
  <div class="entry-summary">
    <?php the_excerpt() ?>
  </div>
  <footer>
      <?php get_template_part('templates/entry-meta') ?>
  </footer>
</article>

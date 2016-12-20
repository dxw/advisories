<article <?php post_class(strtolower(get_cvss_severity())) ?>>
  <header>
    <span>Advisory</span>
    <h2 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
    <?php
    if ( has_post_thumbnail() ) {
      the_post_thumbnail('large');
    } ?>
  </header>
  <p class="severity">
    Severity: <?php the_cvss_severity(); ?>
  </p>
  <?php echo get_field('description'); ?>
  <footer>
    <?php get_template_part('templates/entry-meta') ?>
  </footer>
</article>

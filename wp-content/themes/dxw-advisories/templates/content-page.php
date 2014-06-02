<?php while (have_posts()) : the_post() ?>
  <div class="page-title">
    <div class="container">
      <div class="row">
        <h1 class="span12"><?php the_title() ?></h1>
        <div class="span12">
          <p><?php the_excerpt(); ?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
    <div class="span8 content">
      <?php the_content() ?>
      <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')) ?>
    </div>
<?php endwhile ?>
<?php get_template_part('templates/footer-page') ?>

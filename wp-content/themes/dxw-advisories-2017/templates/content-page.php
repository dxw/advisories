<section class="content-page row">

    <?php while (have_posts()) : the_post() ?>
      <div class="page-title">

            <h1><?php the_title() ?></h1>
            <div class="excerpt rich-text">
              <p><?php the_excerpt(); ?></p>
            </div>
      </div>

        <div class="content rich-text">
          <?php the_content() ?>
          <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')) ?>
        </div>
    <?php endwhile ?>

</section>

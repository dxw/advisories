<?php if (gds_get_featured()) : ?>
  <?php while (have_posts()): the_post() ?>

    <article <?php post_class('featured span12') ?>>
        <div class="image">
            <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('featured-post') ?></a>
        </div>

        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
        <div class="excerpt rich-text">
          <?php the_excerpt() ?>
        </div>

        <a class="read-more" href="<?php the_permalink() ?>">Read more</a>

    </article>
  <?php endwhile ?>
<?php endif ?>
<?php wp_reset_query() ?>

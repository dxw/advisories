<div class="page-title">
    <header class="row">
        <h1>Search results for <?php the_search_query(); ?></h1>
    </header>
</div>

<div class="posts">

    <?php if(!have_posts()) : ?>
    <h3>Sorry, there were no matches</h3>
    <p>We haven't yet been asked to review or inspect a plugin matching your search terms.</p>
    <p>We can carry out inspections and reviews on request. Please <a href="mailto:contact@dxw.com">contact us</a> if you would like a quote.</p>
    <p>Alternatively, please check back later, or if you would like to be alerted if a new result appears for these search terms, you can subscribe to a <a href="<?php echo get_search_feed_link(); ?>">feed for this search</a>.</p>
    <?php endif; ?>

    <?php while (have_posts()) : ?>
    <?php the_post() ?>
      <article id="post_<?php the_id(); ?>" <?php post_class(get_field('recommendation')) ?>>

          <h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
          <?php echo get_field('description') ?>
          <p class="byline">
            <span class="sev <?php echo the_field('recommendation'); ?>"><?php the_field_label('recommendation'); ?></span>
            &mdash; <time class="updated" datetime="<?php echo get_the_time('c') ?>" pubdate><?php echo get_the_date('j F Y') ?></time>
          </p>

      </article>
    <?php endwhile ?>

    <?php get_template_part('templates/order', 'plugin') ?>

</div>

<div class="page-title">
    <header class="row">
        <h1>Search results for <?php the_search_query(); ?></h1>
    </header>
</div>

<div class="filter">
    <?php get_search_form(); ?>
</div>

<div class="search-results row">

    <div class="posts">
        <?php while (have_posts()) : the_post() ?>
        <article <?php post_class() ?>>
          <header>
            <h2 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
            <?php get_template_part('templates/entry-meta') ?>
            <?php if ( has_post_thumbnail() ) {
            	the_post_thumbnail('large');
            	} ?>
          </header>
          <?php
            if (get_field('recommendation')) {
                echo the_field_label('recommendation');
            }
            echo get_field('description')
          ?>
          <div class="entry-summary">
            <?php the_excerpt() ?>
          </div>
        </article>
        <?php endwhile ?>

        <?php if ($wp_query->max_num_pages > 1) : ?>

    <div class="pager">
        <?php the_posts_pagination( array(
            'mid_size' => 3,
            'prev_text' => __( 'Older'),
            'next_text' => __( 'Newer'),
            'screen_reader_text' => '',
        ) ); ?>
    </div>

<?php endif; ?>
    </div>

    <aside class="get-a-quote" role="complementary">
        <h3>Get a quote</h3>
        <p>Need an updated review or inspection, or assurance for another plugin?</p>
        <div class="buttons">
            <a href="mailto:contact@dxw.com" class="button">Contact us for a quote</a>
        </div>
    </aside>

</div>

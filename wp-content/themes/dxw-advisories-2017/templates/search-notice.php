<div class="page-title">

        <header>
            <h1>Search results for: <?php the_search_query(); ?> </h1>
        </header>

        <form role="search" method="get" id="searchform-notices" class="form-search search-header visible-desktop visible-tablet" action="<?php echo home_url('/') ?>">
          <input type="hidden" name="post_type" value="notices">
          <label class="visuallyhidden" for="s-notices">Search notices:</label>
          <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s-<?php echo esc_html('notices') ?>" class="search-query" placeholder="Search notices">
          <button value="Search notices">Search</button>
        </form>

</div>

<div class="posts">

    <?php while (have_posts()) : ?>
      <?php the_post() ?>

        <article id="post_<?php the_id(); ?>" <?php post_class('span8') ?>>

            <h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
            <?php get_template_part('templates/entry-meta', 'advisory') ?>
            <?php echo get_field('summary') ?>

        </article>

    <?php endwhile ?>

</div>

<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="span12">
        <h1>Search results for: <?php the_search_query(); ?> </h1>

        <form role="search" method="get" id="searchform-notices" class="form-search search-header visible-desktop visible-tablet" action="<?php echo home_url('/') ?>">
          <input type="hidden" name="post_type" value="notices">
          <label class="visuallyhidden" for="s-notices">Search notices:</label>
          <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s-<?php echo esc_html('notices') ?>" class="search-query" placeholder="Search notices">
          <button value="Search notices"><i class="icon-search"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="posts">
  <div class="container">
    <?php while (have_posts()) : ?>
      <?php the_post() ?>
      <div class="row">
        <article id="post_<?php the_id(); ?>" <?php post_class('span8') ?>>
          <div>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
            <?php get_template_part('templates/entry-meta', 'advisory') ?>
            <?php echo get_field('summary') ?>
          </div>
        </article>
      </div>
    <?php endwhile ?>
  </div>
</div>

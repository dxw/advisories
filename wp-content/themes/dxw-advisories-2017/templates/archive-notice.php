<div class="page-title">

    <header>
        <h1>Notices</h1>
        <p>This section contains details of past and ongoing attacks against our infrastructure and the sites hosted on it.</p>
        <p>This information is shared with a select group of individuals and organisations, and should not be recklessly shared.</p>
        <p>Please read this site's <a href="/terms">terms of service</a> before taking any action based on information published here.</p>
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

    <nav class="pagination">
      <ul>
        <li class="newer"><?php previous_posts_link('&laquo; Newer notices'); ?></li>
        <li class="older"><?php next_posts_link('Older notices &raquo;'); ?></li>
      </ul>
    </nav>

</div>

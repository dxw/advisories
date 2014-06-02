<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="span12">
        <form role="search" method="get" id="searchform-plugins" class="form-search search-header visible-desktop visible-tablet" action="<?php echo home_url('/') ?>">
          <input type="hidden" name="post_type" value="plugins">
          <label class="visuallyhidden" for="s-plugins">Search plugins:</label>
          <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s-<?php echo esc_html('plugins') ?>" class="search-query" placeholder="Search plugins">
          <button value="Search plugins"><i class="icon-search"></i></button>
        </form>
        <h1>Plugins</h1>
        <p>This section contains the results of plugin <a href="/about/plugin-inspections">inspections</a> and <a href="/about/plugin-reviews">reviews</a> that we conduct for our clients.</p>
        <p>We release them publicly to help the community make better decisions about plugin use, and to help plugin authors increase the quality of their code.</p>
        <p>Please read this site's <a href="/terms">terms of service</a> before taking any action based on information published here.</p>
      </div>
    </div>
  </div>
</div>

<div class="posts">
  <div class="container">
    <div class="row">
      <div class="span8">
        <?php while (have_posts()) : ?>
          <?php the_post() ?>
          <article id="post_<?php the_id(); ?>" <?php post_class(get_field('recommendation')) ?>>
            <div>
              <h2>
                <a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                <span class="version">Versions: <?php echo str_replace(',', ', ', get_field('version_of_plugin')) ?></span>
              </h2>

              <?php echo get_field('description') ?>
              <p class="byline author vcard">
                <span class="sev <?php echo the_field('recommendation'); ?>"><?php the_field_label('recommendation'); ?></span>
                &mdash; <time class="updated" datetime="<?php echo get_the_time('c') ?>" pubdate><?php echo get_the_date('j F Y') ?></time>
              </p>
            </div>
          </article>
        <?php endwhile ?>
        <nav class="pagination">
          <ul>
            <li class="newer"><?php previous_posts_link('&laquo; Newer results'); ?></li>
            <li class="older"><?php next_posts_link('Older results &raquo;'); ?></li>
          </ul>
        </nav>
      </div>

      <div class="span4 block">
        <?php get_template_part('templates/order', 'plugin') ?>
      </div>
  </div>
</div>

<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="span12">
      
        <form role="search" method="get" id="searchform-advisories" class="form-search search-header visible-desktop visible-tablet" action="<?php echo home_url('/') ?>">
          <input type="hidden" name="post_type" value="advisories">
          <label class="visuallyhidden" for="s-advisories">Search advisories:</label>
          <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s-<?php echo esc_html('advisories') ?>" class="search-query" placeholder="Search advisories">
          <button value="Search advisories"><i class="icon-search"></i></button>
        </form>
        <h1>Search results</h1>

      </div>
    </div>
  </div>
</div>

<div class="posts">
  <div class="container">
    <?php if(!have_posts()): ?>
      <h3>No results</h3>
      <p>Sorry: we don't have any advisories matching your search terms.</p>
    <?php endif; ?>
    <?php while (have_posts()) : the_post(); ?>
      <div class="row">
          <article id="post_<?php the_id(); ?>" <?php post_class('span8 ' . str_replace(' ', '_', strtolower(get_cvss_severity())) ) ?>>
            <div >
              <h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
              <p class="byline author vcard">
                <span class="sev <?php echo str_replace(' ', '_', strtolower(get_cvss_severity())) ?>">Severity: <?php the_cvss_severity(); ?></span>
                &mdash; <time class="updated" datetime="<?php echo get_the_time('c') ?>" pubdate><?php echo get_the_date('j F Y') ?></time>
              </p>
              <p><?php echo get_field('summary') ?></p>
            </div>
          </article>
      </div>
    <?php endwhile ?>
  </div>
</div>

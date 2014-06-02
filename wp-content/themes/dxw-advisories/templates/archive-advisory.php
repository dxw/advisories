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
        <h1>Advisories</h1>
        <p>This section contains advisories about security vulnerabilities that we identify. Most will relate to WordPress plugins.</p> 
        <p>We release vulnerability information publicly only after coordination (or attempted coordination) with software authors. For more information, please see our <a href="/disclosure">disclosure policy</a>.</p>
        <p>Please read this site's <a href="/terms">terms of service</a> before taking any action based on information published here.</p>

      </div>
    </div>
  </div>
</div>

<div class="posts">
  <div class="container">
    <div class="row">
      <?php while (have_posts()) : ?>
        <?php the_post() ?>
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
      <?php endwhile ?>
      <nav class="pagination">
        <ul>
          <li class="newer"><?php previous_posts_link('&laquo; Newer vulnerabilities'); ?></li>
          <li class="older"><?php next_posts_link('Older vulnerabilities &raquo;'); ?></li>
        </ul>
      </nav>
    </div>
  </div>
</div>

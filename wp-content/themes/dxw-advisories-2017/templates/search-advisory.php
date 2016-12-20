<div class="page-title">
    <header class="row">
        <h1>Search results for <?php the_search_query(); ?></h1>
    </header>
</div>

<div class="posts">
    <div class="row">
    <?php if(!have_posts()): ?>
      <h3>No results</h3>
      <p>Sorry: we don't have any advisories matching your search terms.</p>
    <?php endif; ?>
    <?php while (have_posts()) : the_post(); ?>
      <article id="post_<?php the_id(); ?>" <?php post_class('span8 ' . str_replace(' ', '_', strtolower(get_cvss_severity())) ) ?>>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
        <p class="byline author vcard">
        <span class="sev <?php echo str_replace(' ', '_', strtolower(get_cvss_severity())) ?>">Severity: <?php the_cvss_severity(); ?></span>
        &mdash; <time class="updated" datetime="<?php echo get_the_time('c') ?>" pubdate><?php echo get_the_date('j F Y') ?></time>
        </p>
        <?php echo get_field('summary') ?>
      </article>
    <?php endwhile ?>
    </div>
</div>

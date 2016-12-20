<div class="page-title">
    <header class="row">
        <h1>Search results for <?php the_search_query(); ?></h1>
    </header>
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

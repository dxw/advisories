<section class="content-page">

<?php while (have_posts()) : the_post() ?>
    <header class="page-title">
        <div class="row rich-text">
            <h1><?php the_title() ?></h1>
            <div class="excerpt">
                <p><?php the_excerpt(); ?></p>
            </div>
        </div>
    </header>

    <div class="row">
        <article class="rich-text content">
        <?php the_content() ?>
        <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')) ?>
        </article>
    </div>
<?php endwhile ?>

</section>

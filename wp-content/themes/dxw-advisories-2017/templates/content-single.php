<?php while (have_posts()) : the_post() ?>
<?php get_template_part('templates/header-page') ?>
  <article <?php post_class() ?>>
    <header>
        <div class="row rich-text">
            <h1><?php the_title() ?></h1>
            <?php get_template_part('templates/entry-meta') ?>
            <?php if ( has_post_thumbnail() ) {
            the_post_thumbnail('large');
            } ?>
        </div>
    </header>
    <div class="rich-text content">
      <?php the_content() ?>
    </div>
    <footer class="single">
      <p>
        <strong>By:</strong> <?php the_author() ?>
        &nbsp;&nbsp;<strong>Category:</strong> <?php echo get_the_category_list(', ') ?>
      </p>
      <p>
        <?php echo get_the_tag_list('<p><strong>Tags:</strong> ', ',', '</p>'); ?>
      </p>
    </footer>
    <?php comments_template('/templates/comments.php') ?>
  </article>
<?php endwhile ?>
<?php get_template_part('templates/footer-page') ?>

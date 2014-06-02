<h2 class="archive-title"><?php single_cat_title(); ?></h2>
<?php while (have_posts()) : the_post() ?>
<?php if ( get_the_author_meta('description') ) : // If a user has filled out their decscription show a bio on their entries
    echo get_the_author_meta('description');
endif; ?>
<?php endwhile ?>
 
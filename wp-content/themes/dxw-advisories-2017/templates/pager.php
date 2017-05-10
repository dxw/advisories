<?php if ($wp_query->max_num_pages > 1) : ?>
<div class="pager">
    <?php the_posts_pagination( array(
        'mid_size' => 3,
        'prev_text' => __( 'Newer'),
        'next_text' => __( 'Older'),
        'screen_reader_text' => '',
    ) ); ?>
</div>
<?php endif; ?>

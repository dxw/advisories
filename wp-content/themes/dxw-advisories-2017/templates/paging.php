<?php if ($wp_query->max_num_pages > 1) : ?>
    <div class="pagination">
        <?php if (get_previous_posts_link()) : ?>
            <span class="previous arrow"><?php previous_posts_link(__('Previous page', 'roots')); ?><span class="page-numbers"><?php echo ($paged-1) ?> of <?php echo $wp_query->max_num_pages; ?></span></span>
        <?php endif; ?>
        <?php if (get_next_posts_link()) : ?>
            <span class="next arrow"><?php next_posts_link(__('Next page', 'roots')); ?><span class="page-numbers"><?php echo ($paged+1) ?> of <?php echo $wp_query->max_num_pages; ?></span></span>
        <?php endif; ?>
    </div>
<?php endif; ?>

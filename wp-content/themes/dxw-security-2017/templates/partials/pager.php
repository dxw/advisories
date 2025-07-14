<?php if (get_the_posts_pagination()) : ?>
<div class="pagination">
	<nav class="pagination__container" aria-label="Pagination">
		<?php the_posts_pagination([
			'type' => 'list',
			'prev_next' => true,
			'prev_text' => 'Previous',
			'next_text' => 'Next',
			'before_page_number' => '<span class="sr-only">Page</span>'
		]); ?>
	</nav>
</div>

<?php endif; ?>

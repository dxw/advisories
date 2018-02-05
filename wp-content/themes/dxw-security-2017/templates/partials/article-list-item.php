<article class="short-review">
    <h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
    <time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>
    <?php global $post;
    if($post->post_type == 'plugins') : ?>
        <div class="rich-text">
            <p class="entry excerpt"><?php echo get_field('description'); ?></p>
        </div>
        <?php h()->the_short_recommendation(); ?>
    <?php endif; ?>
    <?php if($post->post_type == 'advisories') : ?>
        <p class="score <?php echo strtolower(h()->get_cvss_severity()); ?>"><span class="name">Severity:</span> <?php h()->the_cvss_severity(); ?></p>
    <?php endif; ?>
</article>

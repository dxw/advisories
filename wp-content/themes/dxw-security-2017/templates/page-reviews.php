<?php /* Template name: Plugin reviews */ ?>

<?php get_template_part('partials/page-header'); ?>

<?php get_template_part('partials/page-introduction'); ?>

<div class="row">
    <div class="page-container">
        <div class="page-content">
            <article class="rich-text">
                <?php the_post();
                the_content(); ?>
            </article>
            <?php if (get_field('recommendations_heading')) : ?>
                <section class="recommendations">
                    <h2><?php the_field('recommendations_heading'); ?></h2>
                    <?php if (have_rows('recommendations')) :
                        while (have_rows('recommendations')) :
                            the_row();
                            $security = get_sub_field('security_warning');
                            $subtitle = get_sub_field('subtitle'); ?>
                            <article>
                                <h3 class="<?php echo $security; ?>">
                                    <?php if ($security == 'red') :
                                        echo 'Potentially unsafe';
                                    elseif ($security == 'orange') :
                                        echo 'Use with caution';
                                    elseif ($security == 'green') :
                                        echo 'No issues found';
                                    endif; ?>
                                </h3>
                                <div class="rich-text">
                                    <p><strong><?php echo $subtitle; ?></strong></p>
                                    <?php the_sub_field('description'); ?>
                                </div>
                            </article>
                        <?php endwhile;
                    endif; ?>
                </section>
            <?php endif; ?>
        </div>
    </div>
</div>
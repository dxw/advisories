<?php if ( get_field('header', 'option') ) :
    $title = get_field('header', 'option');
    $content = get_field('content', 'option');
    $url = get_field('url', 'option');
    $cta = get_field('cta', 'option');
    ?>
    <section class="page-section page-banner">
        <div class="row">
            <section>
                <h2><?php echo esc_html($title) ?></h2>
                <?php echo apply_filters('the_content', $content) ?>
                <a href="<?php echo esc_url($url) ?>" class="button"><?php echo esc_html($cta) ?></a>
            </section>
        </div>
    </section>
<?php endif; ?>

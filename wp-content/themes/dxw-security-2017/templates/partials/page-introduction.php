<?php if (get_field('introduction')) : ?>
    <section class="page-introduction">
        <div class="row">
            <div class="introduction-container">
                <?php the_field('introduction'); ?>
            </div>
        </div>
    </section>
<?php endif; ?>
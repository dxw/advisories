<?php if (get_field('introduction')) : ?>
    <div class="page-introduction">
        <div class="row">
            <div class="introduction-container">
                <?php the_field('introduction'); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<section class="page-header-panel">
    <header class="row">
        <h2>
            <?php
                $assurance = get_field('assurance_level');
                if ($assurance == 'codereviewed') :
                    echo 'Plugin review:';
                elseif ($assurance == 'inspected') :
                    echo 'Plugin inspection:';
                endif;
            ?>
        </h2>
        <h1><?php the_title(); ?></h1>
    </header>
</section>

<section class="inspection-introduction">
    <div class="row">
        <div class="inspection-container">
            <?php h()->the_recommendation(); ?>
        </div>
    </div>
</section>


<section class="content-notice">

    <header class="page-title">
        <div class="row rich-text">
            <h1><?php the_title() ?></h1>
            <div class="summary"><?php the_field('summary') ?></div>
        </div>
    </header>

    <div class="row">
        <article <?php post_class('rich-text content') ?>>

            <h2>Description</h2>
                <p><?php echo get_field('description') ?></p>

            <h2>Mitigation/further actions</h2>
                <p><?php echo get_field('action') ?></p>

            <dl>
                <dt>Incident type:</dt>
                <dd><?php echo get_field_label('incident_type') ?></dd>
                <dt>Client organisation:</dt>
                <dd><?php the_field('client') ?></dd>
                <dt>Start date:</dt>
                <dd><?php the_field('start_date') ?></dd>
                <dt>End date:</dt>
                <dd><?php $x = get_field('end_date'); if($x != '') echo $x; else echo "Ongoing"; ?></dd>
                <dt>Report date:</dt>
                <dd><?php echo get_the_date(); ?></dd>
                <dt>Report last updated:</dt>
                <dd><?php the_modified_date(); ?></dd>
                <dt>Reported by</dt>
                <dd><?php echo get_the_author(); ?></dd>
                <dt>Contact email</dt>
                <dd><a href="mailto:<?php the_author_email(); ?>"><?php the_author_email(); ?></a></dd>
                <dt>Contact phone</dt>
                <dd>0345 257 7520</dd>
            </dl>

        </article>
    </div>

</section>

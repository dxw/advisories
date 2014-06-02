<div class="page-title">
  <div class="container">
    <div class="row">
      <h1 class="span12"><?php the_title() ?></h1>
    </div>
    <div class="row">
      <div class="span8"><?php the_field('summary') ?></div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <article <?php post_class() ?>>
      <div class="span8 content"> 
        <h3>Description</h3>
        <p><?php echo get_field('description') ?></p>
        <h3>Mitigation/further actions</h3>
        <p><?php echo get_field('action') ?></p>
      </div>
      
      <dl class="span3">
        <dt>Incident type:</dt>
        <dd><?php echo get_field_label('incident_type') ?></dd>
        <dt>Client organisation:</dt>
        <dd><?php the_field('client') ?></dd>
        <dt>Start date:</dt>
        <dd><?php the_field('start_date') ?></dd>
        <dt>End date:</dt>
        <dd><?php $x = get_field('end_date'); if($x != '') echo $x; else echo "Ongoing"; ?></d>
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
<?php get_template_part('templates/footer-page') ?>    

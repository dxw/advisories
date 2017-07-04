<div class="page-title">
  <div class="container">
    <h1>WordPress security advisories, audit and assurance</h1>
    <p>In the course of <a href="http://dxw.com">delivering</a> and <a href="http://hosting.dxw.com">hosting</a> WordPress websites for the public sector, we undertake a significant quantity of assurance work, to ensure that the sites we build and the plugins they rely on are secure. We publish information about that work on this site.</p>
    <p>We are also available to conduct one-off assurance work for other organisations. More information on these services is coming soon: for the time being, please <a href="mailto:contact@dxw.com">contact us</a>.</p>
  </div>
</div>
<div class="container">
  <div class="row intros">
    <!--
    <div class="block span3">
      <h3>Plugin inspections</h3>
      <div>
        <p>A plugin inspection is a light-touch assurance process, designed to flag plugins with potential security problems in order to allow more detailed assurance work to take place only on plugins likely to require it.</p>
        <p>A scanning tool is used to identify potential issues requiring manual review by the tester. The tester reviews issues identified and gives the plugin a recommendation.</p>
      </div>
      <p><a href="" class="btn">More information &amp; pricing</a></p>
    </div>
    <div class="block span3">
      <h3>Plugin reviews</h3>
      <div>
        <p>A plugin review is detailed assurance process involving line-by-line manual examination of a plugin's codebase.</p>
        <p>During a plugin review, the tester seeks to identify and demonstrate that vulnerabilities exist</p>
      </div>
      <p><a href="" class="btn">More information &amp; pricing</a></p>
    </div>
    <div class="block span3">
      <h3>Penetration testing</h3>
      <div>
        <p>A penetration test is a detailed assurance process involving a thorough examination of a running system, including its code and underlying infrastructure.</p>
        <p>During a penetration test, the tester seeks to identify and exploit vulnerabilities in a whole system, exposing problems arising from interactions between its various components</p>
      </div>
      <p><a href="" class="btn">More information &amp; pricing</a></p>
    </div>
    <div class="block span3">
      <h3>Advisories</h3>
      <div>
        <p>We responsibly disclose vulnerabilities that we find, having first worked with the vendor to resolve them. Vulnerabilitity advisories are <a href="advisories">published on this site</a>.</p>
      </div>
      <p><a href="" class="btn">More information</a></p>
    </div>  -->
  </div>

  <div class="row">
    <div class="span12 block search">
      <div>
        <h4>Search</h4>
        <?php get_search_form() ?>
      </div>
    </div>
  </div>
  <div class="row loops">
    <div class="span8">
      <h4>Recent plugin recommendations</h4>
      <ul>
      <?php global $post;
      $args = array('post_type' => 'Plugins');
      $custom_posts = get_posts($args);
      foreach($custom_posts as $post) : setup_postdata($post); ?>
        <li><?php the_short_recommendation(); ?><br/><a href="<?php the_permalink();?>"><?php the_title(); ?> (<?php echo str_replace(',', ', ', get_field('version_of_plugin')) ?>)</a></li>
      <?php endforeach; ?>
      </ul>
      <a href="/plugins" class="btn">All plugin recommendations</a>
    </div>
    <div class="span4">
      <h4>Recent advisories</h4>
      <ul>
      <?php global $post;
      $args = array('post_type' => 'Advisories');
      $custom_posts = get_posts($args);
      foreach($custom_posts as $post) : setup_postdata($post); ?>
        <li><a href="<?php the_permalink();?>"><?php the_title(); ?></a></li>
      <?php endforeach; ?>
      </ul>
      <a href="/advisories" class="btn">All advisories</a>
    </div>
  </div>
  </div>
</div>

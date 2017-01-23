<div class="page-title">
  <div class="container">
    <div class="row">
      <h1 class="span12"><?php the_title() ?></h1>
      <div class="span12 cvss">
        <table class="table table-bordered">
        <thead>
          <tr>
            <th class="score">Score</th>
            <th>Vector</th>
            <th>Complexity</th>
            <th>Authentication</th>
            <th>Confidentiality</th>
            <th>Integrity</th>
            <th>Availability</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="score <?php echo strtolower(get_cvss_severity()); ?>"><?php the_cvss_score(); ?><br><span><?php echo the_cvss_severity(); ?><span></td>
            <td class="access_vector <?php echo strtolower(str_replace(' ', '_', get_field_label('access_vector'))); ?>"><?php the_field_label('access_vector'); ?></td>
            <td class="access_complexity <?php echo strtolower(get_field_label('access_complexity')); ?>"><?php the_field_label('access_complexity'); ?></td>
            <td class="authentication <?php echo strtolower(get_field_label('authentication')); ?>"><?php the_field_label('authentication'); ?></td>
            <td class="confidentiality <?php echo strtolower(get_field_label('confidentiality')); ?>"><?php the_field_label('confidentiality'); ?></td>
            <td class="integrity <?php echo strtolower(get_field_label('integrity')); ?>"><?php the_field_label('integrity'); ?></td>
            <td class="availability <?php echo strtolower(get_field_label('availability')); ?>"><?php the_field_label('availability'); ?></td>
          </tr>
        </tbody>
        </table>
        <p class="about_score">You can read more about CVSS base scores on <a href="http://en.wikipedia.org/wiki/CVSS">Wikipedia</a> or in the <a href="http://www.first.org/cvss/cvss-guide">CVSS specification</a>.</p>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
  <article <?php post_class() ?>>
    <div class="span8 content">
      <h3>Vulnerability</h3>
      <p><?php echo get_field('issue') ?></p>
      <h3>Proof of concept</h3>
      <p><?php echo get_field('proof') ?></p>
      <h3>Mitigation/further actions</h3>
      <p><?php echo get_field('mitigations') ?></p>

      <?php if(is_super_admin()): ?>
        <div class="admin_stuff">
          <h3>Admin tools</h3>
          <h4>Publish emails</h4>

          <a href="#" class="email_button btn btn-danger" id="email_fd" data-subject="<?php the_title_for_email(); ?>" data-body="textarea.report_email">Full Disclosure</a>
          <a href="#" class="email_button btn btn-danger" id="email_wpscan" data-subject="<?php the_title_for_email(); ?>" data-body="textarea.report_email">WP Scan</a>
          <a href="#" class="email_button btn btn-danger" id="email_dxw_wp_sec" data-subject="<?php the_title_for_email(); ?>" data-body="textarea.report_email">dxw WP Security</a>

          <h4>Report emails</h4>
          <a href="#" class="email_button btn btn-danger" id="email_wp_plugins" data-subject="<?php the_title_for_email(); ?>" data-body="textarea.report_email">WP Plugins</a>
          <div class="alert hidden email_results">
        </div>

        <h4>Text version for reports</h4>
        <p><a href="mailto:?subject=<?php the_title_for_email() ?>">Click for a blank email with the right subject</a></p>
        <textarea class="plain_text report_email">
Details
================
Software: <?php echo get_field('component') ?>

Version: <?php echo get_field('version') ?>

Homepage: <?php echo get_field('codex_link') ?>

Advisory report: <?php if($post->post_status == 'publish' || $post->post_status == 'private') { the_permalink(); } else { echo "Awaiting publication"; } ?>

CVE: <?php if(get_field('cve') != '') { echo get_field('cve'); } else { echo "Awaiting assignment"; } ?>

CVSS: <?php the_cvss_score(); ?> (<?php echo the_cvss_severity(); ?>; AV:<?php echo substr(get_field_label('access_vector'), 0, 1); ?>/AC:<?php echo substr(get_field_label('access_complexity'), 0, 1); ?>/Au:<?php echo substr(get_field_label('authentication'), 0, 1); ?>/C:<?php echo substr(get_field_label('confidentiality'), 0, 1); ?>/I:<?php echo substr(get_field_label('integrity'), 0, 1); ?>/A:<?php echo substr(get_field_label('availability'), 0, 1); ?>)

Description
================
<?php echo preg_replace("/^Private: /", "", get_the_title()); ?>


Vulnerability
================
<?php echo strip_tags(get_field('issue')) ?>

Proof of concept
================
<?php echo strip_tags(get_field('proof')) ?>

Mitigations
================
<?php echo strip_tags(get_field('mitigations')) ?>

Disclosure policy
================
dxw believes in responsible disclosure. Your attention is drawn to our disclosure policy: https://security.dxw.com/disclosure/

Please contact us on security@dxw.com to acknowledge this report if you received it via a third party (for example, plugins@wordpress.org) as they generally cannot communicate with us on your behalf.

This vulnerability will be published if we do not receive a response to this report with 14 days.

Timeline
================
<?php echo strip_tags(get_field('timeline')) ?>


Discovered by dxw:
================
<?php if(function_exists('coauthors')) { coauthors(); } else { the_author(); } ?>

Please visit security.dxw.com for more information.
          </textarea>

          <h4>Text version for CVE requests</h4>
          <p><a href="mailto:cve-assign@mitre.org?subject=<?php echo "CVE request: " . preg_replace("/^Private: /", "", get_the_title()); if(get_field('is_plugin') == 'yes') { echo " (WordPress plugin)"; } ?>">Click for a blank email with the right subject</a></p>
          <textarea class="plain_text cve_email">
Vulnerability
================
<?php echo strip_tags(get_field('issue')) ?>


Details
================

Summary: <?php the_title(); ?>

Software: <?php echo get_field('component') ?>

Version: <?php echo get_field('version') ?>

Homepage: <?php echo get_field('codex_link') ?>

Advisory ID: <?php if($post->post_status == 'publish' || $post->post_status == 'private') { the_advisory_id(); } else { echo "Awaiting publication"; } ?>

CVSS: <?php the_cvss_score(); ?> (<?php echo the_cvss_severity(); ?>; AV:<?php echo substr(get_field_label('access_vector'), 0, 1); ?>/AC:<?php echo substr(get_field_label('access_complexity'), 0, 1); ?>/Au:<?php echo substr(get_field_label('authentication'), 0, 1); ?>/C:<?php echo substr(get_field_label('confidentiality'), 0, 1); ?>/I:<?php echo substr(get_field_label('integrity'), 0, 1); ?>/A:<?php echo substr(get_field_label('availability'), 0, 1); ?>)


Discovered by:
================
  <?php if(function_exists('coauthors')) { coauthors(); } else { the_author(); } ?>
          </textarea>
        </div>
      <?php endif; ?>
    </div>

    <aside class="span4">
      <?php get_template_part('templates/disclaimer') ?>

      <dl>
        <dt>Advisory ID:</dt>
        <?php if($post->post_status == 'publish' || $post->post_status == 'private'): ?>
          <dd><?php the_advisory_id(); ?></dt>
        <?php else: ?>
          <dd class="pending">Awaiting publication</dd>
        <?php endif; ?>
        <dt>CVE:</dt>
        <?php if(get_field('cve') != ''): ?>
          <dd><?php echo get_field('cve') ?></dd>
        <?php else: ?>
          <dd class="pending">Awaiting assignment</dd>
        <?php endif; ?>
        <dt>Component/package:</dt>
        <dd><?php echo get_field('component') ?></dd>
        <?php if(get_field('codex_link') != ''): ?>
          <dt>Homepage:</dt>
          <dd><a href="<?php the_field('codex_link'); ?>"><?php the_field('component')?></a></dd>
        <?php endif; ?>
        <dt>Version:</dt>
        <dd><?php echo esc_html(get_field('version')) ?></dd>
        <dt>Discovered by:</dt>
        <dd><?php if(function_exists('coauthors')) { coauthors(); } else { the_author(); } ?></dd>
        <dt>Timeline:</dt>
        <dd><?php echo get_field('timeline') ?></dd>
        <dt>Advisory last revised:</dt>
        <dd><?php the_modified_date(); ?></dd>
        <dt>Current state:</dt>
        <dd><?php echo esc_html(get_field_label('workflow_state')) ?></dd>
      </dl>
    </aside>

  </article>
<?php get_template_part('templates/footer-page') ?>

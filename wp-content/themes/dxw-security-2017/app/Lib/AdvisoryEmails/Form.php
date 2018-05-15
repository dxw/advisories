<?php

namespace Dxw\DxwSecurity2017\Lib\AdvisoryEmails;

class Form
{
    public function displayIfSuperAdmin()
    {
        if (!is_super_admin()) {
            return;
        }

        global $post;
        ?>
        <section class="admin-tools-container">
            <h2>Admin tools</h2>
            <h3>Publish emails</h3>
            <input id="send_email_nonce" type="hidden" value="<?php echo wp_create_nonce('send_email');
        ?>">
            <ul class="email-links">
                <li>
                    <a href="#" class="send_email_button email-button icon-mail" id="email_fd" data-subject="<?php h()->the_title_for_email();
        ?>" data-body="textarea.report_email">Full Disclosure</a>
                </li>
                <li>
                    <a href="#" class="send_email_button email-button icon-mail" id="email_wpscan" data-subject="<?php h()->the_title_for_email();
        ?>" data-body="textarea.report_email">WP Scan</a>
                </li>
                <li>
                    <a href="#" class="send_email_button email-button icon-mail" id="email_dxw_wp_sec" data-subject="<?php h()->the_title_for_email();
        ?>" data-body="textarea.report_email">dxw WP Security</a>
                </li>
            </ul>
            
            <h3>Report emails</h3>
            <a href="#" class="send_email_button email-button icon-mail" id="email_wp_plugins" data-subject="<?php h()->the_title_for_email();
        ?>" data-body="textarea.report_email">WP Plugins</a>
            <div class="alert hidden email_results"></div>

            <h3>Text version for reports</h3>
            <a class="email-button icon-mail-open" href="mailto:?subject=<?php h()->the_title_for_email() ?>">Click for a blank email with the right subject</a>
            <textarea class="plain_text report_email">
Details
================
Software: <?php echo get_field('component') ?>

Version: <?php echo get_field('version') ?>

Homepage: <?php echo get_field('codex_link') ?>

Advisory report: <?php if ($post->post_status == 'publish' || $post->post_status == 'private') {
    the_permalink();
} else {
    echo "Awaiting publication";
}
        ?>

CVE: <?php if (get_field('cve') != '') {
    echo get_field('cve');
} else {
    echo "Awaiting assignment";
}
        ?>

CVSS: <?php h()->the_cvss_score();
        ?> (<?php echo h()->the_cvss_severity();
        ?>; AV:<?php echo substr(h()->get_field_label('access_vector'), 0, 1);
        ?>/AC:<?php echo substr(h()->get_field_label('access_complexity'), 0, 1);
        ?>/Au:<?php echo substr(h()->get_field_label('authentication'), 0, 1);
        ?>/C:<?php echo substr(h()->get_field_label('confidentiality'), 0, 1);
        ?>/I:<?php echo substr(h()->get_field_label('integrity'), 0, 1);
        ?>/A:<?php echo substr(h()->get_field_label('availability'), 0, 1);
        ?>)

Description
================
<?php echo preg_replace("/^Private: /", "", get_the_title());
        ?>


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
dxw believes in responsible disclosure. Your attention is drawn to our disclosure policy: https://advisories.dxw.com/disclosure/

Please contact us on security@dxw.com to acknowledge this report if you received it via a third party (for example, plugins@wordpress.org) as they generally cannot communicate with us on your behalf.

This vulnerability will be published if we do not receive a response to this report with 14 days.

Timeline
================
<?php echo strip_tags(get_field('timeline')) ?>


Discovered by dxw:
================
<?php if (function_exists('coauthors')) {
    coauthors();
} else {
    the_author();
}
        ?>

Please visit advisories.dxw.com for more information.
            </textarea>

            <h3>Text version for CVE requests</h3>
            <a class="email-button icon-mail-open" href="mailto:cve-assign@mitre.org?subject=<?php echo "CVE request: " . preg_replace("/^Private: /", "", get_the_title());
        if (get_field('is_plugin') == 'yes') {
            echo " (WordPress plugin)";
        }
        ?>">Click for a blank email with the right subject</a>
            <textarea class="plain_text cve_email">
Vulnerability
================
<?php echo strip_tags(get_field('issue')) ?>


Details
================

Summary: <?php the_title();
        ?>

Software: <?php echo get_field('component') ?>

Version: <?php echo get_field('version') ?>

Homepage: <?php echo get_field('codex_link') ?>

Advisory ID: <?php if ($post->post_status == 'publish' || $post->post_status == 'private') {
    h()->the_advisory_id();
} else {
    echo "Awaiting publication";
}
        ?>

CVSS: <?php h()->the_cvss_score();
        ?> (<?php echo h()->the_cvss_severity();
        ?>; AV:<?php echo substr(h()->get_field_label('access_vector'), 0, 1);
        ?>/AC:<?php echo substr(h()->get_field_label('access_complexity'), 0, 1);
        ?>/Au:<?php echo substr(h()->get_field_label('authentication'), 0, 1);
        ?>/C:<?php echo substr(h()->get_field_label('confidentiality'), 0, 1);
        ?>/I:<?php echo substr(h()->get_field_label('integrity'), 0, 1);
        ?>/A:<?php echo substr(h()->get_field_label('availability'), 0, 1);
        ?>)


Discovered by:
================
  <?php if (function_exists('coauthors')) {
    coauthors();
} else {
    the_author();
}
        ?>
            </textarea>
        </section>
        <?php

    }
}

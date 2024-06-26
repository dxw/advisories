<?php

namespace Dxw\DxwSecurity2017\Lib\AdvisoryEmails;

class AjaxHandler implements \Dxw\Iguana\Registerable
{
    public function register()
    {
        add_action('wp_ajax_send_email', [$this, 'wp_ajax_send_email']);
    }

    public function wp_ajax_send_email()
    {
        check_ajax_referer('send_email');

        $targets = [
          'email_hackers'    => 'wp-hackers@lists.automattic.com',
          'email_wp_plugins' => 'plugins@wordpress.org',
          'email_fd'         => 'fulldisclosure@seclists.org',
          'email_cve'        => 'cve-assign@mitre.org',
          'email_wpscan'     => 'wpscanteam@gmail.com',
          'email_dxw_wp_sec' => 'dxw-wp-security@lists.dxw.com',
        ];

        $sanitised['subject'] = sanitize_text_field($_POST['subject']);
        $sanitised['body']    = ($_POST['body']);

        if (array_key_exists($_POST['target'], $targets)) {
            $sanitised['target'] = $_POST['target'];
        }

        foreach ($sanitised as $var => $value) {
            if (empty($value)) {
                header("HTTP/1.1 400 Bad Request");
                echo "Failed: {$var} was empty.";
                return 0;
            }
        }

        if (!wp_mail($targets[$sanitised['target']], $sanitised['subject'], $sanitised['body'], ['From: dxw Security <security@dxw.com>'])) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Failed: {$var} was empty.";
            return 0;
        }

        header("HTTP/1.1 200 OK");
        echo "Email sent to " . $targets[$sanitised['target']];

        die();
    }
}

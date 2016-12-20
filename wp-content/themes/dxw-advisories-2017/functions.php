<?php

include(__DIR__.'/vendor.phar');

// From lib/config.php
define('GOOGLE_ANALYTICS_ID', ''); // UA-XXXXX-Y
define('POST_EXCERPT_LENGTH', 40);
// Image upload size, embeds, etc.
if (!isset($content_width)) { $content_width = 620; }

// Roots
roots_require('lib/utils.php');
roots_require('lib/init.php');
#roots_require('lib/sidebar.php');
#roots_require('lib/config.php');
#roots_require('lib/activation.php');
roots_require('lib/cleanup.php');
#roots_require('lib/nav.php');
roots_require('lib/comments.php');
#roots_require('lib/rewrites.php');
#roots_require('lib/htaccess.php');
#roots_require('lib/widgets.php');
roots_require('lib/scripts.php');
#roots_require('lib/custom.php');
roots_require('lib/wrapper.php');


// Non-roots
include(__DIR__.'/lib/theme.php');
include(__DIR__.'/lib/feeds.php');
include(__DIR__.'/lib/assets.php');
include(__DIR__.'/lib/menus.php');
include(__DIR__.'/lib/helpers.php');
include(__DIR__.'/lib/post-types.php');
include(__DIR__.'/lib/acf-fields.php');
include(__DIR__.'/lib/ajax_handlers.php');
include(__DIR__.'/lib/plugin-version-checker.php');
include(__DIR__.'/lib/twiddle_wpt_shortcodes.php');

// Admin
include(__DIR__.'/lib/admin/fetch_plugin_details.php');

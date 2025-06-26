<?php

/**
 * Advisories headers
 *
 * @package     AdvisoriesHeaders
 * @author      dxw
 * @copyright   2025
 * @license     MIT
 *
 * @wordpress-plugin
 * Plugin Name: Advisories Headers
 * Plugin URI: https://github.com/dxw/advisories
 * Description: HTTP headers for the dxw Advisories site
 * Author: dxw
 * Version: 1.0.1
 * Network: True
 */

require_once plugin_dir_path(__FILE__) . '/src/Headers.php';
$headers = new \Dxw\AdvisoriesHeaders\Headers();
$headers->register();

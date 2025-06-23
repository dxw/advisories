<?php

/**
 * WordPress Plugin
 *
 * @package     WordPressPlugin
 * @author      dxw
 * @copyright   2020
 * @license     MIT
 *
 * @wordpress-plugin
 * Plugin Name: WordPress Plugin
 * Plugin URI: https://github.com/dxw/wordpress-plugin
 * Description: TODO
 * Author: dxw
 * Version: 0.1.0
 * Network: True
 */

$registrar = require __DIR__.'/src/load.php';
$registrar->register();

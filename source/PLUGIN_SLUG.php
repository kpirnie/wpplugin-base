<?php

/**
 * PLUGIN_NAME
 *
 * PLUGIN_DESC
 *
 * @package PLUGIN_NAME
 *
 * Plugin Name: PLUGIN_NAME
 * Plugin URI: https://github.com/kpirnie/wpplugin-PLUGIN_SLUG
 * Description: PLUGIN_DESC
 * Version: 0.0.1
 * Requires at least: 6.8
 * Requires PHP: 8.2
 * Author: Kevin Pirnie
 * Author URI: https://kevinpirnie.com/
 * License: MIT
 * License URI: https://opensource.org/licenses/MIT
 * Text Domain: PLUGIN_SLUG
 * Domain Path: /languages
 * Network: false
 */

// throw it in the bit bucket if accessed directly
defined('ABSPATH') || die('No direct script access allowed');

// hold the plugin version
define('PLUGIN_PREFIX_VERSION', '0.0.1');

// hold the plugin path
define('PLUGIN_PREFIX_PATH', __DIR__);

// hold the plugin url
define('PLUGIN_PREFIX_URI', plugin_dir_url(__FILE__));

// pull in the common functionality
require_once PLUGIN_PREFIX_PATH . '/work/common.php';

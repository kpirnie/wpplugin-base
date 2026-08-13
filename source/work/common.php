<?php

/**
 * PLUGIN_NAME common
 *
 * The shared bootstrap for the plugin
 *
 * @package PLUGIN_NAME
 */

// throw it in the bit bucket if accessed directly
defined('ABSPATH') || die('No direct script access allowed');

// include our autoloader if it exists
if (file_exists(PLUGIN_PREFIX_PATH . '/vendor/autoload.php')) {
    include PLUGIN_PREFIX_PATH . '/vendor/autoload.php';
}

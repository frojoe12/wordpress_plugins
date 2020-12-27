<?php

/*
* @package JoeFrostPlugin
*/

/*
* Plugin Name: joefrost-plugin
* Plugin URI: https://www.joefrost.co.uk
* Description: This is a custom plugin for testing.
* Version: 1.0.0
* Author: Joe Frost
* Author URI: https://www.joefrost.co.uk
* License: GPLv2 or later
* Text Domain: joefrost-plugin
*/

if (!defined('ABSPATH')) {
    die("Direct access to file prohibited.");
}

class JoeFrostPlugin {

    function __construct() {
        add_action('init', [ $this, 'custom_post_type' ]);
    }

    function activate() {
        // generate a CPT
        // flush rewrite rules
        flush_rewrite_rules();
    }

    function deactivate() {
        // flush rewrite rules
        flush_rewrite_rules();
    }

    function uninstall() {
        // delete CPT
        // delete plugin data from Database
    }

    function custom_post_type() {
        register_post_type('book',[ 'public' => true, 'label' =>'Books' ]);
    }

}

if (class_exists('JoeFrostPlugin')) {
    $joeFrostPlugin = new JoeFrostPlugin();
}

// activation
register_activation_hook( __FILE__, [$joeFrostPlugin,'activate']);

// deactivation
register_deactivation_hook( __FILE__, [$joeFrostPlugin,'deactivate']);

// uninstall

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

    function register() {
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_wp']);
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

    function enqueue_admin() {
        // enqueue all scripts
        wp_enqueue_style('mypluginstyle', plugins_url('/assets/admin-style.css', __FILE__ ));
        wp_enqueue_script('mypluginscript', plugins_url('/assets/admin-script.js', __FILE__ ));
    }
    function enqueue_wp() {
        // enqueue all scripts
        wp_enqueue_style('mypluginstyle', plugins_url('/assets/wp-style.css', __FILE__ ));
        wp_enqueue_script('mypluginscript', plugins_url('/assets/wp-script.js', __FILE__ ));
    }
}

if (class_exists('JoeFrostPlugin')) {
    $joeFrostPlugin = new JoeFrostPlugin();
    $joeFrostPlugin->register();
}

// activation
register_activation_hook( __FILE__, [$joeFrostPlugin,'activate']);

// deactivation
register_deactivation_hook( __FILE__, [$joeFrostPlugin,'deactivate']);

// uninstall
// register_uninstall_hook( __FILE__, [$joeFrostPlugin,'uninstall']);

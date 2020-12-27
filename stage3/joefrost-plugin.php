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

    public function register() {
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_wp']);
    }

    function uninstall() {
        // delete CPT
        // delete plugin data from Database
    }

    protected function custom_post_type() {
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
    function activate() {
        require_once plugin_dir_path( __FILE__) . "inc/joefrost-plugin-activate.php";
        register_activation_hook( __FILE__, ['JoeFrostPluginActivate','activate']);
    }
    function deactivate() {
        require_once plugin_dir_path(__FILE__) . "inc/joefrost-plugin-deactivate.php";
        register_deactivation_hook( __FILE__, ['JoeFrostPluginDeactivate','deactivate']);
    }
}

if (class_exists('JoeFrostPlugin')) {
    $joeFrostPlugin = new JoeFrostPlugin();
    $joeFrostPlugin->register();
    $joeFrostPlugin->activate();
    $joeFrostPlugin->deactivate();
}



// uninstall
// register_uninstall_hook( __FILE__, [$joeFrostPlugin,'uninstall']);

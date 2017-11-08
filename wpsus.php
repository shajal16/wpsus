<?php

/*
Plugin Name: Wp Super Slider
Plugin URI:  http://shajal16.com/wpsus
Description: A awesome slider that will make your site look awesome.
Version:     1.0.2
Author:      K.H Shajal
Author URI:  http://shajal16.com
Text Domain: wpsus
Domain Path: /languages
Requires at least: wordpress 3.6.0
Tested up to: WordPress 4.8.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

 * @package    			Wp Super Slider
 * @category   			Core
 * @author     		 K.H Shajal
 * @copyright  			Copyright (c) 2017 shajal16

If you need support or want to tell me thanks please contact us at shajal16@gmail.com .
*/

// if the file is called directly, abort
if ( ! defined( 'WPINC' ) ) {
	die();
}

require_once( plugin_dir_path( __FILE__ ) . 'public/class-wpsus-init.php' );
require_once( plugin_dir_path( __FILE__ ) . 'public/class-wpsus.php' );
require_once( plugin_dir_path( __FILE__ ) . 'public/class-slider-renderer.php' );
require_once( plugin_dir_path( __FILE__ ) . 'public/class-slide-renderer.php' );
require_once( plugin_dir_path( __FILE__ ) . 'public/class-slide-renderer-factory.php' );
require_once( plugin_dir_path( __FILE__ ) . 'public/class-dynamic-slide-renderer.php' );
require_once( plugin_dir_path( __FILE__ ) . 'public/class-posts-slide-renderer.php' );
require_once( plugin_dir_path( __FILE__ ) . 'public/class-gallery-slide-renderer.php' );
require_once( plugin_dir_path( __FILE__ ) . 'public/class-flickr-slide-renderer.php' );
require_once( plugin_dir_path( __FILE__ ) . 'public/class-layer-renderer.php' );
require_once( plugin_dir_path( __FILE__ ) . 'public/class-layer-renderer-factory.php' );
require_once( plugin_dir_path( __FILE__ ) . 'public/class-paragraph-layer-renderer.php' );
require_once( plugin_dir_path( __FILE__ ) . 'public/class-heading-layer-renderer.php' );
require_once( plugin_dir_path( __FILE__ ) . 'public/class-image-layer-renderer.php' );
require_once( plugin_dir_path( __FILE__ ) . 'public/class-div-layer-renderer.php' );
require_once( plugin_dir_path( __FILE__ ) . 'public/class-video-layer-renderer.php' );

require_once( plugin_dir_path( __FILE__ ) . 'includes/class-wpsus-activation.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/class-wpsus-widget.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/class-wpsus-settings.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/class-flickr.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/class-hideable-gallery.php' );

register_activation_hook( __FILE__, array( 'WPSS_WpSus_Activation', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'WPSS_WpSus_Activation', 'deactivate' ) );

add_action( 'plugins_loaded', array( 'WPSS_WpSus', 'get_instance' ) );
add_action( 'plugins_loaded', array( 'WPSS_WpSus_Activation', 'get_instance' ) );
add_action( 'plugins_loaded', array( 'WPSS_Hideable_Gallery', 'get_instance' ) );

// register the widget
add_action( 'widgets_init', 'wpss_sp_register_widget' );

if ( is_admin() ) {
	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-wpsus-admin.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-wpsus-updates.php' );
	add_action( 'plugins_loaded', array( 'WPSS_WpSus_Admin', 'get_instance' ) );
	add_action( 'plugins_loaded', array( 'WPSS_WpSus_API', 'get_instance' ) );
	add_action( 'admin_init', array( 'WPSS_WpSus_Updates', 'get_instance' ) );
}
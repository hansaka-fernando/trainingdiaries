<?php
/*
Plugin Name: Breezycv Widgets
Plugin URI: http://lmpixels.com
Description: Breezycv Theme Elementor Widgets
Author: LMPixels
Version: 1.5.3
*/

add_action( 'plugins_loaded', 'breezycv_widgets_textdomain' );

function breezycv_widgets_textdomain() {
    load_plugin_textdomain( 'breezycv-widgets', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}

$theme = wp_get_theme();
if ( 'Breezycv' == $theme->name || 'Breezycv' == $theme->parent_theme ) {
	include_once(plugin_dir_path( __FILE__ ) . 'shortcodes/breezycv-core.php');
}

function breezycv_action_theme_dequeue_fa_styles() {
	if( wp_style_is( 'font-awesome' ) ){
	    wp_dequeue_style('fw-option-type-icon-v2-pack-font-awesome');
	    wp_deregister_style('fw-option-type-icon-v2-pack-font-awesome');
	}
	if( wp_style_is( 'fw-option-type-icon-v2-pack-linear-icons' ) ){
	    wp_dequeue_style('elementor-icons-linearicons');
	    wp_deregister_style('elementor-icons-linearicons');
	}
}

add_action( 'wp_print_styles', 'breezycv_action_theme_dequeue_fa_styles', 20 );
add_action( 'wp_head', 'breezycv_action_theme_dequeue_fa_styles', 20 );

/**
 * LMPixels Adding tracking and external CSS to the head
 */
function breezycv_tracking_wp_head()
{
    $external_css = stripcslashes( ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('external_styles') :  '' );
    echo $external_css;

    $head_tracking_code = stripcslashes( ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('head_tracking_code') :  '' );
    echo $head_tracking_code;
}

add_action('wp_head', 'breezycv_tracking_wp_head');
/* ================================================================================================ */

/**
 * LMPixels Adding tracking & external js to the body
 */
function breezycv_tracking_wp_body()
{
    $external_js = stripcslashes( ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('external_js') :  '' );
    echo $external_js;

    $body_tracking_code = stripcslashes( ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_tracking_code') :  '' );
    echo $body_tracking_code;
}

add_action('wp_footer', 'breezycv_tracking_wp_body');
/* ================================================================================================ */


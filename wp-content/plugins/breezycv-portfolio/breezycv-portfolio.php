<?php
/*
Plugin Name: Breezycv Portfolio
Plugin URI: http://lmpixels.com
Description: Breezycv Theme Portfolio
Author: LMPixels
Version: 1.3.2
*/

add_action( 'plugins_loaded', 'breezycv_portfolio_textdomain' );

function breezycv_portfolio_textdomain() {
    load_plugin_textdomain( 'breezycv-portfolio', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}

if( ! function_exists( 'breezycv_filter_portfolio_extension' ) ){
    function breezycv_filter_portfolio_extension($locations) {
    	$locations[
    		dirname(__FILE__) . '/extensions'
    	] = plugin_dir_url( __FILE__ ) . 'extensions';

    	return $locations;
    }
}
add_filter('fw_extensions_locations', 'breezycv_filter_portfolio_extension');
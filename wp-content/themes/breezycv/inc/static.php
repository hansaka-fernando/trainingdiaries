<?php if ( ! defined( 'ABSPATH' ) ) die( 'Direct access forbidden.' );
/**
 * Include static files: javascript and css
 */

if ( is_admin() ) {
    return;
}

wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css',array(),'4.0.0');
wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css',array(),'1.0');
wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css',array(),'2.0');
wp_enqueue_style('perfect-scrollbar', get_template_directory_uri() . '/css/perfect-scrollbar.css',array(),'2.0');
wp_enqueue_style('animations', get_template_directory_uri() .  '/css/animations.css',array(),'1.0');
wp_enqueue_style('magnific-popup', get_template_directory_uri() .  '/css/magnific-popup.css',array(),'1.3.0');
if ( ! defined( 'FW' ) ) {
    wp_enqueue_style('font-awesome', get_template_directory_uri() .  '/css/font-awesome/css/font-awesome.css',array(),'4.1.0');
}
if ( defined( 'FW' ) ) {
    fw()->backend->option_type('icon-v2')->packs_loader->enqueue_frontend_css();
}
wp_enqueue_style('breezycv-main-styles', get_template_directory_uri().'/css/main.css',array(),'1.6.0');

if ( is_rtl() ) {
    wp_enqueue_style('breezycv-rtl-styles', get_template_directory_uri().'/css/rtl.css',array(),'1.6.0');
}

$theme_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('theme_style') : 'light';

if ($theme_style == 'light') {
	require_once get_parent_theme_file_path( '/inc/customization.php' );
	wp_enqueue_style('breezycv-customization', get_template_directory_uri().'/css/customization.css',array(),'1.6.0');
	wp_add_inline_style( 'breezycv-customization', breezycv_theme_customizations() );
} else {
	wp_enqueue_style('breezycv-dark-styles', get_template_directory_uri().'/css/dark-styles.css',array(),'1.6.0');
	require_once get_parent_theme_file_path( '/inc/customization_dark.php' );
	wp_enqueue_style('breezycv-customization', get_template_directory_uri().'/css/customization.css',array(),'1.6.0');
	wp_add_inline_style( 'breezycv-customization', breezycv_theme_customizations_dark() );
}

/** Add Scripts in to the Head **/
wp_enqueue_script('jquery');
/** /Add Scripts in to the Head **/
wp_enqueue_script('modernizr', get_template_directory_uri().'/js/modernizr.custom.js',array(),'2.8.3',true);
wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js',array(),'4.0.0',true);
wp_enqueue_script('owl-carousel', get_template_directory_uri().'/js/owl.carousel.min.js',array(),'2.0',true);
wp_enqueue_script('perfect-scrollbar', get_template_directory_uri().'/js/perfect-scrollbar.min.js',array(),'0.8.1',true);
wp_enqueue_script('breezycv-jquery-validator', get_template_directory_uri().'/js/validator.js',array(),'1.0',true);
wp_enqueue_script('imagesloaded');
if ( ! is_rtl() ) {
    wp_enqueue_script('shuffle', get_template_directory_uri().'/js/jquery.shuffle.min.js',array(),'3.1.1',true);
} else {
    wp_enqueue_script('shuffle', get_template_directory_uri().'/js/rtl/jquery.shuffle.min.js',array(),'3.1.1',true);
}
wp_enqueue_script('masonry');
wp_enqueue_script('magnific-popup', get_template_directory_uri().'/js/jquery.magnific-popup.min.js',array(),'1.2.0',true);
if ( is_page_template('page-templates/template-breezycv-vcard.php') ) {
	wp_enqueue_script('breezycv-animating', get_template_directory_uri().'/js/animating.js',array(),'1.6.0',true);
}
wp_enqueue_script('events', get_template_directory_uri().'/js/mutate.events.min.js',array(),'1.0.0',true);
wp_enqueue_script('mutate', get_template_directory_uri().'/js/mutate.min.js',array(),'1.0.0',true);
wp_enqueue_script('breezycv-jquery-main', get_template_directory_uri().'/js/main.js',array(),'1.6.0',true);

if ( is_singular(array('post')) && comments_open() ){
  wp_enqueue_script('comment-reply');
}

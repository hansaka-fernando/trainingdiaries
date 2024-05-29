<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

/**
 * Theme Includes
 */
require_once get_template_directory() .'/inc/init.php';



/**
 * TGM Plugin Activation
 */
{
	require_once  get_template_directory() . '/TGM-Plugin-Activation/class-tgm-plugin-activation.php';

	add_action( 'tgmpa_register', 'breezycv_register_required_plugins' );

	/** @internal */
	function breezycv_register_required_plugins() {
		tgmpa( array(
			array(
				'name'      => 'Unyson',
				'slug'      => 'unyson',
				'required'  => true,
			),
            array(
                'name'      => 'Elementor',
                'slug'      => 'elementor',
                'required'  => true,
            ),
			array(
				'name'               => 'Breezycv Widgets', // The plugin name.
				'slug'               => 'breezycv-widgets', // The plugin slug (typically the folder name).
				'source'             => get_template_directory_uri() . '/plugins/breezycv-widgets.zip', // The plugin source.
				'required'           => true,
				'version'            => '1.5.3',
			),
			array(
				'name'               => 'Breezycv Portfolio', // The plugin name.
				'slug'               => 'breezycv-portfolio', // The plugin slug (typically the folder name).
				'source'             => get_template_directory_uri() . '/plugins/breezycv-portfolio.zip', // The plugin source.
				'required'           => true,
				'version'            => '1.3.2',
			),
			array(
				'name'               => 'Breezycv Share Buttons', // The plugin name.
				'slug'               => 'breezycv-share-buttons', // The plugin slug (typically the folder name).
				'source'             => get_template_directory_uri() . '/plugins/breezycv-share-buttons.zip', // The plugin source.
				'required'           => true,
				'version'            => '1.0.0',
			),
			array(
				'name'               => 'Envato Market', // The plugin name.
				'slug'               => 'envato-market', // The plugin slug (typically the folder name).
				'source'             => get_template_directory_uri() . '/plugins/envato-market.zip', // The plugin source.
				'required'           => false,
				'version'            => '2.0.3',
			),
		) );

	}
}

/* ================================================================================================ */



/**
 * LMPixels ajax url
 */

if( ! function_exists( 'breezycv_ajaxurl' ) ){
  function breezycv_ajaxurl() {
  	$inline_ajax_script = 'var ajaxurl = ' . '"' . admin_url('admin-ajax.php') . '"' . ';';
  	wp_add_inline_script( 'breezycv-jquery-main', $inline_ajax_script);
  }
}
add_action('wp_head','breezycv_ajaxurl');

/* ================================================================================================ */



/**
 * Content Width
 */
if ( ! isset( $content_width ) ) $content_width = 1320;
/* ================================================================================================ */

function breezycv_add_post_class_to_single_post( $classes ) {
	if ( is_single() ) {
		array_push( $classes, 'single-post' );
	}
	return $classes;
}
add_filter( 'body_class', 'breezycv_add_post_class_to_single_post' );


function breezycv_setup_theme_supported_features() {
    $google_fonts_link = get_option('breezycv_theme_google_fonts_link', '');
    $theme_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('theme_style_picker') :  'light';

    add_theme_support( 'editor-styles');
    add_theme_support( 'responsive-embeds' );
    add_editor_style( 'css/style-editor.css' );
    add_editor_style( $google_fonts_link );

    if( $theme_style == 'dark' ) {
        add_theme_support( 'dark-editor-style' );
    }

    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'Cornflower Blue', 'breezycv' ),
            'slug' => 'cornflower-blue',
            'color' => '#7066ff',
        ),
        array(
            'name' => esc_html__( 'Emerald', 'breezycv' ),
            'slug' => 'emerald',
            'color' => '#54ca95',
        ),
        array(
            'name' => esc_html__( 'Shakespeare', 'breezycv' ),
            'slug' => 'shakespeare',
            'color' => '#55c0ce',
        ),
        array(
            'name' => esc_html__( 'Persimmon', 'breezycv' ),
            'slug' => 'persimmon',
            'color' => '#fc6158',
        ),
        array(
            'name' => esc_html__( 'Azure Radiance', 'breezycv' ),
            'slug' => 'azure-radiance',
            'color' => '#007ced',
        ),
        array(
            'name' => esc_html__( 'Neon Carrot', 'breezycv' ),
            'slug' => 'neon-carrot',
            'color' => '#ff9638',
        ),
        array(
            'name' => esc_html__( 'Burnt Sienna', 'breezycv' ),
            'slug' => 'burnt-sienna',
            'color' => '#ef5555',
        ),
        array(
            'name' => esc_html__( 'Blue Bayoux', 'breezycv' ),
            'slug' => 'blue-bayoux',
            'color' => '#4a6583',
        ),
        array(
            'name' => esc_html__( 'Cerulean', 'breezycv' ),
            'slug' => 'cerulean',
            'color' => '#0099e5',
        ),
        array(
            'name' => esc_html__( 'Saffron', 'breezycv' ),
            'slug' => 'saffron',
            'color' => '#f8b732',
        ),
        array(
            'name' => esc_html__( 'Java', 'breezycv' ),
            'slug' => 'java',
            'color' => '#10b9b2',
        ),
        array(
            'name' => esc_html__( 'Carnation', 'breezycv' ),
            'slug' => 'carnation',
            'color' => '#ef5565',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'breezycv' ),
            'slug' => 'very-light-gray',
            'color' => '#f5f5f5',
        ),
        array(
            'name' => esc_html__( 'light gray', 'breezycv' ),
            'slug' => 'light-gray',
            'color' => '#e5e5e5',
        ),
        array(
            'name' => esc_html__( 'dark gray', 'breezycv' ),
            'slug' => 'dark-gray',
            'color' => '#555',
        ),
        array(
            'name' => esc_html__( 'very dark gray', 'breezycv' ),
            'slug' => 'very-dark-gray',
            'color' => '#333',
        ),
    ) );

    add_theme_support( 'disable-custom-colors' );
    add_theme_support( 'align-wide' );
}

add_action( 'after_setup_theme', 'breezycv_setup_theme_supported_features' );

/**
 * Enqueue supplemental block editor styles.
 */

if ( function_exists( 'register_block_type' ) && is_admin() ) {
    function breezycv_theme_settings_styles() {
        wp_enqueue_style( 'breezycv-editor-theme-settings-styles', get_theme_file_uri( '/css/style-editor-dynamic.css' ), false, '2.2', 'all' );
        require_once get_parent_theme_file_path( '/inc/dynamic-styles.php' );
        wp_add_inline_style( 'breezycv-editor-theme-settings-styles', breezycv_theme_settings_css() );
    }
    add_action( 'enqueue_block_editor_assets', 'breezycv_theme_settings_styles' );
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function breezycv_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'breezycv_pingback_header' );


/**
 * BreezyCV Main Menu Walker
 */
class Breezycv_Onepage_Walker extends Walker_Nav_Menu{
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="'. esc_attr( $class_names ) . '"';
        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $type = $item->object;


        $id_front_page = get_option( 'page_on_front' );
        $front_page_template = get_page_template_slug( $id_front_page );

        if($item->object == 'page') {
            if ( $front_page_template == "page-templates/template-breezycv-vcard.php" ) {
                $varpost = get_post($item->object_id);
                if ( is_front_page() ) {
                  $attributes .= ' href="#' . $varpost->post_name . '"';
                }else{
                  $attributes .= ' href="'.home_url().'/#' . $varpost->post_name . '"';
                }
            } else {
                $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
            }
        }
        else {
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        }


        $item_output = $args->before;
        if ($type != "page") {
            $item_output .= '<a class="nav-anim nav-custom" '. $attributes .' data-object="'.$type.'">';
        } else {
            $item_output .= '<a class="nav-anim" '. $attributes .' data-object="'.$type.'">';
        }
        $item_output .= '<span class="text">' . $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . '</span>';
        $item_output .= $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
    }
}

if (!function_exists('_disable_fw_use_sessions')) { add_filter('fw_use_sessions','_disable_fw_use_sessions'); function _disable_fw_use_sessions(){ return false; } }

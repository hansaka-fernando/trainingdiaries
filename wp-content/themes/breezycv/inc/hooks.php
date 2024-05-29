<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Filters and Actions
 */

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 * @internal
 */
function breezycv_action_theme_admin_fonts() {
	wp_enqueue_style( 'fw-theme-lato', breezycv_theme_font_url(), array(), '1.0' );
}

add_action( 'admin_print_scripts-appearance_page_custom-header', 'breezycv_action_theme_admin_fonts' );

add_action( 'admin_enqueue_scripts', 'breezycv_load_admin_styles' );
function breezycv_load_admin_styles() {
    wp_enqueue_style( 'admin_css_foo', get_template_directory_uri() . '/css/admin-style.css', false, '1.0' );
}

if ( ! function_exists( 'breezycv_action_theme_setup' ) ) : /**
 * Theme setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 * @internal
 */ {
	function breezycv_action_theme_setup() {

		/*
		 * Make Theme available for translation.
		 */
		load_theme_textdomain( 'breezycv', get_template_directory() . '/languages' );

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

        add_theme_support( 'custom-background');
        add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 811, 372, true );
		add_image_size( 'breezycv-theme-full-width', 1240, 576, true );

        add_theme_support( 'admin-bar', array( 'callback'=>'__return_false' ) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );
	}
}
endif;
add_action( 'init', 'breezycv_action_theme_setup' );

/**
 * Adjust content_width value for image attachment template.
 * @internal
 */
function breezycv_action_theme_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 810;
	}
}

add_action( 'template_redirect', 'breezycv_action_theme_content_width' );

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 *
 * @param array $classes A list of existing body class values.
 *
 * @return array The filtered body class list.
 * @internal
 */
function breezycv_filter_theme_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} else {
		$classes[] = 'masthead-fixed';
	}

	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}

	if ( function_exists('fw_ext_sidebars_get_current_position') ) {
		$current_position = fw_ext_sidebars_get_current_position();
		if ( in_array( $current_position, array( 'full', 'left' ) )
		     || empty($current_position)
		     || is_attachment()
		) {
			$classes[] = 'full-width';
		}
	} else {
		$classes[] = 'full-width';
	}

	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'footer-widgets';
	}

	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		$classes[] = 'slider';
	} elseif ( is_front_page() ) {
		$classes[] = 'grid';
	}

	return $classes;
}

add_filter( 'body_class', 'breezycv_filter_theme_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @param array $classes A list of existing post class values.
 *
 * @return array The filtered post class list.
 * @internal
 */
function breezycv_filter_theme_post_classes( $classes ) {
	if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}

add_filter( 'post_class', 'breezycv_filter_theme_post_classes' );

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 *
 * @return string The filtered title.
 * @internal
 */
function breezycv_filter_theme_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( esc_html__( 'Page %s', 'breezycv' ), max( $paged, $page ) );
	}

	return $title;
}

add_filter( 'wp_title', 'breezycv_filter_theme_wp_title', 10, 2 );


/**
 * Flush out the transients used in fw_theme_categorized_blog.
 * @internal
 */
function breezycv_action_theme_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'fw_theme_category_count' );
}

add_action( 'edit_category', 'breezycv_action_theme_category_transient_flusher' );
add_action( 'save_post', 'breezycv_action_theme_category_transient_flusher' );

/**
 * Theme Customizer support
 */
{
	/**
	 * Implement Theme Customizer additions and adjustments.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 *
	 * @internal
	 */
	function breezycv_action_theme_customize_register( $wp_customize ) {
        $wp_customize->remove_section("colors");
		// Add postMessage support for site title and description.
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

		// Rename the label to "Site Title Color" because this only affects the site title in this theme.
		$wp_customize->get_control( 'header_textcolor' )->label = esc_html__( 'Site Title Color', 'breezycv' );

		// Rename the label to "Display Site Title & Tagline" in order to make this option extra clear.
		$wp_customize->get_control( 'display_header_text' )->label = esc_html__( 'Display Site Title &amp; Tagline', 'breezycv' );
	}

	add_action( 'customize_register', 'breezycv_action_theme_customize_register' );

	/**
	 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
	 * @internal
	 */
	function breezycv_action_theme_customize_preview_js() {
		wp_enqueue_script(
			'fw-theme-customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ),
			'1.0',
			true
		);
	}

	add_action( 'customize_preview_init', 'breezycv_action_theme_customize_preview_js' );
}

/**
 * Register widget areas.
 * @internal
 */
function breezycv_action_theme_widgets_init() {
    register_sidebar(
        array(
            'name' => esc_html__('Blog Page Sidebar','breezycv'),
            'id'   => 'breezycv-blog-sidebar',
            'description'   => esc_html__('Breezycv Theme Blog Page Sidebar','breezycv'),
            'before_widget' => '<div class="sidebar-item">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="sidebar-title"><h4>',
            'after_title'   => '</h4></div>'
        )
    );
}

add_action( 'widgets_init', 'breezycv_action_theme_widgets_init' );

if ( defined( 'FW' ) ):
	/**
	 * Display current submitted FW_Form errors
	 * @return array
	 */
	if ( ! function_exists( 'breezycv_action_theme_display_form_errors' ) ):
		function breezycv_action_theme_display_form_errors() {
			$form = FW_Form::get_submitted();

			if ( ! $form || $form->is_valid() ) {
				return;
			}

			wp_enqueue_script(
				'fw-theme-show-form-errors',
				get_template_directory_uri() . '/js/form-errors.js',
				array( 'jquery' ),
				'1.0',
				true
			);

			wp_localize_script( 'fw-theme-show-form-errors', '_localized_form_errors', array(
				'errors'  => $form->get_errors(),
				'form_id' => $form->get_id()
			) );
		}
	endif;
	add_action('wp_enqueue_scripts', 'breezycv_action_theme_display_form_errors');
endif;

function lmpixels_add_linearicons_tab( $tabs = array() ) {

    // Append new icons
    $linearicons = array(
        'home',
        'apartment',
        'pencil',
        'magic-wand',
        'drop',
        'lighter',
        'poop',
        'sun',
        'moon',
        'cloud',
        'cloud-upload',
        'cloud-download',
        'cloud-sync',
        'cloud-check',
        'database',
        'lock',
        'cog',
        'trash',
        'dice',
        'heart',
        'star',
        'star-half',
        'star-empty',
        'flag',
        'envelope',
        'paperclip',
        'inbox',
        'eye',
        'printer',
        'file-empty',
        'file-add',
        'enter',
        'exit',
        'graduation-hat',
        'license',
        'music-note',
        'film-play',
        'camera-video',
        'camera',
        'picture',
        'book',
        'bookmark',
        'user',
        'users',
        'shirt',
        'store',
        'cart',
        'tag',
        'phone-handset',
        'phone',
        'pushpin',
        'map-marker',
        'map',
        'location',
        'calendar-full',
        'keyboard',
        'spell-check',
        'screen',
        'smartphone',
        'tablet',
        'laptop',
        'laptop-phone',
        'power-switch',
        'bubble',
        'heart-pulse',
        'construction',
        'pie-chart',
        'chart-bars',
        'gift',
        'diamond',
        'linearicons',
        'dinner',
        'coffee-cup',
        'leaf',
        'paw',
        'rocket',
        'briefcase',
        'bus',
        'car',
        'train',
        'bicycle',
        'wheelchair',
        'select',
        'earth',
        'smile',
        'sad',
        'neutral',
        'mustache',
        'alarm',
        'bullhorn',
        'volume-high',
        'volume-medium',
        'volume-low',
        'volume',
        'mic',
        'hourglass',
        'undo',
        'redo',
        'sync',
        'history',
        'clock',
        'download',
        'upload',
        'enter-down',
        'exit-up',
        'bug',
        'code',
        'link',
        'unlink',
        'thumbs-up',
        'thumbs-down',
        'magnifier',
        'cross',
        'menu',
        'list',
        'chevron-up',
        'chevron-down',
        'chevron-left',
        'chevron-right',
        'arrow-up',
        'arrow-down',
        'arrow-left',
        'arrow-right',
        'move',
        'warning',
        'question-circle',
        'menu-circle',
        'checkmark-circle',
        'cross-circle',
        'plus-circle',
        'circle-minus',
        'arrow-up-circle',
        'arrow-down-circle',
        'arrow-left-circle',
        'arrow-right-circle',
        'chevron-up-circle',
        'chevron-down-circle',
        'chevron-left-circle',
        'chevron-right-circle',
        'crop',
        'frame-expand',
        'frame-contract',
        'layers',
        'funnel',
        'text-format',
        'text-format-remove',
        'text-size',
        'bold',
        'italic',
        'underline',
        'strikethrough',
        'highlight',
        'text-align-left',
        'text-align-center',
        'text-align-right',
        'text-align-justify',
        'line-spacing',
        'indent-increase',
        'indent-decrease',
        'pilcrow',
        'direction-ltr',
        'direction-rtl',
        'page-break',
        'sort-alpha-asc',
        'sort-amount-asc',
        'hand',
        'pointer-up',
        'pointer-right',
        'pointer-down',
        'pointer-left',
    );
    
    $tabs['linearicons'] = array(
        'name'          => 'linearicons',
        'label'         => esc_html__( 'Linearicons Free', 'breezycv' ),
        'labelIcon'     => 'lnr lnr-star',
        'prefix'        => 'lnr-',
        'displayPrefix' => 'lnr',
        'url'           => get_template_directory_uri() . ('/css/linearicons/style.css'),
        'icons'         => $linearicons,
        'ver'           => '1.0.0',
    );

    return $tabs;
}

add_filter( 'elementor/icons_manager/additional_tabs', 'lmpixels_add_linearicons_tab' );

function lmpixels_add_icon_pack($default_packs) {
    return array(
      'linear-icons' => array(
        'name' => 'linear-icons',
        'title' => 'Linearicons',
        'css_class_prefix' => 'lnr',
        'css_file' => get_template_directory() . ('/css/linearicons/style.css'),
        'css_file_uri' => get_template_directory_uri() . ('/css/linearicons/style.css'),
      ),
      'font-awesomefw' => array(
        'name' => 'font-awesomefw',
        'title' => 'FontAwesome',
        'css_class_prefix' => 'fafw',
        'css_file' => get_template_directory() . ('/css/font-awesome/css/font-awesome.min.css'),
        'css_file_uri' => get_template_directory_uri() . ('/css/font-awesome/css/font-awesome.min.css'),
      ),
      'font-awesome-6-brands' => array(
        'name' => 'font-awesome-6-brands',
        'title' => 'Font Awesome 6 Brands',
        'css_class_prefix' => 'fanew',
        'css_file' => get_template_directory() . ('/css/fontawesome-6.2.0/css/brands.css'),
        'css_file_uri' => get_template_directory_uri() . ('/css/fontawesome-6.2.0/css/brands.css'),
      ),
    );
}
add_filter('fw:option_type:icon-v2:packs', 'lmpixels_add_icon_pack');



function _custom_packs_list($current_packs) {
    /**
     * $current_packs is an array of pack names.
     * You should return which one you would like to show in the picker.
     */
    return array('font-awesomefw', 'linear-icons', 'font-awesome-6-brands');
}

add_filter('fw:option_type:icon-v2:filter_packs', '_custom_packs_list');


/**
 * Megamenu icons set
 */
function unique_filter_mega_menu_icon_customizations($option) {
    $option['type'] = 'icon-v2';

    return $option;
}
add_filter( 'fw:ext:megamenu:icon-option', 'unique_filter_mega_menu_icon_customizations' );



/**
 * Enqueue Google fonts style to frontend.
 */

if (!defined('FW')) {
    function breezycv_action_theme_process_google_fonts_default()
    {
        // this array contain default theme fonts
        $include_from_google = array(
            'Poppins' => array(
                'family' => 'Poppins',
                'variants' => array(
                    '0' => '300',
                    '1' => 'regular',
                    '2' => '500',
                    '3' => '600',
                    '4' => '700',
                    '5' => '800'
                ),
                'position' => 11278
            )
        );

        $google_fonts_links = breezycv_theme_get_remote_fonts($include_from_google);
        // set an array of google fonts in db
        if($google_fonts_links == ''){
            update_option( 'breezycv_theme_google_fonts_link', $google_fonts_links );
        }
    }

    add_action('after_setup_theme', 'breezycv_action_theme_process_google_fonts_default', 999, 2);
}


if(!function_exists('breezycv_action_theme_process_google_fonts')) {
    function breezycv_action_theme_process_google_fonts()
    {
        $include_from_google = array();
        $google_fonts = fw_get_google_fonts();

        $body_typography = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography') :  'Poppins';
        $headings_typography = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('headings') :  'Poppins';

        $main_menu_font = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_menu_font') :  'Poppins';
        $cp_title_general_title_font = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font') :  'Poppins';
        $cp_title_general_subtitle_font = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_subtitle_font') : 'Poppins';

        // if is google font
        if( isset($google_fonts[$body_typography['family']]) ){
            $include_from_google[$body_typography['family']] =   $google_fonts[$body_typography['family']];
        }

        if( isset($google_fonts[$headings_typography['family']]) ){
            $include_from_google[$headings_typography['family']] =   $google_fonts[$headings_typography['family']];
        }

        if( isset($google_fonts[$main_menu_font['family']]) ){
            $include_from_google[$main_menu_font['family']] =   $google_fonts[$main_menu_font['family']];
        }

        if( isset($google_fonts[$cp_title_general_title_font['family']]) ){
            $include_from_google[$cp_title_general_title_font['family']] =   $google_fonts[$cp_title_general_title_font['family']];
        }

        if( isset($google_fonts[$cp_title_general_subtitle_font['family']]) ){
            $include_from_google[$cp_title_general_subtitle_font['family']] =   $google_fonts[$cp_title_general_subtitle_font['family']];
        }

        $google_fonts_links = breezycv_theme_get_remote_fonts($include_from_google);
        // set a option in db for save google fonts link
        update_option( 'breezycv_theme_google_fonts_link', $google_fonts_links );
    }
    add_action('fw_settings_form_saved', 'breezycv_action_theme_process_google_fonts', 999, 2);
}

if (!function_exists('breezycv_theme_get_remote_fonts')) :
    function breezycv_theme_get_remote_fonts($include_from_google) {
        /**
         * Get remote fonts
         * @param array $include_from_google
         */
        if ( ! sizeof( $include_from_google ) ) {
            return '';
        }

        $protocol  = is_ssl() ? 'https' : 'http';

        $html = "{$protocol}://fonts.googleapis.com/css?family=";

        foreach ( $include_from_google as $font => $styles ) {
            $html .= str_replace( ' ', '+', $font ) . ':' . implode( ',', $styles['variants'] ) . '%7C';
        }

        $html = substr( $html, 0, - 3 );

        return $html;
    }
endif;

if (!function_exists('breezycv_action_theme_enqueue_google_fonts_styles')) :
    function breezycv_action_theme_enqueue_google_fonts_styles() {
        /**
         * Enqueue google fonts styles
         */
        $google_fonts_link = get_option('breezycv_theme_google_fonts_link', '');
        if($google_fonts_link != ''){
            wp_enqueue_style( 'breezycv-google-fonts', $google_fonts_link, array(), null);
        }
    }
    add_action('wp_head', 'breezycv_action_theme_enqueue_google_fonts_styles', 1);
endif;




/**
 * Porfolio detailed page Ajax query.
 */

function breezycv_ajax_query() {
    // Return normally if the ajax query isn't set
    if ( ! isset( $_GET['ajax'] ) ) {
        return;
    }

    set_query_var( 'ajax', 'true' );
}

add_filter( 'template_redirect', 'breezycv_ajax_query' );

function breezycv_add_anchor( $atts, $item, $args ) {

    $atts['href'] .= ( !empty( $item->xfn ) ? '#' . $item->xfn : '' );
    $atts['data-hover'] = '1';

    return $atts;

}

add_filter( 'nav_menu_link_attributes', 'breezycv_add_anchor', 10, 3 );


function breezycv_excerpt_more( $more ) {
    if ( ! is_single() ) {
        $more = sprintf( '...<p><a class="read-more" href="%1$s">%2$s</a></p>',
            get_permalink( get_the_ID() ),
            esc_html__( 'Read More', 'breezycv' )
        );
    }
 
    return $more;
}
add_filter( 'excerpt_more', 'breezycv_excerpt_more' );


function breezycv_filter_theme_fw_ext_backups_demo_dirs($dirs) {
    $dirs[get_template_directory() .'/framework-customizations/demo-content']
    = get_template_directory_uri() .'/framework-customizations/demo-content';

    return $dirs;
}
add_filter('fw_ext_backups_demo_dirs', 'breezycv_filter_theme_fw_ext_backups_demo_dirs');

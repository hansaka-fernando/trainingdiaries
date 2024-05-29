<?php

function breezycv_theme_customizations_dark() {
    //================================================================================================================================
    // Custom styles
    //================================================================================================================================
    $custom_styles = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('custom_styles') : '';
    $pages_shadow = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_content_shadow_dark') : 'on';
    $content_max_width = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('content_max_width_dark') : '1280';
    $content_area_br = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('content_border_radius') : '32';
    $content_area_bs = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('content_box_shadow') : 'no';
    $move_effect = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('move_effect') :  'no'; 
    $content_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('content_bg_color_dark') :  '#fff';


    //================================================================================================================================
    // Main color
    //================================================================================================================================
    $theme_main_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_color_dark') : '#0ba376';

    //================================================================================================================================
    // Backgrounds
    //================================================================================================================================
    $main_header_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_header_bg_color_dark') : '#ffffff';

    $body_bg_gradient_from = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_gradient_from_dark') : '#0b7080';
    $body_bg_gradient_to = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_gradient_to_dark') : '#0ba376';

    $header_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('header_bg_color_dark') : '#ffffff';

    $sidebar_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('sidebar_bg_color_dark') : '#ffffff';

    $sp_title_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('start_page_title_color_dark') : '#ffffff';
    $sp_subtitle_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('start_page_subtitle_color_dark') : '#ffffff';

    if (is_customize_preview()) {
        $move_effect = "no";
    }
    if ($move_effect == "yes") {
        remove_theme_support( 'custom-background' );
    }


    //================================================================================================================================
    // Typography
    //================================================================================================================================
    $body_text_font = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography/family') : 'Poppins';
    $body_text_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography/size') : '14';
    $body_text_line_height = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography/line-height') : '1.75';
    $body_text_variation = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography/variation') : 'regular';
    $body_text_weight = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography/weight') : '400';
    $body_text_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography/style') : 'normal';
    if ( $body_text_weight == '' ) {
        $body_text_weight = intval($body_text_variation);
        $body_text_style = ( strpos( $body_text_variation, 'italic' ) ) ? 'italic' : 'normal';
        if ( $body_text_weight == 'regular' ) {
            $body_text_weight = '400';
            $body_text_style = 'normal';
        }
        if ( $body_text_variation == 'italic' ) {
            $body_text_weight = '400';
            $body_text_style = 'italic';
        }
    }
    $body_text_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_text_color_dark') : '#555';

    $headings_font = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('headings/family') : 'Poppins';
    $headings_variation = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('headings/variation') : 'regular';
    $headings_weight = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('headings/weight') : '600';
    $headings_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('headings/style') : 'normal';
    if ( $headings_weight == '' ) {
        $headings_weight = intval($headings_variation);
        $headings_style = ( strpos( $headings_variation, 'italic' ) ) ? 'italic' : 'normal';
        if ( $headings_weight == 'regular' ) {
            $headings_weight = '400';
            $headings_style = 'normal';
        }
        if ( $headings_variation == 'italic' ) {
            $headings_weight = '400';
            $headings_style = 'italic';
        }
    }
    $headings_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('headings_color_dark') : '#222';


    $h1_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('h1/size') : '32';
    $h2_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('h2/size') : '27';
    $h3_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('h3/size') : '21';
    $h4_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('h4/size') : '18';
    $h5_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('h5/size') : '16';
    $h6_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('h6/size') : '14';

    $links_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('links_color_dark') : '#0099CC';
    $links_hover_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('links_hover_color_dark') : '#006699';


    /* logo vars */
    $logo_img = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('photo') : '';
    $logo_img_height = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('logo_img_height') : '';
    $logo_img_width = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('logo_img_width') : '';
    $logo_dots = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('logo_dots') : 'no';
    $logo_border = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('logo_border') : 'no';



    //================================================================================================================================
    // Page Titles and Page Content Area
    //================================================================================================================================
    $cp_general_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_bg_color_dark') : '#0ba376';

    $cp_general_bg_gradient_from = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('pc_gradient_from_dark') : '#444444';
    $cp_general_bg_gradient_to = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('pc_gradient_to_dark') : '#444444';

    $cp_general_title_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font_dark/size') : '32';
    $cp_general_title_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font_dark/color') : '#333';
    $cp_general_title_font = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font_dark/family') : 'Poppins';
    $cp_general_title_variation = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font_dark/variation') : 'regular';
    $cp_general_title_weight = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font_dark/weight') : '600';
    $cp_general_title_spacing = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font_dark/letter-spacing') : '0';
    $cp_general_title_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font_dark/style') : 'normal';
    if ( $cp_general_title_weight == '' ) {
        $cp_general_title_weight = intval($cp_general_title_variation);
        $cp_general_title_style = ( strpos( $cp_general_title_variation, 'italic' ) ) ? 'italic' : 'normal';
        if ( $cp_general_title_weight == 'regular' ) {
            $cp_general_title_weight = '400';
            $cp_general_title_style = 'normal';
        }
        if ( $cp_general_title_weight == 'italic' ) {
            $cp_general_title_weight = '400';
            $cp_general_title_style = 'italic';
        }
    }


    $content_max_width_min = $content_max_width + 101;
    $content_max_width_max = $content_max_width + 100;
    
    if($content_area_bs == "yes") {
        $content_arex_shadow_css = '
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
        ';
    } else {
        $content_arex_shadow_css = '';
    }

    $cp_general_title_size_small = $cp_general_title_size*0.8;



    if( !empty( $logo_img_height ) ) {
        $logo_img_height_not_empty = '
        height: auto;
        max-height: ' . $logo_img_height . 'px;
        ';
    } else {
        $logo_img_height_not_empty = '';
    }

    if( !empty( $logo_img_width ) ) {
        $logo_img_width_not_empty = '
        width: auto;
        max-width: ' . $logo_img_width . 'px;
        ';
    } else {
        $logo_img_width_not_empty = '';
    }

    if ( $logo_border == "yes" ) {
        $disable_logo_border = '
        .header-photo img {
            border: 0;
            background-color: transparent;
        }
        ';
    } else {
        $disable_logo_border = '';
    }

    if ( $logo_dots == "yes" ) {
        $disable_logo_dots = '
        .header-photo:after {
            display: none;
        }
        ';
    } else {
        $disable_logo_dots = '';
    }


    if( !empty( $logo_img ) && ($logo_img_height > 50) && !empty( $logo_img_height ) ) {
        $logo_text_css = '
        .logo-text {
            line-height: ' . $logo_img_height . 'px;
            margin-left: 10px;
        }
        ';
    } else {
        $logo_text_css = '';
    }

    $move_effect_css = '
        html {
            background: -webkit-gradient(linear, left top, left bottom, from('.$body_bg_gradient_from.'), to('.$body_bg_gradient_to.'));
            background: linear-gradient('.$body_bg_gradient_from.', '.$body_bg_gradient_to.');
        }
        body {
            background-color: transparent;
        }
    ';

    if ($move_effect == "yes") {
    $bg_wp = get_background_image();
    $move_effect_css .= '
    .lm-animated-bg {
        position: absolute;
        width: auto;
        height: auto;
        top: -18px;
        left: -18px;
        right: -18px;
        bottom: -18px;
        background-image: url(' . $bg_wp . ');
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
        z-index: -1;
    }
    ';
    }

    $layout_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('layout_style') : 'boxed';

    if ($layout_style == 'fullwidth') {
        $full_width_styles = '
        @media only screen and (min-width: 1300px) {
            .header {
                max-width: 420px;
            }
            .content-area {
                max-width: calc(100% - 420px);
            }

            .header .copyrights {
                width: 420px;
            }
        }
        @media only screen and (min-width: 1025px) {
            .header {
                max-height: 100%;
            }
            ul.main-menu {
                background-color: #222;
                width: 86px;
                left: -86px;
                right: auto;
                top: 0;
                bottom: 0;
                border-radius: 0;
            }
            ul.main-menu a {
                border-bottom: 1px solid #333;
            }
            .page-content {
                max-width: 100%;
                min-height: 100%;
                margin: 0 auto;
                border-radius: 0;
            }
            .page-wrapper {
                padding-left: 86px;
                padding-right: 0;
            }
            .animated-section, .single-page-content,
            .animated-section,
            .section-content,
            .single-page-content,
            .content-wrapper {
                border-radius: 0;
            }
            ul.main-menu .link-text {
                position: relative;
                left: 0;
                right: 0;
                right: auto;
                visibility: visible;
                opacity: 1;
                color: #eee;
                font-size: 11px;
                padding: 8px 0 5px;
                background: transparent;
                box-shadow: none;
            }
            ul.main-menu a:hover .link-text {
                left: 0;
                right: 0;
            }
            .lmpixels-arrows-nav {
                background-color: #444;
                width: 48px;
                right: 10px;
                bottom: 10px;
                padding: 5px 0;
                border: 2px solid ' . $theme_main_color . ';
            }
        }
        .home-page-first-style {
            min-height: calc(100vh - 140px) !important;
        }
        ';
        if ( is_rtl() ) {
            $full_width_styles .= '
            @media only screen and (min-width: 1025px) {
                .page-wrapper {
                    padding-right: 86px;
                    padding-left: 0;
                }
                ul.main-menu {
                    right: -86px;
                    left: auto;
                }
                .lmpixels-arrows-nav {
                    left: 10px;
                    right: auto;
                }
            }
            ';
        }
    } else {
        $full_width_styles = '';
    }

    $content_wrapper_br = $content_area_br - 2;

    if ($content_area_br <= 2) {
        $content_wrapper_br = '0';
    }

    $customization_css = '
        .page-content {
            max-width: ' . $content_max_width . 'px;
        }
        @media only screen and (min-width: 1024px){
            .page-content {
                border-radius: ' . $content_area_br . 'px;
                ' . $content_arex_shadow_css . '
            }
            .animated-section,
            .section-content,
            .single-page-content,
            .content-wrapper {
               border-radius: ' . $content_wrapper_br . 'px; 
            }
        }

        /* ============================================================================= 
        2. Typography
        ============================================================================= */
        body,
        p,
        .elementor .elementor-widget-icon-box .elementor-icon-box-content .elementor-icon-box-description {
            font-family: "' . $body_text_font . '", Helvetica, sans-serif;
            font-size: ' . $body_text_size . 'px;
            font-weight: ' . $body_text_weight . ';
            font-style: ' . $body_text_style . ';
            line-height: ' . $body_text_line_height . 'em;
            color: ' . $body_text_color . ';
        }

        .form-control,
        .form-control:focus,
        .has-error .form-control,
        .has-error .form-control:focus {
            font-family: "' . $body_text_font . '", Helvetica, sans-serif;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: "' . $headings_font . '", Helvetica, sans-serif;
            font-weight: ' . $headings_weight . ';
            font-style: ' . $headings_style . ';
            color: ' . $headings_color . ';
        }

        .logo-text, .logo-symbol {
            font-family: "' . $headings_font . '", Helvetica, sans-serif;
        }

        h1 {
            font-size: ' . $h1_size . 'px;
            color: ' . $headings_color . ';
        }
        h2 {
            font-size: ' . $h2_size . 'px;
            color: ' . $headings_color . ';
        }
        h3 {
            font-size: ' . $h3_size . 'px;
            color: ' . $headings_color . ';
        }
        h4 {
            font-size: ' . $h4_size . 'px;
            color: ' . $headings_color . ';
        }
        h5 {
            font-size: ' . $h5_size . 'px;
            color: ' . $headings_color . ';
        }
        h6 {
            font-size: ' . $h6_size . 'px;
            color: ' . $headings_color . ';
        }

        .testimonial-author {
            font-family: "' . $headings_font . '", Helvetica, sans-serif;
            font-weight: ' . $headings_weight . ';
            font-style: ' . $headings_style . ';
            color: ' . $headings_color . ';
        }

        .timeline-item .item-period,
        .mobile-site-title {
            font-family: "' . $headings_font . '", Helvetica, sans-serif;
        }

        .form-control,
        .form-control:focus,
        .has-error .form-control,
        .has-error .form-control:focus,
        input[type="search"],
        input[type="password"],
        input[type="text"],
        .header-search input.form-control {
            font-family: "' . $body_text_font . '", Helvetica, sans-serif;
            font-weight: ' . $body_text_weight . ';
            font-style: ' . $body_text_style . ';
        }

        .btn-primary, .btn-secondary, button, input[type="button"], input[type="submit"] {
            font-family: "' . $body_text_font . '", Helvetica, sans-serif;
        }


        /* ============================================================================= 
        3. Logo
        ============================================================================= */
        .header-photo,
        .header-photo img {
            ' . $logo_img_height_not_empty . '
            ' . $logo_img_width_not_empty . '
        }


        ' . $logo_text_css . '

        ' . $disable_logo_border . '

        ' . $disable_logo_dots . '

        /* ============================================================================= 
        4. Backgrounds
        ============================================================================= */
        ' . $move_effect_css . '

        .animated-section > .section-content,
        .single-page-content,
        .single-page-content > .content-wrapper,
        .page-portfolio-loaded,
        .single-post .site-content .post-content {
            background-color: ' . $content_bg_color . ';
        }

        .btn-primary:hover,
        .btn-primary:focus,
        .elementor .btn-primary:hover,
        .elementor .btn-primary:focus,
        button:hover,
        button:focus,
        input[type="button"]:hover,
        input[type="button"]:focus,
        input[type="submit"]:hover,
        input[type="submit"]:focus,
        .elementor .skill-percentage,
        .elementor .service-icon,
        .lm-pricing .lm-package-wrap.highlight-col .lm-heading-row span:after,
        .portfolio-page-nav > div.nav-item a:hover,
        .elementor .testimonials.owl-carousel .owl-nav .owl-prev:hover,
        .elementor .testimonials.owl-carousel .owl-nav .owl-next:hover,
        .elementor .clients.owl-carousel .owl-nav .owl-prev:hover,
        .elementor .clients.owl-carousel .owl-nav .owl-next:hover,
        .elementor .fw-pricing .fw-package-wrap.highlight-col .fw-heading-row span:after,
        .cat-links li a,
        .cat-links li a:hover,
        .calendar_wrap td#today,
        .nothing-found p,
        .elementor .portfolio-grid figure .portfolio-preview-desc h5:after,
        .preloader-spinner,
        .elementor .info-list li .title:after,
        .elementor .clients.owl-carousel .owl-dot.active span,
        .elementor .clients.owl-carousel .owl-dot:hover span,
        .elementor .testimonials.owl-carousel .owl-dot.active span,
        .elementor .testimonials.owl-carousel .owl-dot:hover span,
        .logo-symbol,
        .elementor .fw-pricing .fw-package.highlight .fw-heading-row span:after,
        .ps:hover>.ps__scrollbar-y-rail:hover>.ps__scrollbar-y,
        .elementor .knowledges li,
        .elementor .timeline .divider:before {
            background-color: ' . $theme_main_color . ';
        }

        @media only screen and (min-width: 1025px) {
            ul.main-menu .link-text {
                background-color: ' . $theme_main_color . ';
            }
        }

        @media only screen and (max-width: 1024px) {
            .menu-toggle {
                background-color: ' . $theme_main_color . ';
            }
        }


        .blog-sidebar .sidebar-item {
            background-color: ' . $sidebar_bg_color . ';
        }

        .block-title:after, h3.comment-reply-title:after {
            background-image: -webkit-repeating-radial-gradient(center center, ' . $theme_main_color . ', ' . $theme_main_color . ' 1px, transparent 0px, transparent 100%);
            background-image: -moz-repeating-radial-gradient(center center, ' . $theme_main_color . ', ' . $theme_main_color . ' 1px, transparent 0px, transparent 100%);
            background-image: -ms-repeating-radial-gradient(center center, ' . $theme_main_color . ', ' . $theme_main_color . ' 1px, transparent 0px, transparent 100%);
        }




        /* ============================================================================= 
        5. Colors
        ============================================================================= */
        a,
        .form-group-with-icon.form-group-focus i,
        .site-title span,
        .header-search button:hover,
        .header-search button:focus,
        .block-title h3 span,
        .header-search button:hover,
        .header-search button:focus,
        .ajax-page-nav > div.nav-item a:hover,
        .project-general-info .fa,
        .comment-author a:hover,
        .comment-list .pingback a:hover,
        .comment-list .trackback a:hover,
        .comment-metadata a:hover,
        .comment-reply-title small a:hover,
        .entry-title a:hover,
        .entry-content .edit-link a:hover,
        .post-navigation a:hover,
        .image-navigation a:hover,
        .elementor .portfolio-grid figure i,
        .share-buttons a:hover,
        .elementor .info-block-w-icon i,
        .elementor .lm-info-block i,
        .lmpixels-arrows-nav div:hover,
        .block-title h2 span, h3.comment-reply-title span,
        ul.main-menu .current-menu-item a,
        .elementor .block-title h2 span,
        .elementor .fun-fact i,
        .elementor .testimonial .author-info .icon,
        .elementor .header-buttons .btn-primary:hover,
        .elementor .form-group:not(.form-group-checkbox) .form-control:focus ~ label,
        .elementor .form-group.form-group-focus:not(.form-group-checkbox) .form-control ~ label,
        .elementor .info-list li .title,
        .header-buttons .btn-primary:hover {
            color: ' . $theme_main_color . ';
        }

        a,
        .entry-meta:not(.entry-tags-share) a:hover {
            color: ' . $links_color . ';
        }

        a:hover,
        .post-navigation .meta-nav:hover {
            color: ' . $links_hover_color . ';
        }

        .wp-block-pullquote.is-style-solid-color {
            background-color: ' . $theme_main_color . ';
        }

        .wp-block-button:not(.is-style-outline) .wp-block-button__link:not(.has-background),
        .wp-block-button.is-style-outline .wp-block-button__link:active,
        .wp-block-button.is-style-outline .wp-block-button__link:focus,
        .wp-block-button.is-style-outline .wp-block-button__link:hover {
            background-color: ' . $theme_main_color . ';
        }

        @media only screen and (min-width: 1025px) {
            ul.main-menu a.active,
            ul.main-menu a:focus,
            ul.main-menu a:hover {
                color: ' . $theme_main_color . ';
            }
        }

        @media only screen and (max-width: 1024px) {
            .header {
                background-color: ' . $theme_main_color . ';
            }
        }




        /* ============================================================================= 
        6. Borders
        ============================================================================= */
        .logo-symbol,
        .btn-primary,
        .elementor .btn-primary,
        button,
        input[type="button"],
        input[type="submit"],
        .btn-primary:hover,
        .btn-primary:focus,
        button:hover,
        button:focus,
        input[type="button"]:hover,
        input[type="button"]:focus,
        input[type="submit"]:hover,
        input[type="submit"]:focus,
        .form-control + .form-control-border,
        .elementor .timeline-item,
        .elementor .timeline-item:before,
        .page-links a:hover,
        .paging-navigation .page-numbers.current,
        .paging-navigation .page-numbers:hover,
        .paging-navigation .page-numbers:focus,
        .portfolio-grid figure .portfolio-preview-desc h5:after,
        .paging-navigation a:hover,
        .skill-container,
        .btn-primary, button, input[type="button"], input[type="submit"],
        .blog-sidebar ul li:before,
        .elementor .share-buttons a:hover,
        .elementor .testimonials.owl-carousel .owl-nav .owl-prev:hover,
        .elementor .testimonials.owl-carousel .owl-nav .owl-next:hover,
        .elementor .clients.owl-carousel .owl-nav .owl-prev:hover,
        .elementor .clients.owl-carousel .owl-nav .owl-next:hover,
        .wp-block-pullquote,
        .wp-block-button .wp-block-button__link,
        .elementor .timeline-item h5.item-period,
        .form-control ~ .form-control-border,
        .elementor .form-control ~ .form-control-border,
        .elementor .timeline .divider:after {
            border-color: ' . $theme_main_color . ';
        }

        @media only screen and (max-width: 1024px) {
            .lmpixels-arrows-nav {
                border-color: ' . $theme_main_color . ';
            }
        }


        /* ============================================================================= 
        7. Page Titles and Page Content Area
        ============================================================================= */
        .page-title:after {
            background-image: -webkit-repeating-radial-gradient(center center, ' . $cp_general_bg_color . ', ' . $cp_general_bg_color . ' 1px, transparent 0px, transparent 100%);
            background-image: -moz-repeating-radial-gradient(center center, ' . $cp_general_bg_color . ', ' . $cp_general_bg_color . ' 1px, transparent 0px, transparent 100%);
            background-image: -ms-repeating-radial-gradient(center center, ' . $cp_general_bg_color . ', ' . $cp_general_bg_color . ' 1px, transparent 0px, transparent 100%);
        }

        .page-title h1 {
            color: ' . $cp_general_title_color . ';
            font-size: ' . $cp_general_title_size . 'px;
            font-family: ' . $cp_general_title_font . ', Helvetica, sans-serif;
            font-weight: ' . $cp_general_title_weight . ';
            font-style: ' . $cp_general_title_style . ';
            letter-spacing: ' . $cp_general_title_spacing . 'px;
        }

        @media only screen and (max-width: 1024px) {
            .page-title h1 {
                font-size: ' . $cp_general_title_size_small . 'px;
            }
        }

        .page-content {
            background: -webkit-gradient(linear, left top, left bottom, from('.$cp_general_bg_gradient_from.'), to('.$cp_general_bg_gradient_to.'));
            background: linear-gradient('.$cp_general_bg_gradient_from.', '.$cp_general_bg_gradient_to.');
        }

        ' .$full_width_styles. '

        /* ============================================================================= 
        8. Custom Styles
        ============================================================================= */
        ' .$custom_styles . '
    ';


    return apply_filters( 'breezycv_theme_customizations_dark', $customization_css ); 

}
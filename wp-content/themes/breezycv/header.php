<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */

$move_effect = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('move_effect') :  'no'; 
$theme_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('theme_style_picker') :  'light';
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="profile" href="//gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php 
if ($move_effect == "yes") { ?>
<div class="lm-animated-bg"></div>
    <?php
}
?>

<!-- Loading animation -->
<div class="preloader">
  <div class="preloader-animation">
    <div class="preloader-spinner">
    </div>
  </div>
</div>
<!-- /Loading animation -->

<div class="page-wrapper<?php if ( $move_effect == "yes" ) { ?> bg-move-effect<?php } ?>">
    <div class="page-content site-content">

        <header id="site_header" class="header mobile-menu-hide">
            <div class="header-content">
                <div class="header-photo">
                    <?php
                    $logo_img = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('photo') : '';
                    if( !empty( $logo_img ) ) :
                        $logo_img_alt = get_post_meta($logo_img['attachment_id'], '_wp_attachment_image_alt', true);
                        if (empty($logo_img_alt)) {
                            $logo_img_alt = esc_attr__('image', 'breezycv');
                        }
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo esc_url($logo_img['url']); ?>" alt="<?php echo esc_attr($logo_img_alt); ?>">
                    </a>
                    <?php endif ?>
                </div>

                <?php
                $header_title = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('logo') :  get_bloginfo( 'name' );
                $header_subtitle = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('subtitle') :  '';

                if( !empty( $header_title ) || !empty( $header_subtitle ) ) :
                ?>
                <div class="header-titles">
                    <?php if( !empty( $header_title ) ) : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <h2><?php echo wp_kses_post($header_title); ?></h2>
                        </a>
                    <?php endif; ?>
                    <?php if( !empty( $header_subtitle ) ) : ?>
                        <h4><?php echo wp_kses_post($header_subtitle); ?></h4>
                    <?php endif; ?>
                </div>
                <?php endif ?>
            </div>

            <?php
                if(has_nav_menu('classic-menu')){ 
                    if ( defined('FW') ) {
                        wp_nav_menu( [ 
                            'menu_class' => 'breezycv-classic-menu main-menu',
                            'theme_location' => 'classic-menu', 
                            'echo' => true, 
                            'container' => false, 
                            'depth' => 1
                        ] );
                    } else {
                        wp_nav_menu( [ 
                            'menu_class' => 'breezycv-classic-menu main-menu',
                            'theme_location' => 'classic-menu', 
                            'echo' => true, 
                            'container' => false, 
                            'depth' => 1,
                            'walker'=> new Breezycv_Onepage_Walker()
                        ] );
                    }
                }
            ?>

             <!-- Social Links -->
            <?php if ( function_exists('fw_get_db_settings_option') ): ?>
            <div class="social-links">
              <ul>
                <?php $breezycv_header_social = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('header_social') : '';
                if ( !empty($breezycv_header_social)) :
                  foreach ($breezycv_header_social as $breezycv_header_social):
                      if( !empty( $breezycv_header_social['link'] ) ) :
                  ?>
                    <li>
                        <a href="<?php echo esc_url($breezycv_header_social['link']); ?>" target="_blank">
                            <?php if (!empty($breezycv_header_social['icon']['url'])) { ?>
                                <img src="<?php echo esc_url($breezycv_header_social['icon']['url']); ?>" alt="<?php echo esc_attr($breezycv_header_social['title']); ?>">
                            <?php } ?>
                            <?php if (!empty($breezycv_header_social['icon']['icon-class'])) { ?>
                                <i class="<?php echo esc_attr($breezycv_header_social['icon']['icon-class']); ?>"></i>
                            <?php } ?>
                        </a>
                    </li>
                  <?php endif;
                  endforeach;
                endif;
                ?>
              </ul>
            </div>
            <?php endif; ?>
            <!-- /Social Links -->

            <!-- Buttons -->
            <?php if ( function_exists('fw_get_db_settings_option') ): ?>
                <?php $hp_buttons = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('header_buttons') : '';
                if ( !empty($hp_buttons)) : ?>
                    <div class="header-buttons">
                    <?php
                    foreach ($hp_buttons as $hp_buttons):
                        if( !empty( $hp_buttons['link'] ) ) :
                        $target = (!isset($hp_buttons['target'])) ? '_blank' : $hp_buttons['target'];
                    ?>
                            <a href="<?php echo esc_url($hp_buttons['link']); ?>" target="<?php echo esc_attr($target) ?>" class="btn btn-primary"><?php echo esc_attr($hp_buttons['title']); ?></a>
                    <?php endif;
                    endforeach;
                    ?>
                    </div>
                    <?php
                endif;
                ?>
            <?php endif; ?>
            <!-- /Buttons -->

            <!-- Copyrights -->
            <?php $copyrights = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('copyrights') : '';
            if( !empty( $copyrights ) ) :
            ?>
            <div class="copyrights"><?php echo wp_kses_post($copyrights) ?></div>
            <?php endif ?>
            <!-- /Copyrights -->
        </header>

        <div class="mobile-site-title mobile-visible">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php echo wp_kses_post($header_title); ?>
            </a>
        </div>

        <!-- Mobile Navigation -->
        <div class="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <!-- End Mobile Navigation -->

        <?php if ( defined('FW') && is_page_template('page-templates/template-breezycv-vcard.php') ) { ?>
        <!-- Arrows Nav -->
        <div class="lmpixels-arrows-nav">
            <div class="lmpixels-arrow-right"><i class="lnr lnr-chevron-right"></i></div>
            <div class="lmpixels-arrow-left"><i class="lnr lnr-chevron-left"></i></div>
        </div>
        <!-- End Arrows Nav -->
        <?php } ?>

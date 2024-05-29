<?php
/*
Plugin Name: Breezycv Share Buttons
Plugin URI: http://lmpixels.com
Description: Breezycv Theme Share Buttons
Author: LMPixels
Version: 1.0.0
*/

add_action( 'plugins_loaded', 'breezycv_sb_textdomain' );

function breezycv_sb_textdomain() {
    load_plugin_textdomain( 'breezycv-share-buttons', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}

if ( ! function_exists( 'breezycv_theme_share_buttons' ) ) :
    function breezycv_theme_share_buttons($permalink) {
        /**
         * Display share buttons
         * @param string $permalink
         */
        ?>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url($permalink); ?>"
            onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" class="btn"
            target="_blank" title="<?php esc_attr_e('Share on Facebook', 'breezycv-share-buttons'); ?>">
            <i class="fa fa-facebook"></i>
        </a>
        <a href="https://twitter.com/share?url=<?php echo esc_url($permalink); ?>"
            onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" class="btn"
            target="_blank" title="<?php esc_attr_e('Share on Twitter', 'breezycv-share-buttons'); ?>">
            <i class="fa fa-twitter"></i>
        </a>
        <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url($permalink); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="btn"
            title="<?php esc_attr_e('Share on LinkedIn', 'breezycv-share-buttons'); ?>">
            <i class="fa fa-linkedin"></i>
        </a>
        <a href="http://www.digg.com/submit?url=<?php echo esc_url($permalink); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="btn"
            title="<?php esc_attr_e('Share on Digg', 'breezycv-share-buttons'); ?>">
            <i class="fa fa-digg"></i>
        </a>
    <?php }
endif;

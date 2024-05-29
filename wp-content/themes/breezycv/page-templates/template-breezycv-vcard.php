<?php
/*
Template Name: Breezycv vCard Animated
*/
get_header(); ?>

<div class="content-area">
    <div class="animated-sections">
        <?php
        if ( has_nav_menu( 'classic-menu' ) ) {
            $menu_name = 'classic-menu';
            $locations = get_nav_menu_locations();
            $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
            $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
            foreach( $menuitems as $item ) {
                $title = $item->post_name;
                $url = $item->url;
                $slug = basename(parse_url($url, PHP_URL_PATH));

                if ( $item->object == 'page' ) {
            
                ?>
                <section data-id="<?php echo esc_attr($slug); ?>" class="animated-section">
                    <div class="section-content">
                    <?php
                        $args_custom_page = 'pagename=' . $slug;
                        $loop_custom_page = new WP_Query( $args_custom_page );
                        
                        if ( $loop_custom_page->have_posts() ) :
                            while ( $loop_custom_page->have_posts() ) : $loop_custom_page->the_post();
                                $cp_hide_title = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_post_option(get_the_ID(),'cp_hide_header') : 'no';
                                if($cp_hide_title == 'no') {
                                ?>
                                <div class="page-title">
                                    <?php
                                        // Page thumbnail and title.
                                        breezycv_theme_post_thumbnail();
                                        the_title( '<h1>', '</h1>' );
                                    ?>
                                </div>
                                <?php
                                }
                            
                                the_content();
                            
                            endwhile;
                        endif;
                        wp_reset_postdata();
                    ?>
                    </div>
                </section>
                <?php
                }
            }
        }
        ?>
    </div>
</div>

<?php get_footer(); ?>

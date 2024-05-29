<?php 
$show_blog_sidebar = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('blog_sidebar') :  'yes';
?>  
        </div>
        <?php if ( $show_blog_sidebar == 'yes'):
            get_sidebar( 'content' );
        endif; ?>
    </div>
	<?php
		wp_footer();
	?>
</body>
</html>
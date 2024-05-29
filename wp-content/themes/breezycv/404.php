<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); ?>

<div class="content-area single-page-area">
    <div class="single-page-content">
        <div class="content-wrapper vcentered">
        	<div class="nothing-found">
				<h1 class="nf-page-title"><?php esc_html_e( '404', 'breezycv' ); ?></h1>
				<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'breezycv' ); ?></p>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();

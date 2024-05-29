<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>
<div class="content-area single-page-area">
    <div class="single-page-content">
        <div class="content-wrapper">

			<?php if ( have_posts() ) : ?>
				<h2 class="page-title">
					<?php
						if ( is_day() ) :
							printf( esc_html__( 'Daily Archives: %s', 'breezycv' ), get_the_date() );

						elseif ( is_month() ) :
							printf( esc_html__( 'Monthly Archives: %s', 'breezycv' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'breezycv' ) ) );

						elseif ( is_year() ) :
							printf( esc_html__( 'Yearly Archives: %s', 'breezycv' ), get_the_date( _x( 'Y', 'yearly archives date format', 'breezycv' ) ) );

						else :
							_e( 'Archives', 'breezycv' );
						endif;
					?>
				</h2>
			<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );

					endwhile;
					// Previous/next page navigation.
					breezycv_theme_paging_nav();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>
		</div>
	</div>
</div>
<?php
get_footer();

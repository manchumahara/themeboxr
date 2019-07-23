<?php
	/**
	 * The template for displaying all single posts
	 *
	 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
	 *
	 * @package DownloadClub
	 */

	get_header();
?>
	<div class="entry-header-cover entry-header" id="banner-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="banner-content-wrap">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .entry-header -->
<?php
	downloadclub_page_wrapper_start();
	$main_col_x = is_active_sidebar( 'sidebar-1' ) ? 'col-md-8' : 'col-md-12';
?>
	<div class="container">
		<div id="primary" class="content-area row">
			<main id="main" class="site-main <?php echo esc_attr( $main_col_x ); ?>">

				<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );

						the_post_navigation();

						// If comments are open or we have at least one comment, load up the comment template.
						/*if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;*/

					endwhile; // End of the loop.
				?>

			</main><!-- #main -->
			<?php if ( is_active_sidebar( 'sidebar-1' ) ): ?>
				<div class="col-md-4">
					<?php get_sidebar(); ?>
				</div>
			<?php endif; ?>
		</div><!-- #primary -->
	</div>
<?php
	downloadclub_page_wrapper_end();
	get_footer();

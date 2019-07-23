<?php
	/**
	 * The template for displaying archive pages
	 *
	 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
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
						<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<h2 class="archive-description">', '</h2>' );
						?>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .entry-header -->

<?php
	downloadclub_page_wrapper_start();
	$main_col_x = is_active_sidebar( 'sidebar-1' ) ? 'col-md-8' : 'col-md-12';
?>
	<div class="section-padding">
		<div class="container">
			<div id="primary" class="content-area row">
				<main id="main" class="site-main <?php echo esc_attr( $main_col_x ); ?>">

					<?php if ( have_posts() ) : ?>

						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_type() );

						endwhile;

						the_posts_navigation();
						?>
						<?php if ( function_exists( 'downloadclub_page_navi' ) ) { // if expirimental feature is active ?>
							<div class="pagination_wrap">
								<?php downloadclub_page_navi(); // use the page navi function ?>
							</div>
						<?php } else { // if it is disabled, display regular wp prev & next links ?>
							<div class="pagination_wrap">
								<nav class="wp-prev-next">
									<ul class="pager">
										<li class="previous"><?php next_posts_link( _e( '&laquo; Older Entries', 'downloadclub' ) ) ?></li>
										<li class="next"><?php previous_posts_link( _e( 'Newer Entries &raquo;', 'downloadclub' ) ) ?></li>
									</ul>
								</nav>
							</div>

						<?php }

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>

				</main><!-- #main -->
				<?php if ( is_active_sidebar( 'sidebar-1' ) ): ?>
					<div class="col-md-4">
						<?php get_sidebar(); ?>
					</div>
				<?php endif; ?>
			</div><!-- #primary -->
		</div>
	</div>

<?php
	downloadclub_page_wrapper_end();
	get_footer();

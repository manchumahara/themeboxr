<?php
	/**
	 * The template for displaying 404 pages (not found)
	 *
	 * @link    https://codex.wordpress.org/Creating_an_Error_404_Page
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
							//the_archive_title( '<h1 class="page-title">', '</h1>' );
							//the_archive_description( '<h2 class="archive-description">', '</h2>' );
						?>
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'downloadclub' ); ?></h1>
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

					<section class="error-404 not-found">
						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'downloadclub' ); ?></p>

							<?php
								get_search_form();
							?>
						</div><!-- .page-content -->
					</section><!-- .error-404 -->

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

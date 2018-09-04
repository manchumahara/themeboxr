<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
						<h1 class="page-title"><?php esc_html_e('All Themes', 'downloadclub'); ?></h1>
						<h2 class="archive-description"><?php esc_html_e('Here will be some amazing text', 'downloadclub'); ?></h2>
						<?php //the_title( '<h1 class="entry-title">', '</h1>' );
						//the_archive_title( '<h1 class="page-title">', '</h1>' );
						//the_archive_description( '<h2 class="archive-description">', '</h2>' );
						?>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .entry-header -->
<?php
	downloadclub_page_wrapper_start();
	$main_col_x = is_active_sidebar( 'sidebar-1' ) ? 'col-md-8':'col-md-12';
?>
	<div class="container">
		<div id="primary" class="content-area row">
			<main id="main" class="site-main <?php echo esc_attr($main_col_x); ?>">
				<!-- Products Content Start -->
				<div class="products-content-wrap section-padding">
					<div class="container">
						<div id="productsContent" class="row">
							<?php if ( have_posts() ) :
								/* Start the Loop */
								while ( have_posts() ) :
									the_post();
									?>
									<!-- Single Product Start -->
									<div class="product-item scale-amn col-lg-4 col-md-6 all pop trend">
										<div class="single-product-wrap ">
											<figure class="product-thumb">
												<a href="#"><img
														src="<?php echo get_template_directory_uri(); ?>/assets/img/products/products-1.jpg"
														alt="Home" class="img-fluid"/></a>
											</figure>

											<div class="product-meta">
												<!--<h2 class="h6"><a href="#">Landingz – One Page App and Product</a></h2>-->
												<?php
													the_title( '<h2 class="h6"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
												?>

												<div class="product-sub-meta d-flex justify-content-between">
													<a href="#"><i class="fa fa-tags"></i> HTML</a>
													<span class="product-price">$19.00</span>
												</div>
											</div>
										</div>
									</div>
									<!-- Single Product End -->
									<?php


									//get_template_part( 'template-parts/content', get_post_type() );

								endwhile;

								the_posts_navigation();

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif;
							?>
						</div>
					</div>
				</div>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php if(is_active_sidebar( 'sidebar-1' )): ?>
			<div class="col-md-4">
				<?php get_sidebar();  ?>
			</div>
		<?php endif; ?>
	</div>
<?php
	downloadclub_page_wrapper_end();
get_footer();

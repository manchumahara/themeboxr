<?php
	/*
	Template Name: Homepage
	*/
?>
<?php
	get_header();
?>


	<section id="banner-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="banner-content-wrap">
						<h1>2700+ <span>Premium</span> Theme & Templete for Websites <br>
							That Perfectly Fit Your Business</h1>
						<a href="#" class="btn btn-brand"><?php esc_html_e( 'Buy a theme', 'downloadclub' ); ?></a>

						<!-- Feature Product Area Start -->
						<div class="featured-products-area">
							<div class="feature-slider-warp owl-carousel">
								<div class="single-feature-product">
									<a href="#" class="d-block">
										<img src="<?php echo esc_url( get_stylesheet_directory_uri() ) ?>/assets/img/feature-product/feature-product-1.jpg" alt="Feature Product" class="img-fluid" />
									</a>
								</div>
								<div class="single-feature-product">
									<a href="#" class="d-block">
										<img src="<?php echo esc_url( get_stylesheet_directory_uri() ) ?>/assets/img/feature-product/feature-product-2.jpg" alt="Feature Product" class="img-fluid" />
									</a>
								</div>
								<div class="single-feature-product">
									<a href="#" class="d-block">
										<img src="<?php echo esc_url( get_stylesheet_directory_uri() ) ?>/assets/img/feature-product/feature-product-3.jpg" alt="Feature Product" class="img-fluid" />
									</a>
								</div>
							</div>
						</div>
						<!-- Feature Product Area End -->
					</div>
				</div>
			</div>
		</div>
	</section>


<?php
	while ( have_posts() ) :
		the_post();
		//get_template_part( 'template-parts/content', 'page' );
	endwhile; // End of the loop.
?>


<?php
	get_footer();
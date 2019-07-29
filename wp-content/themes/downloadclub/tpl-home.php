<?php
	/*
	Template Name: Homepage
	*/

	get_header();
?>
<?php
	$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
?>
	<section id="banner-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="banner-content-wrap">
						<h1><span>Free</span> and Premium Themes & Templates for Websites
							<br> That Perfectly Fit Your Business</h1>
						<a href="<?php echo esc_url( $shop_page_url ); ?>" class="btn btn-brand"><?php esc_html_e( 'Buy a theme', 'downloadclub' ); ?></a>

						<!-- Feature Product Area Start -->
						<!--<div class="featured-products-area">
							<div class="feature-slider-warp owl-carousel">
								<div class="single-feature-product">
									<a href="#" class="d-block">
										<img src="<?php /*echo esc_url( get_stylesheet_directory_uri() ) */?>/assets/images/feature-product/feature-product-1.jpg"
											 alt="Feature Product" class="img-fluid" /> </a>
								</div>
								<div class="single-feature-product">
									<a href="#" class="d-block">
										<img src="<?php /*echo esc_url( get_stylesheet_directory_uri() ) */?>/assets/images/feature-product/feature-product-2.jpg"
											 alt="Feature Product" class="img-fluid" /> </a>
								</div>
								<div class="single-feature-product">
									<a href="#" class="d-block">
										<img src="<?php /*echo esc_url( get_stylesheet_directory_uri() ) */?>/assets/images/feature-product/feature-product-3.jpg"
											 alt="Feature Product" class="img-fluid" /> </a>
								</div>
							</div>
						</div>-->
						<!-- Feature Product Area End -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="clerafix"></div>

	<!--== Products Area Start ==-->
	<section id="products-area">
		<!-- Products Filter Menu Start -->
		<div class="products-filter-menu">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<nav class="filter-navbar">
							<ul class="d-flex">
								<li class="fil-cat current" data-rel="all">Featured</li>
								<li class="fil-cat" data-rel="wordpress-themes">WordPress</li>
								<li class="fil-cat" data-rel="html-themes">Html</li>
								<li class="fil-cat" data-rel="psd-themes">PSD</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- Products Filter Menu End -->

		<!-- Products Content Start -->
		<div class="products-content-wrap section-padding">
			<div class="container">
				<div id="productsContent" class="row">
					<?php
						$featured_products_arr = array(

						);

						$featured_products     = array();

						$paged     = 1;
						$lbarg     = array(
							'post_type'      => 'product',
							'post_status'    => 'publish',
							'paged'          => $paged,
							'posts_per_page' => 9,
							//'post__in'       => $featured_products_arr

						);

						$posts_array = get_posts( $lbarg );



						// The Loop
						if (sizeof($posts_array) == 0): ?>
							<div class="clearfix row">
								<div class="col-md-12">
									<p>Nothing found</p>
								</div>
							</div>
						<?php
						else:
							$i = 1;

							foreach ( $posts_array as $post ) : setup_postdata( $post );

								$id        = $post->ID;
								$blogtitle = get_the_title( $id );
								$bloglink  = get_permalink( $id );
								$content_url         = content_url();
								$featured_products[] = $id;
								$thumb_url            = '';

								if ( file_exists( WP_CONTENT_DIR . '/uploads/productshots/'.$id.'/' . $id . '-profile.png' ) ) {
									$thumb_url = $content_url . '/uploads/productshots/'.$id.'/' . $id . '-profile.png';

								}
								else if ( file_exists( WP_CONTENT_DIR . '/uploads/productshots/'.$id.'/' . $id . '-profile.jpg' ) ) {
									$thumb_url = $content_url . '/uploads/productshots/'.$id.'/' . $id . '-profile.jpg';
								}
								else if ( has_post_thumbnail() ) {
									$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'medium' );
									$thumb_url        = isset( $large_image_url[0] ) ? $large_image_url[0] : '';
								}

								if($thumb_url == ''){
									$thumb_url = get_template_directory_uri() . '/assets/images/default_thumb.png';

								}

								$_pf       = new WC_Product_Factory();
								$product   = $_pf->get_product( $id );
								$price_val = $product->get_price();
								$price     = ( $price_val ) ? $product->get_price() : 'Free';

								/*$fieldValues = get_post_meta( $id, '_cbxproductinfo', true );
								$demourl     = isset( $fieldValues['demourl'] ) ? esc_attr( $fieldValues['demourl'] ) : ''; //demo url

								$cbdemourl_html_link = ( $demourl != '' ) ? '<a target="_blank" href="' . $demourl . '" class="btn-cbxphover btn-codeboxr2">Demo</a>' : '';*/

								$terms = get_the_terms( $id, 'product_cat' );

								$links = array();
								$term_slug = '';
								if ( !is_wp_error( $terms )  && !empty($terms)) {
									foreach ( $terms as $term ) {
										$link = get_term_link( $term, 'product_cat' );
										if ( is_wp_error( $link ) ) {
											return '';
										}

										$term_slug .= ' '.$term->slug;

										$links[] = '<a href="' . esc_url( $link ) . '" rel="tag">' . $term->name . '</a>';
										break;
									}
								}

								$category_link =  '<span class="posted_in"><i class="fa fa-tags"></i>' . join( ',', $links ) . '</span>';


								?>
								<div class="product-item scale-amn col-lg-4 col-md-6 all <?php echo esc_attr($term_slug); ?>">
									<div class="single-product-wrap ">
										<figure class="product-thumb">
											<a href="<?php echo esc_url($bloglink); ?>"><img
													src="<?php echo esc_url($thumb_url); ?>"
													alt="Home" class="img-fluid" /></a>
										</figure>

										<div class="product-meta">
											<h2 class="h6"><a href="<?php echo esc_url($bloglink); ?>"><?php echo $blogtitle; ?></a></h2>

											<div class="product-sub-meta d-flex justify-content-between">
												<!--<a href="#"><i class="fa fa-tags"></i> HTML</a>-->
												<?php echo $category_link; ?>
												<span class="product-price">$<?php echo $price; ?></span>
											</div>
										</div>
									</div>
								</div>
								<?php
								$i ++;
							endforeach;
							wp_reset_postdata();
						endif;
					?>

				</div>

				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="product-loadmore-btn">
							<a href="<?php echo esc_url( $shop_page_url ); ?>" class="btn btn-brand btn-load"><?php esc_html_e( 'All Themes', 'downloadclub' ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Products Content End -->
	</section>
	<!--== Products Area End ==-->

<?php
	//include the template section "we are featured"
	//get_template_part( 'template-parts/sections/wearefeatured', '' );
?>
<?php
	while ( have_posts() ) :
		the_post();
		//get_template_part( 'template-parts/content', 'page' );
	endwhile; // End of the loop.
?>


<?php
	get_footer();
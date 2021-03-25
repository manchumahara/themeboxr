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
                <div class="col-lg-6">
                    <div class="banner-content-wrap">
                        <h1>Your Trusted Platform for WordPress <span class="color-blue">Themes</span> <span class="color-light">&</span>
                            <span class="color-green">Templates</span></h1>
                        <p>We create professional WordPress theme & templates that perfectly fit your
                            Business</p>
                        <a href="<?php echo esc_url( $shop_page_url ); ?>"
                           class="btn btn-brand" style="margin: 0px"><?php esc_html_e( 'Buy a theme', 'downloadclub' ); ?></a>
                        <div class="badge-wrap mt-50">
                            <span class="badge badge-wide badge-rounded">Trusted by over
                                <span class="color-indego digit">10,000</span> happy customers worldwide
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-banner__img grid--out">
                        <div class="shade-bg"> </div>
                        <img src="<?php echo home_url( 'wp-content/themes/downloadclub/assets/images/home/home-banner.svg' ); ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

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
					$featured_products_arr = array();

					$featured_products = array();

					$paged = 1;
					$lbarg = array(
						'post_type'      => 'product',
						'post_status'    => 'publish',
						'paged'          => $paged,
						'posts_per_page' => 9,
						//'post__in'       => $featured_products_arr

					);

					$posts_array = get_posts( $lbarg );


					// The Loop
					if ( sizeof( $posts_array ) == 0 ): ?>
                        <div class="clearfix row">
                            <div class="col-md-12">
                                <p>Nothing found</p>
                            </div>
                        </div>
					<?php
					else:
						$i = 1;

						foreach ( $posts_array as $post ) : setup_postdata( $post );

							$id                  = $post->ID;
							$blogtitle           = get_the_title( $id );
							$bloglink            = get_permalink( $id );
							$content_url         = content_url();
							$featured_products[] = $id;
							$thumb_url           = '';

							if ( file_exists( WP_CONTENT_DIR . '/uploads/productshots/' . $id . '/' . $id . '-profile.png' ) ) {
								$thumb_url = $content_url . '/uploads/productshots/' . $id . '/' . $id . '-profile.png';

							} else if ( file_exists( WP_CONTENT_DIR . '/uploads/productshots/' . $id . '/' . $id . '-profile.jpg' ) ) {
								$thumb_url = $content_url . '/uploads/productshots/' . $id . '/' . $id . '-profile.jpg';
							} else if ( has_post_thumbnail() ) {
								$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'medium' );
								$thumb_url       = isset( $large_image_url[0] ) ? $large_image_url[0] : '';
							}

							if ( $thumb_url == '' ) {
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

							$links     = array();
							$term_slug = '';
							if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) {
								foreach ( $terms as $term ) {
									$link = get_term_link( $term, 'product_cat' );
									if ( is_wp_error( $link ) ) {
										return '';
									}

									$term_slug .= ' ' . $term->slug;

									$links[] = '<a href="' . esc_url( $link ) . '" rel="tag">' . $term->name . '</a>';
									break;
								}
							}

							$category_link = '<span class="posted_in"><i class="fa fa-tags"></i>' . join( ',', $links ) . '</span>';


							?>
                            <div class="product-item scale-amn col-lg-4 col-md-6 all <?php echo esc_attr( $term_slug ); ?>">
                                <div class="single-product-wrap ">
                                    <figure class="product-thumb">
                                        <a href="<?php echo esc_url( $bloglink ); ?>"><img
                                                    src="<?php echo esc_url( $thumb_url ); ?>"
                                                    alt="Home" class="img-fluid"/></a>
                                    </figure>

                                    <div class="product-meta">
                                        <h2 class="h6"><a href="<?php echo esc_url( $bloglink ); ?>"><?php echo $blogtitle; ?></a></h2>

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
                            <a href="<?php echo esc_url( $shop_page_url ); ?>"
                               class="btn btn-brand btn-load"><?php esc_html_e( 'All Themes', 'downloadclub' ); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Products Content End -->
    </section>
    <!--== Products Area End ==-->
    <section>
        <div id="testimonial" class="home-sections">
            <div class="cbxinner cbxinnerwhite">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="cbxsectitle">
                                <span class="cbxsecicon"></span> <span class="cbxsec_headblock">
									<strong class="cbxsec_subhead">Reviews by Customers & Clients</strong>
									<strong class="cbxsec_head">Testimonials</strong>
								</span>
                            </h2>
                        </div>
                    </div>
                    <div id="archive-testimonial">
                        <div class="row">
							<?php
							$count_posts = wp_count_posts( 'testimonial' );
							if ( $count_posts ) {
								$count_posts = intval( $count_posts->publish );
							}

							$lbarg = array(
								'post_type'      => 'testimonial',
								'post_status'    => 'publish',
								'paged'          => 1,
								'posts_per_page' => 6,
								//'meta_key'       => '_cbxtestimonial_featured',
								//'orderby'        => 'meta_value_num',
								//'orderby'        => 'random',
								'order'          => 'random',
								/*'tax_query'      => array(
									array(
										'taxonomy' => 'testimonial_type',
										'field'    => 'id',
										'terms'    => '955' //service
									)
								),*/

							);


							$posts_array = wp_cache_get( 'codeboxr_home_testimonials' );
							if ( false === $posts_array ) {
								$posts_array = get_posts( $lbarg );
								wp_cache_set( 'codeboxr_home_testimonials', maybe_serialize( $posts_array ) );
							} else {
								$posts_array = maybe_unserialize( $posts_array );
							}

							if ( sizeof( $posts_array ) == 0 ): ?>

                                <div class="col-md-12">
                                    <p class="center">
                                        Sorry currently there is no products here </p>
                                </div>

							<?php
							else:
								$i = 1;
								foreach ( $posts_array as $post ) : setup_postdata( $post );
									$post_id    = $post->ID;
									$post_title = get_the_title( $post_id );
									$post_link  = get_permalink( $post_id );

									$content_url = content_url();
									$content     = get_the_content( $post_id );


									//$custom = get_post_custom($post_id);
									$fieldValues = get_post_meta( $post_id, '_cbxtestimonial', true );
									$name        = isset( $fieldValues['name'] ) ? esc_attr( $fieldValues['name'] ) : ''; //customer name
									$designation = isset( $fieldValues['designation'] ) ? esc_attr( $fieldValues['designation'] ) : ''; //custom designation

									$photo    = isset( $fieldValues['photo'] ) ? esc_attr( $fieldValues['photo'] ) : ''; //custom photo
									$referene = isset( $fieldValues['referene'] ) ? esc_attr( $fieldValues['referene'] ) : ''; //where the testimonial was given

									//for customer and service type testimonial
									$website   = isset( $fieldValues['website'] ) ? esc_attr( $fieldValues['website'] ) : ''; //customer website
									$brandname = isset( $fieldValues['brandname'] ) ? esc_attr( $fieldValues['brandname'] ) : ''; //brand name


									$featured = intval( get_post_meta( $post->ID, '_cbxtestimonial_featured', true ) );
									$product  = intval( get_post_meta( $post->ID, '_cbxtestimonial_product', true ) );
									//write_log($product);

									//old compatibility
									if ( isset( $fieldValues['featured'] ) ) {
										$featured = isset( $fieldValues['featured'] ) ? intval( $fieldValues['featured'] ) : 0;
									}


									if ( isset( $fieldValues['product'] ) ) {
										$product = isset( $fieldValues['product'] ) ? intval( $fieldValues['product'] ) : 0;
										//write_log($product);
									}
									//end old compatibility


									if ( $website == '' ) {
										$website = '#';
									}
									if ( $referene == '' ) {
										$referene = '#';
									}


									$via      = '';
									$tsources = get_the_terms( $post_id, 'testimonial_source' );
									if ( $tsources ) {
										foreach ( $tsources as $tsource ) {
											$via = $tsource->name;
										}
									}

									$product_link = ( $product > 0 ) ? get_permalink( $product ) : '#';


									?>
                                    <div class="col-12 col-sm-6 col-md-4 testimonial-box-col">
                                        <div class="testimonial-box">
                                            <h2 class="h1"><a
                                                        href="<?php echo $product_link; ?>"><?php the_title(); ?></a>
                                            </h2>

                                            <!--<blockquote>
												<?php /* the_content(); */ ?>
											</blockquote>-->
											<?php if ( $name != '' ): ?>
                                                <p class="testimonial-box-name h3">By <?php echo $name; ?></p>
											<?php endif; ?>
                                            <p class="testimonial-box-ref">via <cite title="<?php echo $via; ?>"><a
                                                            href="<?php echo $referene; ?>"
                                                            target="_blank"><?php echo $via; ?></a></cite></p>
                                        </div>
                                    </div>
									<?php
									$i ++;
								endforeach;
								wp_reset_postdata();

							endif;
							?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="cbx-loadmore text-center">
                                <a href="<?php echo esc_url( home_url( '/testimonial' ) ); ?>"
                                   class="btn btn-cbx"><?php echo esc_html__( 'View All Reviews', 'themeboxr' )/*echo sprintf( esc_html__( 'View All %d Reviews', 'themeboxr' ), $count_posts ); */?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
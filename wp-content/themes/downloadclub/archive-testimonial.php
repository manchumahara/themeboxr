<?php get_header(); ?>
	<!--<section>
		<div id="innerpagebanner-testimonial" class="innerpagebanner">
			<div class="cbxinner">
				<div class="container">
					<div class="clearfix row">
						<div class="page-header">
							<h1 class="page-title" itemprop="headline">Customer Reviews</h1>
							<p class="page-subtitle">Reviews from real customers</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>-->
    <section style="padding-top: 100px;">
        <div class="section">
            <div class="cbxinner">
                <div class="container">
                    <div class="row cbxsectitle">
                        <div class="col-md-12">
                            <h1 class="testi-heading">
                                <span class="cbxsec_headblock">
					<strong class="cbxsec_head">Customer Reviews</strong>
				</span>
                            </h1>
                            <p class="text-center page-subtitle">Reviews from real customers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<div class="testimonial-container-wrap">
		<div class="container">
			<div id="content" class="clearfix row">
				<?php
					//$main_wrapper_class = is_active_sidebar( 'blog-widget-area' ) ? 'col-sm-9' : 'col-sm-12 clearfix';
					$main_wrapper_class = 'col-sm-12 clearfix';
				?>

				<div id="main" class="<?php echo esc_attr( $main_wrapper_class ); ?>" role="main">
					<div id="archive-testimonial">
						<div class="row">
							<?php
								$i = 0;
								if ( have_posts() ) : while ( have_posts() ) : the_post();

									$post_id        = $post->ID;
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

									$product_link = ($product > 0)? get_permalink($product) : '#';


									?>
									<div class="col-12 col-sm-6 col-sm-4 testimonial-box-col">
										<div class="testimonial-box">
											<h2 class="h1"><a href="<?php echo $product_link; ?>"><?php the_title(); ?></a></h2>

											<blockquote>
												<?php  the_content(); ?>
											</blockquote>
											<?php if($name != ''): ?>
												<p class="testimonial-box-name h3">By <?php echo $name; ?></p>
											<?php endif; ?>
											<p class="testimonial-box-ref">via <cite title="<?php echo $via; ?>"><a
														href="<?php echo $referene; ?>"
														target="_blank"><?php echo $via; ?></a></cite></p>
										</div>
									</div>


								<?php endwhile; ?>

									<?php if ( function_exists( 'themeboxr_page_navi_4' ) ) { // if expirimental feature is active ?>
										<div class="col-12 text-center">
											<?php themeboxr_page_navi_4(); // use the page navi function ?>
										</div>

									<?php } else { // if it is disabled, display regular wp prev & next links ?>
										<div class="col-12 text-center">
											<nav class="wp-prev-next">
												<ul class="pager">
													<li class="previous"><?php next_posts_link( _e( '&laquo; Older Entries', 'themeboxr' ) ) ?></li>
													<li class="next"><?php previous_posts_link( _e( 'Newer Entries &raquo;', 'themeboxr' ) ) ?></li>
												</ul>
											</nav>
										</div>
									<?php } ?>


								<?php else : ?>

									<article id="post-not-found">
										<header>
											<h1><?php _e( "No Posts Yet", 'themeboxr' ); ?></h1>
										</header>
										<section class="post_content">
											<p><?php _e( "Sorry, What you were looking for is not here.", 'themeboxr' ); ?></p>
										</section>
										<footer></footer>
									</article>

								<?php endif; ?>
						</div>
					</div>
				</div> <!-- end #main -->
				<?php //get_sidebar( 'blog' ); // sidebar 1 ?>
			</div> <!-- end #content -->
		</div>
	</div>
<?php get_footer(); ?>
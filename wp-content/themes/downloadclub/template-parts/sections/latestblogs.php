<!--== Latest Blog Area Start ==-->
<section id="latest-blog-area" class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="section-title-wrap">
					<h2>Latest Blog</h2>
					<p>Latest updates and stories</p>
				</div>
			</div>
		</div>

		<div class="latest-blog-container">
			<div class="row">
				<?php
					$paged = 1;
					$lbarg = array(
						'post_type'      => array( 'post' ),
						'post_status'    => 'publish',
						'paged'          => $paged,
						'posts_per_page' => 3
					);

					$posts_array = wp_cache_get( 'themeboxr_home_blogs' );
					if ( false === $posts_array ) {
						$posts_array = get_posts( $lbarg );
						wp_cache_set( 'themeboxr_home_blogs', maybe_serialize( $posts_array ) );
					} else {
						$posts_array = maybe_unserialize( $posts_array );
					}
					if ( sizeof( $posts_array ) == 0 ): ?>
						<div class="row clearfix">
							<div class="col-md-12">
								<div class="whatwecookbox">Sorry currently there is no blogs post here, but you can explore our
									<a class="btn btn-large  btn-warning"
									   href="https://www.facebook.com/codeboxr">Facebook Page</a>
								</div>
							</div>
						</div>
					<?php
					else:
						$i = 1;
						foreach ( $posts_array as $post ) : setup_postdata( $post );

							$post_id    = $post->ID;
							$post_title = get_the_title( $post_id );
							$post_link  = get_permalink( $post_id );


							$content_url  = content_url();
							//$content_text = downloadclub_ellipsis( remove_shortcode( get_the_content() ) );
							$author       = get_the_author();
							$time         = get_the_time( 'jS M Y' );
							//write_log( $content_text );


							$thumburl = '';

							if ( file_exists( WP_CONTENT_DIR . '/uploads/productshots/' . $post_id . '-profile.png' ) ) {
								$thumburl = $content_url . '/uploads/productshots/' . $post_id . '-profile.png';

							} else if ( has_post_thumbnail() ) {

								$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'medium' );
								$thumburl        = isset( $large_image_url[0] ) ? $large_image_url[0] : '';

							}

							if($thumburl == '') {
								//$thumburl = $content_url . '/uploads/productshots/profile.png';
								$thumburl = get_template_directory_uri() . '/assets/images/blog/blog-1.jpg';
							}

							?>
							<div class="col-lg-4 col-md-6">
								<article class="single-blog-item">
									<header class="blog-header">
										<figure class="blog-thumb">
											<a href="<?php echo esc_url( $post_link ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/blog-1.jpg" alt="Themeboxr" /></a>
										</figure>

										<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" class="post-author"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/author.jpg" alt="Themeboxr" /></a>
									</header>

									<section class="blog-content">
										<h2 class="h6">
											<a href="<?php echo esc_url( $post_link ); ?>"><?php echo esc_html( $post_title ); ?></a>
										</h2>
										<a href="<?php echo esc_url( $post_link ); ?>" class="post-date"><?php echo $time; ?></a>

										<?php //echo $content_text; ?>
									</section>

									<!--<footer class="blog-footer">
										<a href="<?php /*echo esc_url( $post_link ); */?>" class="btn-readmore">More</a>

										<div class="blog-meta">
											<a href="#"><i class="fa fa-comments"></i> 25</a>
											<a href="#"><i class="fa fa-heart"></i> 125</a>
										</div>
									</footer>-->
								</article>
							</div>
						<?php
						endforeach;
						wp_reset_postdata();
					endif;
				?>

			</div>
		</div>
	</div>
</section>
<!--== Latest Blog Area End ==-->
<?php
	/**
	 * The template for displaying search results pages
	 *
	 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
						<?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<h1 class="entry-title">
							<?php
								/* translators: %s: search query. */
								printf( esc_html__( 'Search Results for: %s', 'downloadclub' ), '<span>' . get_search_query() . '</span>' );
							?>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .entry-header -->
<?php
	downloadclub_page_wrapper_start();
?>
                    <section id="latest-blog-area" class="section-padding">
                        <div class="container">
                            <div class="latest-blog-container">
                                <div class="row">
                                    <?php
                                    $paged = 1;
                                    $lbarg = array(
                                        'post_type'      => array( 'post','product' ),
                                        'post_status'    => 'publish',
                                        'paged'          => $paged,
                                        'posts_per_page' => 10
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

                                            $post_id    = $id = $post->ID;
                                            $post_title = get_the_title( $post_id );
                                            $post_link  = get_permalink( $post_id );


                                            $content_url  = content_url();
                                            //$content_text = downloadclub_ellipsis( remove_shortcode( get_the_content() ) );
                                            $author       = get_the_author();
                                            $time         = get_the_time( 'jS M Y' );
                                            //write_log( $content_text );


                                            $thumburl = '';

                                            if ( file_exists( WP_CONTENT_DIR . '/uploads/productshots/'.$id.'/' . $id . '-profile.png' ) ) {
                                                $thumburl = $content_url . '/uploads/productshots/'.$id.'/' . $id . '-profile.png';
                                            }
                                            else if ( file_exists( WP_CONTENT_DIR . '/uploads/productshots/'.$id.'/' . $id . '-profile.jpg' ) ) {
                                                $thumburl = $content_url . '/uploads/productshots/'.$id.'/' . $id . '-profile.jpg';
                                            }
                                            else if ( has_post_thumbnail() ) {

                                                $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'medium' );
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
                                                            <a href="<?php echo esc_url( $post_link ); ?>"><img src="<?php echo $thumburl; ?>" alt="Themeboxr" /></a>
                                                        </figure>
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
                            ?>
                        </div>
                    </section>


<?php
	downloadclub_page_wrapper_end();
	get_footer();
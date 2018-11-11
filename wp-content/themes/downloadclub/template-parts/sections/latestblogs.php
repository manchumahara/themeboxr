<?php
/**
 * Partial template part for displaying section  "latest blogs"
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DownloadClub
 */

?>
<!--== Latest Blog Area Start ==-->
<section id="latest-blog-area" class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="section-title-wrap">
					<h2><?php esc_html_e('Latest News & Tips', 'downloadclub'); ?></h2>
					<p><?php esc_html_e('Our developers, designers and marketing guys write regularly.', ''); ?></p>
				</div>
			</div>
		</div>

		<div class="latest-blog-container">
			<div class="row">
				<?php
				global $post;
				$args = array( 'posts_per_page' => 3, 'post_status' => 'publish', 'post_type' => 'post' );

				$latest_blog_posts = get_posts( $args );
				foreach ( $latest_blog_posts as $post ) : setup_postdata( $post );

					$post_id = get_the_ID();
					$post_title = get_the_title($post_id);
					$post_link = get_permalink($post);
					$post_author_id = get_the_author_meta( 'ID' );
					?>

					<div class="col-lg-4 col-md-6">
						<article class="single-blog-item">
							<header class="blog-header">
								<figure class="blog-thumb">
									<a href="<?php echo esc_url($post_link); ?>"><img
											src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/blog-1.jpg"
											alt="Themeboxr"/></a>
								</figure>

								<a href="<?php echo esc_url(get_author_posts_url($post_author_id)); ?>" class="post-author">
									<img
										src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/author.jpg"
										alt="Themeboxr"/></a>
							</header>

							<section class="blog-content">
								<h2 class="h6"><a href="<?php echo esc_url($post_link); ?>">Best Wordpress Theme in This Year</a></h2>
								<a href="<?php echo esc_url($post_link); ?>" class="post-date">2 july 2015</a>
							</section>

							<footer class="blog-footer">
								<a href="#" class="btn-readmore">Category</a>

								<div class="blog-meta">
									<!--<a href="#"><i class="fa fa-comments"></i> 25</a>-->
									<a class="blog-meta-item blog-meta-bookmark" href="#"><i class="la la-heart-o"></i> 125</a>
								</div>
							</footer>
						</article>
					</div>
				<?php endforeach;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</div>
</section>
<!--== Latest Blog Area End ==-->

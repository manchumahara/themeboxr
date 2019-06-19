<?php
	/**
	 * The template for displaying the footer
	 *
	 * Contains the closing of the #content div and all content after.
	 *
	 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package DownloadClub
	 */

?>
<?php
	if ( is_home() || is_front_page() ) {
		get_template_part( 'template-parts/sections/latestblogs', '' );
	}
?>
<?php
	get_template_part( 'template-parts/sections/wearethebest', '' );
?>
<?php
	get_template_part( 'template-parts/sections/newsletter', '' );
?>
<?php

	$shop_page_url      = get_permalink( wc_get_page_id( 'shop' ) );
	$cart_url           = get_permalink( wc_get_page_id( 'cart' ) );
	$myaccount_page_url = get_permalink( wc_get_page_id( 'myaccount' ) );
	$checkout_url       = get_permalink( wc_get_page_id( 'checkout' ) );
?>
<footer id="footer-area" class="site-footer">
	<div class="footer-widgets-area section-padding">
		<div class="container">
			<div class="row">
				<!-- About Footer Widget Start -->
				<div class="col-lg-4">
					<div class="single-footer-widgets">
						<div class="widgets-body about-widgets">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="d-block footer-logo">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-black.png" alt="Themeboxr Logo" title="Themeboxr Logo" class="img-fluid" />
							</a>
							<p>Themeboxr creates useful themes as PSD, Html and WordPress. Themeboxr is
								<a href="https://codeboxr.com/" target="_blank">Codeboxr</a>'s initiative. Follow us on social media to keep connected for updates.
							</p>
							<div class="social-icons">
								<a href="https://twitter.com/themeboxr" target="_blank" rel="external"><i class="fa fa-twitter"></i></a>
								<a href="https://facebook.com/codeboxr" target="_blank"><i class="fa fa-facebook"></i></a>
								<a href="https://dribbble.com/codeboxr" target="_blank"><i class="fa fa-dribbble"></i></a>
								<a href="https://www.linkedin.com/company/2282648/" target="_blank"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
					</div>
				</div>
				<!-- About Footer widgets End -->

				<div class="col-lg-5 ml-auto">
					<div class="row">
						<!-- Single Footer widgets Start -->
						<div class="col-lg-6  col-sm-4 mt-5 mt-lg-0">
							<div class="single-footer-widgets">
								<h2 class="widget-title">Free & Pro Themes</h2>
								<div class="widgets-body">
									<ul class="unorderlist">
										<li><a href="<?php echo esc_url( $shop_page_url ); ?>">All Themes</a></li>
										<li>
											<a href="<?php echo home_url( '/product-category/themes/wordpress-themes/' ); ?>">WordPress Themes</a>
										</li>
										<li>
											<a href="<?php echo home_url( '/product-category/themes/html-themes/' ); ?>">Html Themes</a>
										</li>
										<li>
											<a href="<?php echo home_url( '/product-category/themes/joomla-templates/' ); ?>">Joomla Templates</a>
										</li>
										<li>
											<a href="<?php echo home_url( '/product-category/themes/psd-themes/' ); ?>">PSD Themes</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- Single Footer widgets End -->

						<!-- Single Footer widgets Start -->
						<div class="col-lg-6  col-sm-4 mt-5 mt-lg-0">
							<div class="single-footer-widgets float-left float-lg-right">
								<h2 class="widget-title">Important Links</h2>
								<div class="widgets-body">
									<ul class="unorderlist">
										<li><a href="<?php echo home_url( '/about-us/' ); ?>">About US</a></li>
										<li><a href="<?php echo home_url( '/privacy/' ); ?>">Privacy</a></li>
										<li><a href="<?php echo home_url( '/tos/' ); ?>">Terms & Condition</a></li>
										<li><a href="<?php echo home_url( '/refund-policy/' ); ?>">Refund Policy</a>
										</li>
										<li><a href="<?php echo home_url( '/contact-us/' ); ?>">Contact US</a></li>
									</ul>
								</div>
							</div>
						</div>
						<!-- Single Footer widgets End -->
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="footer-bottom-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 d-none d-lg-block">
					<!--<nav class="footer-menu">
							<ul>
								<li><a href="<?php /*echo esc_url(get_home_url()); */ ?>">Home</a></li>
								<li><a href="https://themeboxr.com/privacy/">Privacy</a></li>
								<li><a href="https://themeboxr.com/tos/">Terms</a></li>
								<li><a href="https://themeboxr.com/contact-us/">Contact</a></li>
								<li><a href="<?php /*echo esc_url($shop_page_url); */ ?>">Themes</a></li>
							</ul>
						</nav>-->
					<p>it's not must to win the prize.</p>
				</div>
				<div class="col-lg-4 m-auto text-center text-lg-right">
					<div class="copyright-area">
						<p><?php esc_html_e( 'All rights reserved', 'downloadclub' ); ?>
							<a href="index.html">&copy; THEMEBOXR <?php echo date( 'Y' ); ?></a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>
</html>

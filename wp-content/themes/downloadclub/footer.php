<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DownloadClub
 */

?>
<?php
	if(is_home() || is_front_page()){
		get_template_part( 'template-parts/sections/latestblogs', '' );
	}
?>
<?php
	get_template_part( 'template-parts/sections/wearethebest', '' );
?>
<?php
	get_template_part( 'template-parts/sections/newsletter', '' );
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
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-black.png" alt="Themeboxr Logo" class="img-fluid" />
								</a>
								<p>Text of the printing and typesetting industry. Lorem Ipsum has been the indus try's standard dummy text ever  when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
								<div class="social-icons">
									<a href="https://twitter.com/themeboxr" target="_blank" rel="external"><i class="fa fa-twitter"></i></a>
									<a href="https://facebook.com/codeboxr" target="_blank"><i class="fa fa-facebook"></i></a>
								</div>
							</div>
						</div>
					</div>
					<!-- About Footer widgets End -->

					<div class="col-lg-5 ml-auto">
						<div class="row">
							<!-- Single Footer widgets Start -->
							<div class="col-lg-5  col-sm-4 mt-5 mt-lg-0">
								<div class="single-footer-widgets">
									<h2 class="widget-title">services</h2>
									<div class="widgets-body">
										<ul class="unorderlist">
											<li><a href="#">Web Design</a></li>
											<li><a href="#">development</a></li>
											<li><a href="#">graphic Design</a></li>
											<li><a href="#">illustration</a></li>
											<li><a href="#">branding</a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- Single Footer widgets End -->

							<!-- Single Footer widgets Start -->
							<div class="col-lg-3  col-sm-4 mt-5 mt-lg-0">
								<div class="single-footer-widgets">
									<h2 class="widget-title">compnay</h2>
									<div class="widgets-body">
										<ul class="unorderlist">
											<li><a href="#">About Us</a></li>
											<li><a href="#">Knowledgae</a></li>
											<li><a href="#">Terms</a></li>
											<li><a href="#">Terms</a></li>
											<li><a href="#">Contact Us</a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- Single Footer widgets End -->

							<!-- Single Footer widgets Start -->
							<div class="col-lg-4  col-sm-4 mt-5 mt-lg-0">
								<div class="single-footer-widgets float-left float-lg-right">
									<h2 class="widget-title">links</h2>
									<div class="widgets-body">
										<ul class="unorderlist">
											<li><a href="#">compnay</a></li>
											<li><a href="#">servces</a></li>
											<li><a href="#">products</a></li>
											<li><a href="#">blog</a></li>
											<li><a href="#">portfolio</a></li>
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

		<?php

			$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
			$cart_url = get_permalink(wc_get_page_id( 'cart' ));
			$myaccount_page_url = get_permalink( wc_get_page_id( 'myaccount' ) );
			$checkout_url = get_permalink(wc_get_page_id( 'checkout' ));
		?>

		<div class="footer-bottom-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 d-none d-lg-block">
						<nav class="footer-menu">
							<ul>
								<li><a href="<?php echo esc_url(get_home_url()); ?>">Home</a></li>
								<li><a href="https://themeboxr.com/privacy/">Privacy</a></li>
								<li><a href="https://themeboxr.com/tos/">Terms</a></li>
								<li><a href="https://themeboxr.com/contact-us/">Contact</a></li>
								<li><a href="<?php echo esc_url($shop_page_url); ?>">Themes</a></li>
							</ul>
						</nav>
					</div>
					<div class="col-lg-4 m-auto text-center text-lg-right">
						<div class="copyright-area">
							<p><?php esc_html_e('All rights reserved', 'downloadclub'); ?> <a href="index.html">&copy; THEMEBOXR <?php echo date('Y'); ?></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>
</html>

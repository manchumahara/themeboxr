<?php
	/**
	 * Partial template part for displaying section  "we are the best"
	 *
	 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package DownloadClub
	 */

?>
<!--== We Are Best Area Start ==-->
<section id="we-are-best-area" class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="section-title-wrap">
					<h2><?php esc_html_e( 'Why Themeboxr', 'downloadclub' ); ?></h2>
					<p><?php esc_html_e( 'Themes for developer, designer and general users', 'downloadclub' ); ?></p>
				</div>
			</div>
		</div>
		<div class="we-best-content-wrap">
			<div class="row">
				<div class="col-md-4 text-center">
					<div class="single-we-best-item">
						<figure class="feature-logo">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/we-best/satisfication.png" alt="Themeboxr" />
						</figure>

						<h3 class="h4">30 Days Money Back</h3>
						<p>We provide 30 days money back guarantee</p>
					</div>
				</div>

				<div class="col-md-4 text-center">
					<div class="single-we-best-item">
						<figure class="feature-logo">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/we-best/support.png" alt="Themeboxr" />
						</figure>

						<h3 class="h4">Faster Support</h3>
						<p>Support given by the real developer</p>
					</div>
				</div>

				<div class="col-md-4 text-center">
					<div class="single-we-best-item">
						<figure class="feature-logo">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/we-best/square.png" alt="Themeboxr" />
						</figure>

						<h3 class="h4">Secured Transaction</h3>
						<p>We don't process money, actual payment processing is done in the payment gateway site end.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--== We Are Best Area End ==-->

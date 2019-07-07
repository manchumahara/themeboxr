<?php
	/**
	 * Partial template part for displaying section  "news letter"
	 *
	 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package DownloadClub
	 */

?>
<!--== Newsletter Area Start ==-->
<section id="newsletter-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="section-title-wrap">
					<h2>Newsletter Subscription</h2>
					<p>SPAM Free Newsletter!</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12 m-auto">
				<div class="newsletter-form">
					<form class="form-inline" action="#" id="newslettersubs" method="post">
						<label class="sr-only" for="name">Name</label>
						<input type="name" id="name" class="form-control" name="name" placeholder="<?php esc_html_e( 'Name', 'downloadclub' ); ?>" required />
						<label class="sr-only" for="email">Email</label>
						<input type="email" id="email" class="form-control " name="email" placeholder="<?php esc_html_e( 'Email', 'downloadclub' ); ?>" required />
						<button class="btn submit-btn"><?php esc_html_e( 'Send', 'downloadclub' ); ?></button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!--== Newsletter Area End ==-->

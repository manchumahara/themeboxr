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
			<div class="col-lg-9 m-auto">
				<div class="row">
					<div class="col-lg-5 col-md-6 m-auto text-center text-md-left">
						<h2 class="h4"><?php esc_html_e( 'SPAM Free Newsletter', 'downloadclub' ); ?></h2>
					</div>

					<div class="col-lg-7 col-md-6 mt-5 mt-md-0">
						<div class="newsletter-form">
							<form action="#" id="newslettersubs" method="post">
								<input type="name" name="name" placeholder="<?php esc_html_e( 'Name', 'downloadclub' ); ?>" required />
								<input type="email" name="email" placeholder="<?php esc_html_e( 'Email', 'downloadclub' ); ?>" required />
								<button class="btn submit-btn"><?php esc_html_e( 'Send', 'downloadclub' ); ?></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--== Newsletter Area End ==-->

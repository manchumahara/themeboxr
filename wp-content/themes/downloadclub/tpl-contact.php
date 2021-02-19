<?php
/*
Template Name: Contact Page
*/
?>

<?php get_header(); ?>
	<section>
		<div id="contact" class="home-sections contact-form-bg">
			<div class="cbxinner cbxinner-contact">
				<div class="container">
					<div class="row cbxsectitle">
						<div class="col-md-12">
							<h1 class="about-heading">
                                <span class="cbxsec_headblock">
					              <strong class="cbxsec_head">Contuct Us</strong>
				                </span>
							</h1>
							<p class="text-center page-subtitle">Please don’t say something isn’t working. Explain what you tried and what happened as
								a result</p>
						</div>
					</div>
                    <div class="col-md-12">
                        <div class="post_content-wrap-post whiteshadowcard-gapfix">
                            <div class="whiteshadowcard ">
                                <div class="">
                                    <h3>Live Office Hours</h3>
                                    <p style="font-size: 18px;">We're pretty quick to respond to any customer query during our office hours.Please
                                        note that our timezone is GMT+6 ( i.e. 11 hours ahead from US EST time).</p>
                                    <p class="alert alert-info" role="alert" style="font-size: 18px;"><i class="far fa-clock"></i> Office Hours -
                                        From Monday to Friday.</p>

                                    <div id="office-our">
                                        <div class="row">
                                            <div class="col-md-4 col-12 why-chose-block-wrap">
                                                <div class="block">
                                                    <p>
                                                        <strong>10 am to 7 pm BST</strong>
                                                        Codeboxr HQ Bangladesh
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12 why-chose-block-wrap">
                                                <div class="block">
                                                    <p>
                                                        <strong>5 am to 2 pm GMT</strong>
                                                        Greenwich Mean Time UK
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12 why-chose-block-wrap">
                                                <div class="block">
                                                    <p>
                                                        <strong>11 pm to 8 am EST</strong>

                                                        Eastern Standard Time USA
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<?php echo do_shortcode( '[contact-form-7 id="123"]' ) ?>

                            </div>
                        </div>
                    </div>
					<!--<div class="row">
						<div class="col-md-4 col-12 why-chose-block-wrap">
							<div class="block"><img class=""
							                        src="<?php /*echo home_url( 'wp-content/themes/themeboxr/images/contact/map-icon.svg' ) */?>"
							                        alt="100% GPL Code" width="70" height="70"/>
								<h3>Address</h3>
								<a href="https://www.google.com/maps/place/Codeboxr/@23.7445784,90.3899101,17z/data=!4m12!1m6!3m5!1s0x3755b8c71aaaaaab:0xb6061777a91592cf!2sCodeboxr!8m2!3d23.7445784!4d90.3920988!3m4!1s0x3755b8c71aaaaaab:0xb6061777a91592cf!8m2!3d23.7445784!4d90.3920988"
								   target="_blank" rel="noopener noreferrer">Apartment 6H, Dilara Tower, 77 Bir Uttam C.R. Dutta Road, Dhaka 1205,
									Bangladesh</a>

							</div>
						</div>
						<div class="col-md-4 col-12 why-chose-block-wrap">
							<div class="block"><img class=""
							                        src="<?php /*echo home_url( 'wp-content/themes/themeboxr/images/contact/email-icon.svg' ) */?>"
							                        alt="Email" width="70" height="70"/>
								<h3>Email</h3>
								<a href="mailto:info@codeboxr.com">info@codeboxr.com</a>

							</div>
						</div>
						<div class="col-md-4 col-12 why-chose-block-wrap">
							<div class="block"><img class=""
							                        src="<?php /*echo home_url( 'wp-content/themes/themeboxr/images/contact/phone-icon.svg' ) */?>"
							                        alt="Phone" width="70" height="70"/>
								<h3>Phone</h3>
								<a href="tel:8801717308615">+8801717308615</a> (Sabuj)

							</div>
						</div>
					</div>-->
				</div>
			</div>
		</div>
	</section>


<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();
	global $current_user;
	wp_get_current_user();

	// only show edit button if user has permission to edit posts
	if ( is_user_logged_in() && current_user_can( 'edit_others_posts', $post->ID ) || ( $post->post_author == $current_user->ID ) ) {
		?>
		<section>
			<div id="" class="home-sections">
				<div class="cbxinner">
					<div class="container">
						<a href="<?php echo get_edit_post_link(); ?>" class="btn btn-cbx edit-post"><i
								class="fa fa-pencil-square-o"></i> <?php _e( "Edit post", 'themeboxr' ); ?>
						</a>
					</div>
				</div>
			</div>
		</section>
	<?php }
	?>
<?php endwhile; ?>

<?php endif; ?>


<?php get_footer(); ?>
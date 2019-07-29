<?php
	global $post;
	$product_id   = $id = intval( $post->ID );
	$cbxthemeinfo = get_post_meta( $product_id, '_cbxthemeinfo', true );
	$version      = isset( $cbxthemeinfo['version'] ) ? esc_attr( $cbxthemeinfo['version'] ) : '';
	$price        = isset( $cbxthemeinfo['price'] ) ? intval( $cbxthemeinfo['price'] ) : '';
	$last_update  = isset( $cbxthemeinfo['lastupdate'] ) ? esc_attr( $cbxthemeinfo['lastupdate'] ) : '';
	$demo_url     = isset( $cbxthemeinfo['demourl'] ) ? esc_url( $cbxthemeinfo['demourl'] ) : '#';
	$cms_type     = isset( $cbxthemeinfo['cmstype'] ) ? esc_attr( $cbxthemeinfo['cmstype'] ) : '';
	if ( class_exists( 'CBXThemeinfoHelper' ) ) {
		$cms_type = CBXThemeinfoHelper::getCmsType( $cms_type );
	}

	$sub_title = isset( $cbxthemeinfo['subtitle'] ) ? esc_attr( $cbxthemeinfo['subtitle'] ) : '';

	$demo_show_blank = (filter_var($demo_url, FILTER_VALIDATE_URL) === FALSE)? false: true;

?>
<div class="products-header-wrap">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="product-header-content">
					<h1 class="h2"><?php echo get_the_title(); ?></h1>
					<?php if ( $sub_title != '' ): ?>
						<p><?php echo $sub_title; ?></p>
					<?php endif; ?>

					<div class="brand-btn-group">
						<a href="#downloadarea" class="gotome btn btn-brand btn-green">$<?php echo $price; ?></a>
						<a href="#downloadarea" class="gotome btn btn-brand"><?php esc_html_e( 'Buy Now', 'downloadclub' ); ?></a>
						<a <?php echo ($demo_show_blank)? ' target="_blank" ': ''; ?> href="<?php echo $demo_url; ?>" class="btn btn-brand btn-brand-rev <?php echo (!$demo_show_blank)? ' gotome ': ''; ?>">Live Demo</a>
					</div>
				</div>

				<?php

					/*$content_url         = content_url();
					$thumb_urls = array();

					if ( file_exists( WP_CONTENT_DIR . '/uploads/productshots/'.$id.'/' . $id . '-profile.png' ) ) {
						$thumb_urls[] = $content_url . '/uploads/productshots/'.$id.'/' . $id . '-profile.png';

					} else if ( file_exists( WP_CONTENT_DIR . '/uploads/productshots/'.$id.'/' . $id . '-profile.jpg' ) ) {
						$thumb_urls[] = $content_url . '/uploads/productshots/'.$id.'/' . $id . '-profile.jpg';

					}



					for ( $i = 0; $i < 2; $i ++ ) {
						$thumb_url = '';

						if ( file_exists( WP_CONTENT_DIR . '/uploads/productshots/'.$id.'/' . $id . '-featured.png' ) ) {
							$thumb_url = $content_url . '/uploads/productshots/'.$id.'/' . $id . '-featured.png';

						} else if ( file_exists( WP_CONTENT_DIR . '/uploads/productshots/'.$id.'/' . $id . '-featured.jpg' ) ) {
							$thumb_url = $content_url . '/uploads/productshots/'.$id.'/' . $id . '-featured.jpg';

						}

						if ( $thumb_url != '' ) {
							$thumb_urls[] = $thumb_url;

						}
					}*/



				?>

				<!--<div class="product-thumbnail-carousel">
					<div class="feature-slider-warp owl-carousel">
						<?php
/*						foreach ($thumb_urls as $thumb_url){
							echo '<div class="single-thumbnail-product">
									<a href="#" class="d-block">
										<img src="'. esc_url( $thumb_url ) .'" alt="Feature Product" class="img-fluid" />
									</a>
								</div>';
						}
						*/?>
					</div>
				</div>-->
			</div>
		</div>
	</div>
</div>

<div class="single-product-info">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="product-information d-flex">
					<div class="information-item">
						<p>Version</p>
						<strong><?php echo $version; ?></strong>
					</div>

					<div class="information-item">
						<p>CMS</p>
						<strong><?php echo $cms_type; ?></strong>
					</div>

					<div class="information-item">
						<p>Last Update</p>
						<strong><?php echo $last_update; ?></strong>
					</div>

					<!--<div class="information-item">
						<p>Layout</p>
						<strong>Fully Responsive</strong>
					</div>-->

					<div class="information-item">
						<p>Compatible Browsers</p>
						<strong>Firefox, Chrome, Mobile Responsive</strong>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
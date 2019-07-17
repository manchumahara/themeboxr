<?php
global $post;
$product_id   = intval( $post->ID );
$cbxthemeinfo = get_post_meta( $product_id, '_cbxthemeinfo', true );
$version      = isset( $cbxthemeinfo['version'] ) ? esc_attr( $cbxthemeinfo['version'] ) : '';
$price        = isset( $cbxthemeinfo['price'] ) ? intval( $cbxthemeinfo['price'] ) : '';
$last_update  = isset( $cbxthemeinfo['lastupdate'] ) ? esc_attr( $cbxthemeinfo['lastupdate'] ) : '';
$demo_url      = isset( $cbxthemeinfo['demourl'] ) ? esc_url( $cbxthemeinfo['demourl'] ) : '#';
$cms_type      = isset( $cbxthemeinfo['cmstype'] ) ? esc_attr( $cbxthemeinfo['cmstype'] ) : '';
if(class_exists('CBXThemeinfoHelper')){
	$cms_type = CBXThemeinfoHelper::getCmsType($cms_type);
}

	$sub_title  = isset( $cbxthemeinfo['subtitle'] ) ? esc_attr( $cbxthemeinfo['subtitle'] ) : '';

?>
<div class="products-header-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="product-header-content">
                    <h1 class="h2"><?php echo get_the_title(); ?></h1>
					<?php if($sub_title != ''): ?>
                    <p><?php echo $sub_title; ?></p>
					<?php endif; ?>

                    <div class="brand-btn-group">
                        <a href="#" class="btn btn-brand btn-green">$<?php echo $price; ?></a>
                        <a href="#" class="btn btn-brand"><?php esc_html_e('Buy Now', 'downloadclub'); ?></a>
                        <a target="_blank" href="<?php echo $demo_url; ?>" class="btn btn-brand btn-brand-rev">Live Demo</a>
                    </div>
                </div>

                <div class="product-thumbnail-carousel">
                    <div class="feature-slider-warp owl-carousel">
                        <div class="single-thumbnail-product">
                            <a href="#" class="d-block">
                                <img src="<?php echo esc_url( get_stylesheet_directory_uri() ) ?>/assets/images/feature-product/feature-product-1.jpg" alt="Feature Product" class="img-fluid" /> </a>
                        </div>
                        <div class="single-thumbnail-product">
                            <a href="#" class="d-block">
                                <img src="<?php echo esc_url( get_stylesheet_directory_uri() ) ?>/assets/images/feature-product/feature-product-2.jpg" alt="Feature Product" class="img-fluid" /> </a>
                        </div>
                        <div class="single-thumbnail-product">
                            <a href="#" class="d-block">
                                <img src="<?php echo esc_url( get_stylesheet_directory_uri() ) ?>/assets/images/feature-product/feature-product-3.jpg" alt="Feature Product" class="img-fluid" /> </a>
                        </div>
                    </div>
                </div>
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
<?php
/*
Template Name: Homepage
*/

get_header();
?>

    <section id="banner-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="banner-content-wrap">
                        <h1>2700+ <span>Premium</span> Theme & Templete for Websites <br>
                            That Perfectly Fit Your Business</h1>
                        <a href="#" class="btn btn-brand"><?php esc_html_e( 'Buy a theme', 'downloadclub' ); ?></a>

                        <!-- Feature Product Area Start -->
                        <div class="featured-products-area">
                            <div class="feature-slider-warp owl-carousel">
                                <div class="single-feature-product">
                                    <a href="#" class="d-block">
                                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() ) ?>/assets/img/feature-product/feature-product-1.jpg"
                                             alt="Feature Product" class="img-fluid"/>
                                    </a>
                                </div>
                                <div class="single-feature-product">
                                    <a href="#" class="d-block">
                                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() ) ?>/assets/img/feature-product/feature-product-2.jpg"
                                             alt="Feature Product" class="img-fluid"/>
                                    </a>
                                </div>
                                <div class="single-feature-product">
                                    <a href="#" class="d-block">
                                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() ) ?>/assets/img/feature-product/feature-product-3.jpg"
                                             alt="Feature Product" class="img-fluid"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Feature Product Area End -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--== Products Area Start ==-->
    <section id="products-area">
        <!-- Products Filter Menu Start -->
        <div class="products-filter-menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="filter-navbar">
                            <ul class="d-flex">
                                <li class="fil-cat current" data-rel="all">All Item</li>
                                <li class="fil-cat" data-rel="new">New Released</li>
                                <li class="fil-cat" data-rel="pop">Populer Item</li>
                                <li class="fil-cat" data-rel="trend">Trending</li>
                                <li class="fil-cat" data-rel="wp">WordPress</li>
                                <li class="fil-cat" data-rel="feature">Featured</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Products Filter Menu End -->

        <!-- Products Content Start -->
        <div class="products-content-wrap section-padding">
            <div class="container">
                <div id="productsContent" class="row">
                    <!-- Single Product Start -->
                    <div class="product-item scale-amn col-lg-4 col-md-6 all pop trend">
                        <div class="single-product-wrap ">
                            <figure class="product-thumb">
                                <a href="#"><img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/img/products/products-1.jpg"
                                            alt="Home" class="img-fluid"/></a>
                            </figure>

                            <div class="product-meta">
                                <h2 class="h6"><a href="#">Landingz – One Page App and Product</a></h2>

                                <div class="product-sub-meta d-flex justify-content-between">
                                    <a href="#"><i class="fa fa-tags"></i> HTML</a>
                                    <span class="product-price">$19.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Product End -->

                    <!-- Single Product Start -->
                    <div class="product-item scale-amn col-lg-4 col-md-6 all wp new feature">
                        <div class="single-product-wrap">
                            <figure class="product-thumb">
                                <a href="#"><img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/img/products/products-2.jpg"
                                            alt="Home" class="img-fluid"/></a>
                            </figure>

                            <div class="product-meta">
                                <h2 class="h6"><a href="#">Landingz – One Page App and Product</a></h2>

                                <div class="product-sub-meta d-flex justify-content-between">
                                    <a href="#"><i class="fa fa-tags"></i> HTML</a>
                                    <span class="product-price">$19.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Product End -->

                    <!-- Single Product Start -->
                    <div class="product-item scale-amn col-lg-4 col-md-6 all pop">
                        <div class="single-product-wrap">
                            <figure class="product-thumb">
                                <a href="#"><img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/img/products/products-3.jpg"
                                            alt="Home" class="img-fluid"/></a>
                            </figure>

                            <div class="product-meta">
                                <h2 class="h6"><a href="#">Landingz – One Page App and Product</a></h2>

                                <div class="product-sub-meta d-flex justify-content-between">
                                    <a href="#"><i class="fa fa-tags"></i> HTML</a>
                                    <span class="product-price">$19.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Product End -->

                    <!-- Single Product Start -->
                    <div class="product-item scale-amn col-lg-4 col-md-6 all trend wp">
                        <div class="single-product-wrap">
                            <figure class="product-thumb">
                                <a href="#"><img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/img/products/products-2.jpg"
                                            alt="Home" class="img-fluid"/></a>
                            </figure>

                            <div class="product-meta">
                                <h2 class="h6"><a href="#">Landingz – One Page App and Product</a></h2>

                                <div class="product-sub-meta d-flex justify-content-between">
                                    <a href="#"><i class="fa fa-tags"></i> HTML</a>
                                    <span class="product-price">$19.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Product End -->

                    <!-- Single Product Start -->
                    <div class="product-item scale-amn col-lg-4 col-md-6 all pop new">
                        <div class="single-product-wrap">
                            <figure class="product-thumb">
                                <a href="#"><img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/img/products/products-3.jpg"
                                            alt="Home" class="img-fluid"/></a>
                            </figure>

                            <div class="product-meta">
                                <h2 class="h6"><a href="#">Landingz – One Page App and Product</a></h2>

                                <div class="product-sub-meta d-flex justify-content-between">
                                    <a href="#"><i class="fa fa-tags"></i> HTML</a>
                                    <span class="product-price">$19.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Product End -->

                    <!-- Single Product Start -->
                    <div class="product-item scale-amn col-lg-4 col-md-6 all pop wp">
                        <div class="single-product-wrap">
                            <figure class="product-thumb">
                                <a href="#"><img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/img/products/products-1.jpg"
                                            alt="Home" class="img-fluid"/></a>
                            </figure>

                            <div class="product-meta">
                                <h2 class="h6"><a href="#">Landingz – One Page App and Product</a></h2>

                                <div class="product-sub-meta d-flex justify-content-between">
                                    <a href="#"><i class="fa fa-tags"></i> HTML</a>
                                    <span class="product-price">$19.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Product End -->
                </div>

                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="product-loadmore-btn">
                            <a href="#" class="btn btn-brand btn-load">Load More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Products Content End -->
    </section>
    <!--== Products Area End ==-->

    <!--== We Are Best Area Start ==-->
    <section id="we-are-best-area" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title-wrap">
                        <h2>Why We Are Best </h2>
                        <p>Here we listed some some reasone of why we are best</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 text-center">
                    <div class="single-we-best-item">
                        <figure class="feature-logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/we-best/satisfication.png" alt="Themeboxr" />
                        </figure>

                        <h3 class="h4">100% Satisfaction</h3>
                        <p>We provide best services in this field, so we belived that you are fully  satisfied on our service and wishes us good luck.</p>
                    </div>
                </div>

                <div class="col-lg-4 text-center">
                    <div class="single-we-best-item">
                        <figure class="feature-logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/we-best/support.png" alt="Themeboxr" />
                        </figure>

                        <h3 class="h4">Best Support</h3>
                        <p>We provide best services in this field, so we belived that you are fully  satisfied on our service and wishes us good luck.</p>
                    </div>
                </div>

                <div class="col-lg-4 text-center">
                    <div class="single-we-best-item">
                        <figure class="feature-logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/we-best/square.png" alt="Themeboxr" />
                        </figure>

                        <h3 class="h4">Fully Squared</h3>
                        <p>We provide best services in this field, so we belived that you are fully  satisfied on our service and wishes us good luck.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== We Are Best Area End ==-->


<?php
while ( have_posts() ) :
	the_post();
	//get_template_part( 'template-parts/content', 'page' );
endwhile; // End of the loop.
?>


<?php
get_footer();
<?php
/*
Template Name: About US
*/
?>
<?php
get_header();
?>
    <div class="entry-header-cover entry-header" id="banner-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="banner-content-wrap">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                        <h2 class="h6">Design these templete thinking about categories, color, typography and latest
                            treand</h2>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .entry-header -->
<?php
downloadclub_page_wrapper_start();
?>

   <!-- <div class="container">
        <div id="primary" class="content-area row">
            <div id="main" class="site-main col-md-12">
				<?php
/*				while ( have_posts() ) :
					the_post();
				endwhile; // End of the loop.
				*/?>

            </div><!-- #main
        </div><!-- #primary
    </div>-->

    <!--== About Page Content Start ==-->
    <div id="about-page-wrap" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <figure class="about-video-wrap">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/about-video.jpg" alt="Themeboxr" />

                        <figcaption class="video-content">
                            <a href="#" class="btn btn-play"><i class="fa fa-play"></i></a>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <!--== About Page Content End ==-->

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

            <div class="we-best-content-wrap">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <div class="single-we-best-item">
                            <figure class="feature-logo">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/we-best/satisfication.png" alt="Themeboxr" />
                            </figure>

                            <h3 class="h4">100% Satisfaction</h3>
                            <p>We provide best services in this field, so we belived that you are fully  satisfied on our service and wishes us good luck.</p>
                        </div>
                    </div>

                    <div class="col-md-4 text-center">
                        <div class="single-we-best-item">
                            <figure class="feature-logo">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/we-best/support.png" alt="Themeboxr" />
                            </figure>

                            <h3 class="h4">Best Support</h3>
                            <p>We provide best services in this field, so we belived that you are fully  satisfied on our service and wishes us good luck.</p>
                        </div>
                    </div>

                    <div class="col-md-4 text-center">
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
        </div>
    </section>
    <!--== We Are Best Area End ==-->

    <!--== Newsletter Area Start ==-->
    <section id="newsletter-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 m-auto">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 m-auto text-center text-md-left">
                            <h2 class="h4">Subcribes to Update With Us</h2>
                        </div>

                        <div class="col-lg-7 col-md-6 mt-5 mt-md-0">
                            <div class="newsletter-form">
                                <form action="#">
                                    <input type="email" placeholder="Your Email Address" required />
                                    <button class="btn">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Newsletter Area End ==-->


<?php
downloadclub_page_wrapper_end();
get_footer();

<?php
/*
Template Name: About
*/
?>
<?php
get_header();
?>
    <section style="padding-top: 100px">
        <div id="about" class="home-sections">
            <div class="cbxinner cbxinnerwhite">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="cbxsectitle">
                                <span class="cbxsecicon"></span> <span class="cbxsec_headblock">
									<strong class="cbxsec_head">About Us</strong>
									<strong class="cbxsec_subhead">it's not must to win the prize</strong>
								</span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
downloadclub_page_wrapper_start();
?>
    <div class="section-goal-bg-1">
        <div class="container">
            <div id="primary" class="content-area row">
                <div id="main" class="site-main col-md-12">
                    <!--== About Page Content Start ==-->
                    <div id="about-page-wrap" class="">
                        <div class="container">
                            <div class="row row-align">
                                <div class="col-lg-6 mt-5 mt-lg-0">
                                    <div class="about-right-content">
                                        <h3><span>Who</span> We Are</h3>
                                        <p>Themeboxr is sister concern of <a href="https://codeboxr.com"
                                                                             target="_blank">Codeboxr</a>. Themeboxr
                                            creates useful and trendy themes for WordPress, Joomla etc cms and Static
                                            Html.  Besides themes/templates, we create other creative items like custom
                                            logo, branding material, social media marketing graphics etc as per client's
                                            custom requirement.</p>

                                        <a href="https://themeboxr.com/shop/" target="_blank" class="btn btn-brand">Check
                                            out our themes and templates</a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <figure class="">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/who_we_are.svg"
                                             alt="Themeboxr"/>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--== About Page Content End ==-->
    <div class="section-goal-bg-2">
        <div class="container">
            <div id="primary" class="content-area row">
                <div id="main" class="site-main col-md-12">
                    <!--== Technical Person Start ==-->
                    <div id="about-page-wrap" class="">
                        <div class="container">
                            <div class="row row-align">
                                <div class="col-lg-6 hide-in-mobile" >
                                    <figure class="">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/support.svg"
                                             alt="Themeboxr"/>
                                    </figure>
                                </div>
                                <div class="col-lg-6 mt-5 mt-lg-0">
                                    <div class="about-right-content">
                                        <h3>Our Technical Person</h3>
                                        <p>Theay are ready to provide you batter service, if you nedd any kind of help
                                            or if you feel you are in a problem, just feel free to noticed us, you get
                                            100% premium support from them. happy web designing</p>

                                        <a href="https://codeboxr.com/contact-us/" target="_blank" class="btn btn-brand">Get Premium Support</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 d-lg-none">
                                    <figure class="">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/support.svg"
                                             alt="Themeboxr"/>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--== Technical Person End ==-->

                </div><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div>

<?php
downloadclub_page_wrapper_end();
get_footer();

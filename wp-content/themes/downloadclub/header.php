<?php
	/**
	 * The header for our theme
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package DownloadClub
	 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Roboto:300,400,400i,500,700" rel="stylesheet" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-63121676-1']);
	_gaq.push(['_trackPageview']);

	(function () {

		var ga   = document.createElement('script');
		ga.type  = 'text/javascript';
		ga.async = true;

		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(ga, s);

	})();

</script>
<?php
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$logo_url       = '';
	if ( $custom_logo_id ) {
		$logo_url = wp_get_attachment_image_src( $custom_logo_id, 'full', false );

		if ( $logo_url === false ) {
			$logo_url = get_stylesheet_directory_uri() . '/assets/images/logo-color.png';
		} else {
			$logo_url = $logo_url[0];
		}

	} else {
		$logo_url = get_stylesheet_directory_uri() . '/assets/images/logo-color.png';
	}

	$is_admin_bar_showing = is_admin_bar_showing() ? 'is_admin_bar_showing' : '';

?>
    <a class="navbar-search" href="#cbxpopupsearch" >
        <i class="fa fa-search" aria-hidden="true"></i>
    </a>
    <div id="cbxpopupsearch" class="cbx-popup ">
        <button type="button" class="close"><i class="fa fa-times" aria-hidden="true"></i></button>
        <form action="<?php echo home_url('/'); ?>" method="get">
            <input autocomplete="off" type="text" name="s" placeholder="To search: Type and hit enter" value="<?php the_search_query();  ?>" />
            <input type="hidden" name="post_type[]" value="product" />
            <input type="hidden" name="post_type[]" value="page" />
            <input type="hidden" name="post_type[]" value="post" />
            <button type="submit" class="btn btn-cbx"><?php esc_html_e('Search','themeboxr') ?></button>
        </form>
    </div>
<header id="header-area" class="fixed-top <?php echo esc_attr( $is_admin_bar_showing ); ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<nav class="navbar navbar-expand-lg">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand">
						<img src="<?php echo esc_url( $logo_url ); ?>" alt="Themeboxr" class="img-fluid white-logo" />
					</a>

					<button class="navbar-toggler js-offcanvas-trigger" type="button" data-toggle="collapse" data-target="#navMain" aria-controls="navMain" aria-expanded="false" aria-label="Toggle navigation" data-offcanvas-trigger="off-canvas">
						<i class="fa fa-bars"></i>
					</button>

					<div class="collapse navbar-collapse" id="navbarNavDropdown">
						<?php
							wp_nav_menu( array(
								'theme_location'  => 'topmenu',
								'depth'           => 2,
								'container'       => 'div',
								'container_class' => 'collapse navbar-collapse',
								'container_id'    => 'navMain',
								'menu_class'      => 'nav navbar-nav ml-auto',
								//'fallback_cb'     => 'Downloadclub_Bootstrap_Navwalker::fallback',
								//'walker'          => new Downloadclub_Bootstrap_Navwalker(),
								'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
								'walker'          => new WP_Bootstrap_Navwalker()
							) );
						?>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>

<aside class="js-offcanvas" data-offcanvas-options='{ "modifiers": "right,overlay", "closeButtonClass": "js-offcanvas-close" }' id="off-canvas" style="display: none">
	<div class="offcanvaswrap">
		<div class="js-offcanvas-header">
			<a class="offcanvaslogo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img class="brandlogo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-color.png" alt="<?php esc_html_e( 'Themeboxr Logo', 'downloadclub' ); ?>" />
			</a>
			<span class="js-offcanvas-close" title="<?php esc_html_e( 'Close', 'downloadclub' ); ?>"><i class="fa fa-times" aria-hidden="true"></i></span>
			<div class="clearfix"></div>
		</div>
		<div class="js-offcanvas-body">
            <?php if(function_exists('woocommerce_mini_cart')): ?>
            <div class="js-offcanvas-section">
                <h2>Cart</h2>
                <?php woocommerce_mini_cart(); ?>
            </div>
            <?php endif; ?>
			<div class="js-offcanvas-section">
				<div class="offcanvaswrap_menus">
				</div>
			</div>
			<div class="js-offcanvas-section">
				<?php
					get_search_form();
				?>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</aside>
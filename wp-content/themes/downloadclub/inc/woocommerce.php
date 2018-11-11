<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package DownloadClub
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function downloadclub_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'downloadclub_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
/*function downloadclub_woocommerce_scripts() {
	wp_enqueue_style( 'downloadclub-woocommerce-style', get_template_directory_uri() . '/woocommerce.css' );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'downloadclub-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'downloadclub_woocommerce_scripts' );*/

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 *
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function downloadclub_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'downloadclub_woocommerce_active_body_class' );

/**
 * Products per page.
 *
 * @return integer number of products.
 */
function downloadclub_woocommerce_products_per_page() {
	return 12;
}
add_filter( 'loop_shop_per_page', 'downloadclub_woocommerce_products_per_page' );

/**
 * Product gallery thumnbail columns.
 *
 * @return integer number of columns.
 */
function downloadclub_woocommerce_thumbnail_columns() {
	return 4;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'downloadclub_woocommerce_thumbnail_columns' );

/**
 * Default loop columns on product archives.
 *
 * @return integer products per row.
 */
function downloadclub_woocommerce_loop_columns() {
	return 3;
}
add_filter( 'loop_shop_columns', 'downloadclub_woocommerce_loop_columns' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 *
 * @return array $args related products args.
 */
function downloadclub_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'downloadclub_woocommerce_related_products_args' );

if ( ! function_exists( 'downloadclub_woocommerce_product_columns_wrapper' ) ) {
	/**
	 * Product columns wrapper.
	 *
	 * @return  void
	 */
	function downloadclub_woocommerce_product_columns_wrapper() {
		echo '<div class="container">';

		$columns = downloadclub_woocommerce_loop_columns();
		echo '<div class="woocommerce-products-wrapper columns-' . absint( $columns ) . '">';
	}
}
add_action( 'woocommerce_before_shop_loop', 'downloadclub_woocommerce_product_columns_wrapper', 9 );

if(!function_exists('downloadclub_woocommerce_products_toolbar_start')){
	function downloadclub_woocommerce_products_toolbar_start(){
		echo '<div id="woocommerce-products-toolbar">';
	}
}

if(!function_exists('downloadclub_woocommerce_products_toolbar_end')){
	function downloadclub_woocommerce_products_toolbar_end(){
		echo '<div class="clearfix"></div></div>';
	}
}

add_action( 'woocommerce_before_shop_loop', 'downloadclub_woocommerce_products_toolbar_start', 9 );
add_action( 'woocommerce_before_shop_loop', 'downloadclub_woocommerce_products_toolbar_end', 31);

if ( ! function_exists( 'downloadclub_woocommerce_product_columns_wrapper_close' ) ) {
	/**
	 * Product columns wrapper close.
	 *
	 * @return  void
	 */
	function downloadclub_woocommerce_product_columns_wrapper_close() {
		echo '</div></div>'; //.row .container
	}
}
add_action( 'woocommerce_after_shop_loop', 'downloadclub_woocommerce_product_columns_wrapper_close', 9 );

if(!function_exists('downloadclub_after_shop_loop_item_toolbar_start')){
	function downloadclub_after_shop_loop_item_toolbar_start(){
		echo '<div class="product-loop-toolbar">';
	}
}
if(!function_exists('downloadclub_after_shop_loop_item_toolbar_end')){
	function downloadclub_after_shop_loop_item_toolbar_end(){
		echo '<div class="clearfix"></div></div>';
	}
}

add_action('woocommerce_after_shop_loop_item', 'downloadclub_after_shop_loop_item_toolbar_start',6);
add_action('woocommerce_after_shop_loop_item', 'downloadclub_after_shop_loop_item_toolbar_end', 9999);
/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 10 );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_rating', 10 );

if ( ! function_exists( 'downloadclub_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function downloadclub_woocommerce_wrapper_before() {
		$main_col_x = is_active_sidebar( 'shop' ) ? 'col-md-8' : 'col-md-12';
		?>
		<div class="entry-header-cover entry-header" id="banner-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="banner-content-wrap">
							<?php
							if(is_singular()){
								the_title( '<h1 class="entry-title">', '</h1>' );
							}
							else{
								?>
								<h1 class="entry-title"><?php woocommerce_page_title(); ?></h1>
								<?php
								/**
								 * Hook: woocommerce_archive_description.
								 *
								 * @hooked woocommerce_taxonomy_archive_description - 10
								 * @hooked woocommerce_product_archive_description - 10
								 */
								do_action( 'woocommerce_archive_description' );
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="page" class="site clearfix"><div id="content" class="site-content">
		<div class="section-padding section-bg-color">

			<?php
	}
}
add_action( 'woocommerce_before_main_content', 'downloadclub_woocommerce_wrapper_before', 9 );

if ( ! function_exists( 'downloadclub_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function downloadclub_woocommerce_wrapper_after() {

			?>
		</div></div>
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'downloadclub_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	* <?php
		* if ( function_exists( 'downloadclub_woocommerce_header_cart' ) ) {
			* downloadclub_woocommerce_header_cart();
		* }
	* ?>
 */

if ( ! function_exists( 'downloadclub_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 *
	 * @return array Fragments to refresh via AJAX.
	 */
	function downloadclub_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		downloadclub_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'downloadclub_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'downloadclub_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function downloadclub_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'downloadclub' ); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'downloadclub' ),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo esc_html( $item_count_text ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'downloadclub_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function downloadclub_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php downloadclub_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}

/**
 * Change the placeholder image
 */
add_filter('woocommerce_placeholder_img_src', 'downloadclub_woocommerce_placeholder_img_src');
if(!function_exists('downloadclub_woocommerce_placeholder_img_src')){
	function downloadclub_woocommerce_placeholder_img_src( $src ) {
		return WP_CONTENT_URL . '/themes/downloadclub/assets/img/default_thumb.png';
	}
}

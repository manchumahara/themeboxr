<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.3.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
$base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
$format  = isset( $format ) ? $format : '';

if ( $total <= 1 ) {
	return;
}
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<nav class="woocommerce-pagination">
				<?php
					$translated = esc_html__( 'Page', 'downloadclub' ); // Supply translatable string
					$pagination =  paginate_links( apply_filters( 'woocommerce_pagination_args', array( // WPCS: XSS ok.
						'base'         => $base,
						'format'       => $format,
						'add_args'     => false,
						'current'      => max( 1, $current ),
						'total'        => $total,
						'prev_text'          => __('<span></span> Prev', 'downloadclub'),
						'next_text'          => __('Next <span></span>', 'downloadclub'),
						'type' => 'array',
						'end_size'     => 3,
						'mid_size'     => 3,
						'before_page_number' => '<span class="screen-reader-text">' . $translated . ' </span>'
					) ) );

					if ( ! empty( $pagination ) ) : ?>
						<ul class="pagination pagination-lg downloadclub_pagination">
							<?php foreach ( $pagination as $key => $page_link ) : ?>
								<li class="page-item<?php if ( strpos( $page_link, 'current' ) !== false ) { echo ' active'; } ?>"><?php echo str_replace( 'page-numbers', 'page-link', $page_link ); ?></li>
							<?php endforeach ?>
						</ul>
					<?php endif;
				?>
			</nav>
		</div>
	</div>
</div>
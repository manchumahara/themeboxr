<?php
	add_action( 'init', 'themeboxr_create_custom_postype_taxonomies', 0 );

	function themeboxr_create_custom_postype_taxonomies() {
		global $wp_rewrite;

		register_post_type( 'testimonial', array(
			'label'           => 'Testimonials',
			'has_archive'     => true,
			'description'     => '',
			'public'          => true,
			'show_ui'         => true,
			'show_in_menu'    => true,
			'capability_type' => 'post',
			'hierarchical'    => false,
			'rewrite'         => array( 'slug' => 'testimonial' ),
			'query_var'       => true,
			'supports'        => array(
				'title',
				'editor',
				'trackbacks',
				'custom-fields',
				'comments',
				'thumbnail',
				'author',
				'page-attributes',
			),
			'labels'          => array(
				'name'               => 'Testimonials',
				'singular_name'      => 'Testimonial',
				'menu_name'          => 'Testimonials',
				'add_new'            => 'Add Testimonial',
				'add_new_item'       => 'Add New Testimonial',
				'edit'               => 'Edit',
				'edit_item'          => 'Edit Testimonial',
				'new_item'           => 'New Testimonial',
				'view'               => 'View Testimonial',
				'view_item'          => 'View Testimonial',
				'search_items'       => 'Search Testimonials',
				'not_found'          => 'No Testimonials Found',
				'not_found_in_trash' => 'No Testimonials Found in Trash',
				'parent'             => 'Parent Testimonial',
			),
		) );

		//for testimonial

		register_taxonomy( 'testimonial_type', array(
			0 => 'testimonial',
		), array(
			'hierarchical'   => true,
			'label'          => 'Product Type',
			'show_ui'        => true,
			'query_var'      => true,
			'rewrite'        => array( 'slug' => 'testimonial_type' ),
			'singular_label' => 'Product Type'
		) );

		register_taxonomy( 'testimonial_source', array(
			0 => 'testimonial',
		), array(
			'hierarchical'   => true,
			'label'          => 'Testimonial Source',
			'show_ui'        => true,
			'query_var'      => true,
			'rewrite'        => array( 'slug' => 'testimonial_source' ),
			'singular_label' => 'Testimonial Source'
		) );

	}

/**
 * @param WP_Query|null $wp_query
 * @param bool $echo
 *
 * @return string
 * Accepts a WP_Query instance to build pagination (for custom wp_query()),
 * or nothing to use the current global $wp_query (eg: taxonomy term page)
 * - Tested on WP 5.3
 * - Tested with Bootstrap 4.4
 * - Tested on Sage 9.0.9
 *
 * USAGE:
 *     <?php echo themeboxr_page_navi_4(); ?> //uses global $wp_query
 * or with custom WP_Query():
 *     <?php
 *      $query = new \WP_Query($args);
 *       ... while(have_posts()), $query->posts stuff ...
 *       echo bootstrap_pagination($query);
 *     ?>
 */
function themeboxr_page_navi_4( \WP_Query $wp_query = null, $echo = true ) {

	if ( null === $wp_query ) {
		global $wp_query;
	}

	$pages = paginate_links( [
			'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
			'format'       => '?paged=%#%',
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'total'        => $wp_query->max_num_pages,
			'type'         => 'array',
			'show_all'     => false,
			'end_size'     => 3,
			'mid_size'     => 1,
			'prev_next'    => true,
			'prev_text'    => __( '« Prev' ),
			'next_text'    => __( 'Next »' ),
			'add_args'     => false,
			'add_fragment' => ''
		]
	);

	if ( is_array( $pages ) ) {
		//$paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );

		$pagination = '<div class="pagination-wrap"><ul class="pagination">';

		foreach ($pages as $page) {
			$pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
		}

		$pagination .= '</ul></div>';

		if ( $echo ) {
			echo $pagination;
		} else {
			return $pagination;
		}
	}

	return null;
}
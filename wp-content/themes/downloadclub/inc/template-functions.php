<?php
	/**
	 * Functions which enhance the theme by hooking into WordPress
	 *
	 * @package DownloadClub
	 */

	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 *
	 * @return array
	 */
	function downloadclub_body_classes( $classes ) {
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		// Adds a class of no-sidebar when there is no sidebar present.
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'no-sidebar';
		}

		return $classes;
	}

	add_filter( 'body_class', 'downloadclub_body_classes' );

	/**
	 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
	 */
	function downloadclub_pingback_header() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		}
	}

	add_action( 'wp_head', 'downloadclub_pingback_header' );

	function downloadclub_ellipsis( $text, $max = 200, $append = '&hellip;' ) {
		if ( strlen( $text ) <= $max ) {
			return $text;
		}
		$out = substr( $text, 0, $max );
		if ( strpos( $text, ' ' ) === false ) {
			return $out . $append;
		}

		return preg_replace( '/\w+$/', '', $out ) . $append;
	}

	add_filter( 'show_admin_bar', '__return_false' );

	add_filter('next_posts_link_attributes', 'next_posts_link_attributes_bs');
	add_filter('previous_posts_link_attributes', 'next_posts_link_attributes_bs');

	function next_posts_link_attributes_bs(){
		return ' class="page-link" ';
	}
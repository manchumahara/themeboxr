<?php
	/**
	 * DownloadClub functions and definitions
	 *
	 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
	 *
	 * @package DownloadClub
	 */

	if (! function_exists('mix')) {
		/**
		 * Get the path to a versioned Mix file.
		 *
		 * @param  string  $path
		 * @param  string  $manifestDirectory
		 * @return \Illuminate\Support\HtmlString
		 *
		 * @throws \Exception
		 */
		function mix($path, $manifestDirectory = '')
		{
			static $manifests = [];

			if (! starts_with($path, '/')) {
				$path = "/{$path}";
			}

			if ($manifestDirectory && ! starts_with($manifestDirectory, '/')) {
				$manifestDirectory = "/{$manifestDirectory}";
			}

			if (file_exists(public_path($manifestDirectory.'/hot'))) {
				return new HtmlString("//localhost:8080{$path}");
			}

			$manifestPath = public_path($manifestDirectory.'/mix-manifest.json');

			if (! isset($manifests[$manifestPath])) {
				if (! file_exists($manifestPath)) {
					throw new Exception('The Mix manifest does not exist.');
				}

				$manifests[$manifestPath] = json_decode(file_get_contents($manifestPath), true);
			}

			$manifest = $manifests[$manifestPath];

			if (! isset($manifest[$path])) {
				throw new Exception(
					"Unable to locate Mix file: {$path}. Please check your ".
					'webpack.mix.js output paths and try again.'
				);
			}

			return new HtmlString($manifestDirectory.$manifest[$path]);
		}
	}

	if ( ! function_exists( 'downloadclub_setup' ) ) :
		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support for post thumbnails.
		 */
		function downloadclub_setup() {

			load_theme_textdomain( 'downloadclub', get_template_directory() . '/languages' );

			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			/*
			 * Let WordPress manage the document title.
			 * By adding theme support, we declare that this theme does not use a
			 * hard-coded <title> tag in the document head, and expect WordPress to
			 * provide it for us.
			 */
			add_theme_support( 'title-tag' );

			/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
			 */
			add_theme_support( 'post-thumbnails' );

			// This theme uses wp_nav_menu() in one location.
			register_nav_menus( array(
				'topmenu' => esc_html__( 'Main Menu', 'downloadclub' ),
			) );

			/*
			 * Switch default core markup for search form, comment form, and comments
			 * to output valid HTML5.
			 */
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			) );

			// Set up the WordPress core custom background feature.
			add_theme_support( 'custom-background', apply_filters( 'downloadclub_custom_background_args', array(
				'default-color' => 'ffffff',
				'default-image' => '',
			) ) );

			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );

			/**
			 * Add support for core custom logo.
			 *
			 * @link https://codex.wordpress.org/Theme_Logo
			 */
			add_theme_support( 'custom-logo', array(
				'height'      => 400,
				'width'       => 133,
				'flex-width'  => true,
				'flex-height' => true,
			) );
		}
	endif;
	add_action( 'after_setup_theme', 'downloadclub_setup' );

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	function downloadclub_content_width() {
		// This variable is intended to be overruled from themes.
		// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
		$GLOBALS['content_width'] = apply_filters( 'downloadclub_content_width', 640 );
	}

	add_action( 'after_setup_theme', 'downloadclub_content_width', 0 );

	/**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function downloadclub_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar Right', 'downloadclub' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widget in sidebar Right', 'downloadclub' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar Left', 'downloadclub' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widget in sidebar Left', 'downloadclub' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar Blog', 'downloadclub' ),
			'id'            => 'sidebar-blog',
			'description'   => esc_html__( 'Add widget in Blog sidebar', 'downloadclub' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

	}

	add_action( 'widgets_init', 'downloadclub_widgets_init' );

	/**
	 * Enqueue scripts and styles.
	 */
	function downloadclub_scripts() {

		$my_theme = wp_get_theme();
		$version  = $my_theme->get( 'Version' );


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


		wp_enqueue_style( 'downloadclub-style', get_stylesheet_uri() );
		wp_enqueue_style( 'downloadclub-core', get_template_directory_uri() . '/assets/css/downloadclub.css', array(), $version, 'all' );


		//wp_enqueue_script( 'downloadclub-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
		$downloadclub_js_vars = apply_filters( 'downloadclub_js_vars', array(
			'debug'                => array(
				'WP_DEBUG'         => WP_DEBUG,
				'WP_DEBUG_DISPLAY' => WP_DEBUG_DISPLAY,
				'WP_DEBUG_LOG'     => WP_DEBUG_LOG,
				'SCRIPT_DEBUG'     => SCRIPT_DEBUG,
			),
			'is_admin_bar_showing' => is_admin_bar_showing() ? 1 : 0,
			//currently this value is not used anymore in frontend js
		) );
		wp_enqueue_script( 'downloadclub-core', get_template_directory_uri() . '/assets/js/downloadclub.js', array( 'jquery' ), $version, true );
		wp_localize_script( 'downloadclub-core', 'downloadclub', $downloadclub_js_vars );

		wp_add_inline_style( 'downloadclub-core', $inline_font );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	add_action( 'wp_enqueue_scripts', 'downloadclub_scripts' );

	// Numeric Page Navi (built into the theme by default)
	function downloadclub_page_navi( $before = '', $after = '' ) {
		global $wpdb, $wp_query;
		$request        = $wp_query->request;
		$posts_per_page = intval( get_query_var( 'posts_per_page' ) );
		$paged          = intval( get_query_var( 'paged' ) );
		$numposts       = $wp_query->found_posts;
		$max_page       = $wp_query->max_num_pages;
		if ( $numposts <= $posts_per_page ) {
			return;
		}
		if ( empty( $paged ) || $paged == 0 ) {
			$paged = 1;
		}
		$pages_to_show         = 7;
		$pages_to_show_minus_1 = $pages_to_show - 1;
		$half_page_start       = floor( $pages_to_show_minus_1 / 2 );
		$half_page_end         = ceil( $pages_to_show_minus_1 / 2 );
		$start_page            = $paged - $half_page_start;
		if ( $start_page <= 0 ) {
			$start_page = 1;
		}
		$end_page = $paged + $half_page_end;
		if ( ( $end_page - $start_page ) != $pages_to_show_minus_1 ) {
			$end_page = $start_page + $pages_to_show_minus_1;
		}
		if ( $end_page > $max_page ) {
			$start_page = $max_page - $pages_to_show_minus_1;
			$end_page   = $max_page;
		}
		if ( $start_page <= 0 ) {
			$start_page = 1;
		}

		echo $before . '<ul class="pagination">' . "";
		if ( $paged > 1 ) {
			$first_page_text = "&laquo";
			echo '<li class="page-item prev"><a class="page-link" href="' . get_pagenum_link() . '" title="First">' . $first_page_text . '</a></li>';
		}

		$prevposts = get_previous_posts_link( '&larr; Previous' );
		if ( $prevposts ) {
			echo '<li>' . $prevposts . '</li>';
		} else {
			echo '<li class="page-item disabled"><a class="page-link" href="#">&larr; Previous</a></li>';
		}

		for ( $i = $start_page; $i <= $end_page; $i ++ ) {
			if ( $i == $paged ) {
				echo '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
			} else {
				echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link( $i ) . '">' . $i . '</a></li>';
			}
		}
		echo '<li class="page-item">';
		next_posts_link( 'Next &rarr;' );
		echo '</li>';
		if ( $end_page < $max_page ) {
			$last_page_text = "&raquo;";
			echo '<li class="page-item next"><a class="page-link" href="' . get_pagenum_link( $max_page ) . '" title="Last">' . $last_page_text . '</a></li>';
		}
		echo '</ul>' . $after . "";
	}

	/*if ( ! file_exists( get_template_directory() . '/inc/wp-bootstrap-navwalker.php' ) ) {
		// file does not exist... return an error.
		return new WP_Error( 'wp-bootstrap-navwalker-missing', __( 'It appears the wp-bootstrap-navwalker.php file may be missing.', 'downloadclub' ) );
	} else {
		// file exists... require it.
		require_once get_template_directory() . '/inc/wp-bootstrap-navwalker.php';
	}*/

	if ( ! file_exists( get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php' ) ) {
		// file does not exist... return an error.
		return new WP_Error( 'wp-bootstrap-navwalker-missing', __( 'It appears the wp-bootstrap-navwalker.php file may be missing.', 'downloadclub' ) );
	} else {
		// file exists... require it.
		require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
	}

add_action( 'admin_bar_menu', 'themeboxr_thismonth_reports_menu_bar', 999 );
function themeboxr_thismonth_reports_menu_bar( $wp_admin_bar ) {
	if ( current_user_can( 'manage_options' ) ) {
		$wp_admin_bar->add_node(
			array(
				'id'    => 'cbxmanagement',
				'title' => 'Office Management',
				'href'  => admin_url( 'admin.php?page=wc-reports&range=month' ),
				'meta'  => array( 'class' => 'cbxmanagement' ),
			)
		);

		$wp_admin_bar->add_node(
			array(
				'parent' => 'cbxmanagement',
				'id'     => 'cbxmanagement_plugins',
				'title'  => 'Codeboxr Plugins',
				'href'   => 'https://profiles.wordpress.org/manchumahara/#content-plugins',
				'meta'   => array( 'target' => '_blank', 'class' => 'cbxmanagement_plugins' ),
			)
		);

		$wp_admin_bar->add_node(
			array(
				'parent' => 'cbxmanagement',
				'id'     => 'cbxmanagement_themeboxr',
				'title'  => 'Codeboxr',
				'href'   => 'https://codeboxr.com/wp-admin/',
				'meta'   => array( 'target' => '_blank', 'class' => 'cbxmanagement_themeboxr' ),
			)
		);

		$wp_admin_bar->add_node(
			array(
				'parent' => 'cbxmanagement',
				'id'     => 'cbxmanagement_themeforest',
				'title'  => 'Themeforest',
				'href'   => 'https://themeforest.net/user/codeboxr/portfolio',
				'meta'   => array( 'class' => 'cbxmanagement_themeforest', 'target' => '_blank' ),
			)
		);

		$wp_admin_bar->add_node(
			array(
				'id'    => 'visitsite',
				'title' => 'Visit Site',
				'href'  => site_url(),
				'meta'  => array( 'class' => 'visitsite_adminbar', 'target' => '_blank' ),

			)
		);
	}
}


/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function themeboxr_lmpt_add_dashboard_widgets() {

	wp_add_dashboard_widget(
		'themeboxr_lmpt_dashboard_widget',         // Widget slug.
		esc_html__( 'Last Modified Post Types', 'themeboxr' ),         // Title.
		'themeboxr_lmpt_dashboard_widget_function' // Display function.
	);
}

add_action( 'wp_dashboard_setup', 'themeboxr_lmpt_add_dashboard_widgets' );

/**
 * Create the function to output the contents of our Dashboard Widget.
 */
function themeboxr_lmpt_dashboard_widget_function() {

	global $post;
	// Display whatever it is you want to show.
	$args          = array(

		'post_type'      => array( 'post', 'page', 'product' ),
		'posts_per_page' => 10,
		'post_status'    => array( 'publish', 'draft' ),
		'order'          => 'DESC',
		'orderby'        => 'modified',

	);
	$related_posts = get_posts( $args );
	echo '<ul>';
	if ( $related_posts ) {
		foreach ( $related_posts as $post ) : setup_admin_postdata( $post ); ?>
			<li class="related_post">
				<a target="_blank" href="<?php the_permalink() ?>"
				   title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</li>
			<li>[<?php echo get_post_status(); ?>] - <?php echo get_post_type(); ?> - <a target="_blank" href="<?php echo get_edit_post_link(); ?>">Edit</a></li>
		<?php endforeach;
		wp_reset_admin_postdata();
	} else { ?>
		<li class="no_related_post">No Recent Edits</li>
	<?php }

	echo '</ul>';
}

/**
 * Setup a post object and store the original loop item so we can reset it later
 *
 * @param obj $post_to_setup The post that we want to use from our custom loop
 */
function setup_admin_postdata( $post_to_setup ) {

	//only on the admin side
	if ( is_admin() ) {

		//get the post for both setup_postdata() and to be cached
		global $post;

		//only cache $post the first time through the loop
		if ( ! isset( $GLOBALS['post_cache'] ) ) {
			$GLOBALS['post_cache'] = $post;
		}

		//setup the post data as usual
		$post = $post_to_setup;
		setup_postdata( $post );
	} else {
		setup_postdata( $post_to_setup );
	}
}//end method setup_admin_postdata


/**
 * Reset $post back to the original item
 *
 */
function wp_reset_admin_postdata() {

	//only on the admin and if post_cache is set
	if ( is_admin() && ! empty( $GLOBALS['post_cache'] ) ) {

		//globalize post as usual
		global $post;

		//set $post back to the cached version and set it up
		$post = $GLOBALS['post_cache'];
		setup_postdata( $post );

		//cleanup
		unset( $GLOBALS['post_cache'] );
	} else {
		wp_reset_postdata();
	}
}//end method wp_reset_admin_postdata

	/**
	 * Implement the Custom Header feature.
	 */
	require get_template_directory() . '/inc/custom-header.php';

	/**
	 * Custom template tags for this theme.
	 */
	require get_template_directory() . '/inc/template-tags.php';

	/**
	 * Functions which enhance the theme by hooking into WordPress.
	 */
	require get_template_directory() . '/inc/template-functions.php';

	/**
	 * Load WooCommerce compatibility file.
	 */
	if ( function_exists( 'WC' ) ) {

		require get_template_directory() . '/inc/woocommerce.php';
	}

	/**
	 * Customizer additions.
	 */
	require get_template_directory() . '/inc/customizer.php';

	/**
	 * Load Jetpack compatibility file.
	 */
	if ( defined( 'JETPACK__VERSION' ) ) {
		require get_template_directory() . '/inc/jetpack.php';
	}

	add_filter( 'send_password_change_email', '__return_false' );
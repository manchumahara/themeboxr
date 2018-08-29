<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DownloadClub
 */

get_header();
?>
<div class="entry-header-cover entry-header" id="banner-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="banner-content-wrap">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</div>
			</div>
		</div>
	</div>
</div><!-- .entry-header -->
<?php
downloadclub_page_wrapper_start();
?>
	<div class="container">
		<div id="primary" class="content-area row">
			<div id="main" class="site-main col-md-8">
				<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
				?>

			</div><!-- #main -->
			<div class="col-md-4">
				<?php get_sidebar();  ?>
			</div>
		</div><!-- #primary -->
	</div>
<?php
	downloadclub_page_wrapper_end();
get_footer();
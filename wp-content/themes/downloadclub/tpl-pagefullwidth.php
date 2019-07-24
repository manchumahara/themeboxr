<?php
	/*
	Template Name: Page Full Width
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
						<h2 class="h6">Design these templete thinking about categories, color, typography and latest treand</h2>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .entry-header -->
<?php
	downloadclub_page_wrapper_start();
?>
	<div class="section-padding">
		<div class="container">
			<div id="primary" class="content-area row">
				<div id="main" class="site-main col-md-12">
					<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							/*if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;*/

						endwhile; // End of the loop.
					?>

				</div><!-- #main -->
			</div><!-- #primary -->
		</div>
	</div>

<?php
	downloadclub_page_wrapper_end();
	get_footer();

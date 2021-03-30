<?php
/**
 * The template for displaying search results pages
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
                        <?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                        <h1 class="entry-title">
                            <?php
                            /* translators: %s: search query. */
                            printf(esc_html__('Search Results for: %s', 'downloadclub'), '<span>' . get_search_query() . '</span>');
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .entry-header -->
<?php
downloadclub_page_wrapper_start();
?>
    <section id="latest-blog-area" class="section-padding">
        <div class="container">
            <div class="latest-blog-container">
                <div class="row">
                    <?php if (have_posts()) : ?>
                        <?php
                        /* Start the Loop */
                        while (have_posts()) :
                            the_post();

                            /**
                             * Run the loop for the search to output the results.
                             * If you want to overload this in a child theme then include a file
                             * called content-search.php and that will be used instead.
                             */
                            get_template_part('template-parts/content', 'search');

                        endwhile;

                        //the_posts_navigation();
                        ?>
                        <?php if (function_exists('downloadclub_page_navi')) { // if expirimental feature is active ?>
                            <div class="pagination_wrap">
                                <?php downloadclub_page_navi(); // use the page navi function ?>
                            </div>
                        <?php } else { // if it is disabled, display regular wp prev & next links ?>
                            <div class="pagination_wrap">
                                <nav class="wp-prev-next">
                                    <ul class="pager">
                                        <li class="previous"><?php next_posts_link(_e('&laquo; Older Entries', 'downloadclub')) ?></li>
                                        <li class="next"><?php previous_posts_link(_e('Newer Entries &raquo;', 'downloadclub')) ?></li>
                                    </ul>
                                </nav>
                            </div>

                        <?php }

                    else :

                        get_template_part('template-parts/content', 'none');

                    endif;
                    ?>

                </div>
            </div>
        </div>
    </section>

<?php
downloadclub_page_wrapper_end();
get_footer();
<!--== Latest Blog Area Start ==-->
<?php
global $post;

$post_id = $id = $post->ID;
$post_title = get_the_title($post_id);
$post_link = get_permalink($post_id);

$content_url = content_url();
$author = get_the_author();
$time = get_the_time('jS M Y');

$thumburl = '';

if (file_exists(WP_CONTENT_DIR . '/uploads/productshots/' . $id . '/' . $id . '-profile.png')) {
    $thumburl = $content_url . '/uploads/productshots/' . $id . '/' . $id . '-profile.png';
} else if (file_exists(WP_CONTENT_DIR . '/uploads/productshots/' . $id . '/' . $id . '-profile.jpg')) {
    $thumburl = $content_url . '/uploads/productshots/' . $id . '/' . $id . '-profile.jpg';
} else if (has_post_thumbnail()) {

    $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'medium');
    $thumburl = isset($large_image_url[0]) ? $large_image_url[0] : '';

}

if ($thumburl == '') {
    $thumburl = get_template_directory_uri() . '/assets/images/blog/blog-1.jpg';
}

?>
<div class="col-lg-4 col-md-6">
    <article class="single-blog-item">
        <header class="blog-header">
            <figure class="blog-thumb">
                <a href="<?php echo esc_url($post_link); ?>"><img src="<?php echo $thumburl; ?>" alt="Themeboxr"/></a>
            </figure>

            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')); ?>"
               class="post-author"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/author.jpg"
                                        alt="Themeboxr"/></a>
        </header>

        <section class="blog-content">
            <h2 class="h6">
                <a href="<?php echo esc_url($post_link); ?>"><?php echo esc_html($post_title); ?></a>
            </h2>
            <a href="<?php echo esc_url($post_link); ?>" class="post-date"><?php echo $time; ?></a>

            <?php //echo $content_text; ?>
        </section>
    </article>
</div>

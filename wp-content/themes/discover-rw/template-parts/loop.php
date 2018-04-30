<?php
$layout = discover_rw_get_option('blog_layout');
$category = get_the_category();
$post_class = 'post-i';
foreach ($category as $cat) {
    $post_class .= ' '.$cat->slug;
}

if ($layout == 'full') {
    $img_size = 'discover_rw_820x820';
} else {
    $img_size = 'discover_rw_400x9999';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>" class="post-i-img">
            <?php the_post_thumbnail($img_size); ?>
        </a>
    <?php endif; ?>
    <p class="post-i-info">
        <span class="post-i-cat">
	        <?php if (get_post_type() == 'post') : ?>
                <?php foreach ($category as $key=>$cat) : ?>
                    <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"><?php echo esc_html($cat->name); ?></a><?php echo ($key+1<count($category)) ? ', ' : ''; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <span><?php echo esc_html(get_post_type()); ?></span>
            <?php endif; ?>
        </span>
        <?php if (get_post_type() == 'post') : ?>
        <time datetime="<?php echo get_the_date('Y-m-d H:i'); ?>"><?php the_date(); ?></time>
        <?php endif; ?>
    </p>
    <h3<?php
    $excerpt = get_the_excerpt();
    if (empty($excerpt)) echo ' class="post-i-noexcerpt"'; ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <div class="stylization">
        <?php the_excerpt(); ?>
        <?php if (!get_the_title()) echo '<a class="post-i-more" href="'.esc_url(get_the_permalink()).'">'.esc_html__('Read more', 'discover-rw').'</a>'; ?>
    </div>
</article>
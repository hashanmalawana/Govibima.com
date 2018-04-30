<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="GET" class="h-search">
    <button id="h-search-btn" class="h-search-btn" type="submit"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/search.png" alt="<?php esc_attr_e('Search', 'discover-rw'); ?>"><span class="h-search-btn-text"><?php esc_html_e('Search', 'discover-rw'); ?></span></button>
    <p class="h-search-cont">
        <input value="<?php echo get_search_query(); ?>" name="s" type="text" placeholder="<?php esc_attr_e('Search..', 'discover-rw'); ?>">
        <span class="h-search-close" id="h-search-close"></span>
    </p>
</form>
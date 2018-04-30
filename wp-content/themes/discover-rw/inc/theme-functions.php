<?php

// Excerpt More from "[...]" to "..."
function discover_rw_excerpt_more ($more) {
    if ( is_admin() ) {
        return $more;
    }
    return '...';
}
add_filter('excerpt_more', 'discover_rw_excerpt_more');

// New Excerpt Length
function discover_rw_new_excerpt_length($length) {
    if ( is_admin() ) {
        return $length;
    }

    global $post;
    if ($post->post_type == 'post') {
        return 20;
    }
    return 55;
}
add_filter('excerpt_length', 'discover_rw_new_excerpt_length');


// Comment Template
function discover_rw_comment($comment, $args, $depth){
?>
<li <?php comment_class('post-comment'); ?> id="li-comment-<?php comment_ID() ?>">
    <div id="comment-<?php comment_ID(); ?>" class="post-cmts-i">
        <p class="post-cmts-img">
            <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        </p>
        <h3 class="post-cmts-ttl"><?php echo get_comment_author_link() ?> <?php edit_comment_link('(Edit)', '  ', '') ?></h3>

        <time datetime="<?php comment_time( 'c' ); ?>"><a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
            <?php
            /* translators: 1: comment date, 2: comment time */
            printf( esc_html__( '%1$s at %2$s', 'discover-rw' ), get_comment_date( '', $comment ), get_comment_time() );
            ?>
        </a></time>

        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        <?php if ($comment->comment_approved == '0') : ?>
            <p><i><?php echo esc_html__( 'Your comment is awaiting moderation.', 'discover-rw' ); ?></i></p>
        <?php endif; ?>
        <?php comment_text() ?>
    </div>
    <?php
}




if (!function_exists('discover_rw_get_option')) {
    function discover_rw_get_option($key) {
        if (empty($key)) {
            return;
        }
        $value = '';
        $defaults = discover_rw_get_option_defaults();
        if (!empty($defaults[$key])) {
            $default_value = $defaults[$key];
        } else {
            $default_value = '';
        }

        if (!empty($default_value)) {
            $value = get_theme_mod($key, $default_value);
        } else {
            $value = get_theme_mod($key);
        }

        return $value;
    }
}

if (!function_exists('discover_rw_get_option_defaults')) {
    function discover_rw_get_option_defaults() {
        $defaults = array();

        // Blog
        $defaults['sidebar'] = 'sticky';
        $defaults['blog_layout'] = 'masonry';

        // Footer
        $defaults['copyright'] = esc_html__( 'Copyright &copy; All Rights Reserved', 'discover-rw' );
        
        // Colors
        $defaults['colors_links'] = '#48c1e8';
        $defaults['colors_dark'] = '#373d54';
        $defaults['colors_light'] = '#d7a556';
        $defaults['colors_text'] = '#616161';
        $defaults['colors_header_bg'] = '#ffffff';
        $defaults['colors_footer_bg'] = '#343a50';
        $defaults['colors_footer_widgets_bg'] = '#373d54';

        return $defaults;
    }
}






// Lightens/darkens a given colour
function discover_rw_color_luminance( $hex, $percent ) {

    // validate hex string

    $hex = preg_replace( '/[^0-9a-f]/i', '', $hex );
    $new_hex = '#';

    if ( strlen( $hex ) < 6 ) {
        $hex = $hex[0] + $hex[0] + $hex[1] + $hex[1] + $hex[2] + $hex[2];
    }

    // convert to decimal and change luminosity
    for ($i = 0; $i < 3; $i++) {
        $dec = hexdec( substr( $hex, $i*2, 2 ) );
        $dec = min( max( 0, $dec + $dec * $percent ), 255 );
        $new_hex .= str_pad( dechex( $dec ) , 2, 0, STR_PAD_LEFT );
    }

    return esc_html($new_hex);
}

/*
 * Select/radio santitization
 */
if ( ! function_exists( 'discover_rw_sanitize_select' ) ) :

    function discover_rw_sanitize_select( $input, $setting ) {

        // Ensure input is clean.
        $input = sanitize_text_field( $input );

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

    }

endif;

/*
 * Checkbox santitization
 */
if ( ! function_exists( 'discover_rw_sanitize_checkbox' ) ) :

    function discover_rw_sanitize_checkbox( $checked ) {

        return ( ( isset( $checked ) && true === $checked ) ? true : false );
    }

endif;

/*
 * Positive santitization
 */
if ( ! function_exists( 'discover_rw_sanitize_positive_integer' ) ) :

    /**
     * Sanitize positive integer.
     */
    function discover_rw_sanitize_positive_integer( $input, $setting ) {

        $input = absint( $input );

        // If the input is an absolute integer, return it.
        // otherwise, return the default.
        return ( $input ? $input : $setting->default );

    }

endif;
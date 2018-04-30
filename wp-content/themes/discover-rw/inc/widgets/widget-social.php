<?php
class Discover_RWSocialLinks_Widget extends WP_Widget {

    public function __construct() {

        parent::__construct(
            'discover_rwsociallinks_widget',
            esc_html__( 'Discover Social Links', 'discover-rw' ),
            array(
                'classname'   => 'discover_rwsociallinks_widget',
                'description' => esc_html__( 'Show Social Links', 'discover-rw' )
            )
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {

        extract( $args );


        $title = !empty( $instance['title'] ) ? $instance['title'] : '';

        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $size = esc_html($instance['size']);
        $style = esc_html($instance['style']);
        $facebook = esc_url($instance['facebook']);
        $twitter = esc_url($instance['twitter']);
        $google = esc_url($instance['google']);
        $linkedin = esc_url($instance['linkedin']);
        $vk = esc_url($instance['vk']);
        $pinterest = esc_url($instance['pinterest']);
        $tumblr = esc_url($instance['tumblr']);

        echo wp_kses_post($before_widget);

        if ( !empty($title) ) {
            echo wp_kses_post($before_title . $title . $after_title);
        }

        if (!empty($facebook) || !empty($twitter) || !empty($google) || !empty($linkedin) || !empty($vk) || !empty($pinterest) || !empty($tumblr))
        ?>
        <ul class="footer-socials<?php if (!empty($size)) echo ' footer-socials-'.esc_attr($size); else echo ' footer-socials-large'; ?><?php if (!empty($style)) echo ' footer-socials-'.esc_attr($style); else echo ' footer-socials-light'; ?>">
            <?php if (!empty($facebook)) : ?>
                <li>
                    <a rel="nofollow" target="_blank" href="<?php echo esc_url($facebook); ?>">
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (!empty($twitter)) : ?>
                <li>
                    <a rel="nofollow" target="_blank" href="<?php echo esc_url($twitter); ?>">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (!empty($google)) : ?>
                <li>
                    <a rel="nofollow" target="_blank" href="<?php echo esc_url($google); ?>">
                        <i class="fa fa-google-plus"></i>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (!empty($linkedin)) : ?>
                <li>
                    <a rel="nofollow" target="_blank" href="<?php echo esc_url($linkedin); ?>">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (!empty($vk)) : ?>
                <li>
                    <a rel="nofollow" target="_blank" href="<?php echo esc_url($vk); ?>">
                        <i class="fa fa-vk"></i>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (!empty($pinterest)) : ?>
                <li>
                    <a rel="nofollow" target="_blank" href="<?php echo esc_url($pinterest); ?>">
                        <i class="fa fa-pinterest"></i>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (!empty($tumblr)) : ?>
                <li>
                    <a rel="nofollow" target="_blank" href="<?php echo esc_url($tumblr); ?>">
                        <i class="fa fa-tumblr"></i>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
        <?php

        echo wp_kses_post($after_widget);

    }


    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['size'] = sanitize_text_field( $new_instance['size'] );
        $instance['style'] = sanitize_text_field( $new_instance['style'] );
        $instance['facebook'] = esc_url_raw( $new_instance['facebook'] );
        $instance['twitter'] = esc_url_raw( $new_instance['twitter'] );
        $instance['google'] = esc_url_raw( $new_instance['google'] );
        $instance['linkedin'] = esc_url_raw( $new_instance['linkedin'] );
        $instance['vk'] = esc_url_raw( $new_instance['vk'] );
        $instance['pinterest'] = esc_url_raw( $new_instance['pinterest'] );
        $instance['tumblr'] = esc_url_raw( $new_instance['tumblr'] );

        return $instance;

    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {

        $size_values = array(
            'small' => esc_html__('Small', 'discover-rw'),
            'medium' => esc_html__('Medium', 'discover-rw'),
            'large' => esc_html__('Large', 'discover-rw'),
        );
        if (!empty($instance['size'])) {
            $size = esc_attr( $instance['size'] );
        } else {
            $size = '';
        }
        $style_values = array(
            'light' => esc_html__('Light', 'discover-rw'),
            'dark' => esc_html__('Dark', 'discover-rw'),
        );
        if (!empty($instance['style'])) {
            $style = esc_attr( $instance['style'] );
        } else {
            $style = '';
        }
        if (!empty($instance['facebook'])) {
            $facebook = esc_attr( $instance['facebook'] );
        } else {
            $facebook = '';
        }
        if (!empty($instance['twitter'])) {
            $twitter = esc_attr( $instance['twitter'] );
        } else {
            $twitter = '';
        }
        if (!empty($instance['google'])) {
            $google = esc_attr( $instance['google'] );
        } else {
            $google = '';
        }
        if (!empty($instance['linkedin'])) {
            $linkedin = esc_attr( $instance['linkedin'] );
        } else {
            $linkedin = '';
        }
        if (!empty($instance['vk'])) {
            $vk = esc_attr( $instance['vk'] );
        } else {
            $vk = '';
        }
        if (!empty($instance['pinterest'])) {
            $pinterest = esc_attr( $instance['pinterest'] );
        } else {
            $pinterest = '';
        }
        if (!empty($instance['tumblr'])) {
            $tumblr = esc_attr( $instance['tumblr'] );
        } else {
            $tumblr = '';
        }
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('size')); ?>"><?php esc_html_e('Size', 'discover-rw'); ?></label>
            <select class="widefat" name="<?php echo esc_attr($this->get_field_name('size')); ?>" id="<?php echo esc_attr($this->get_field_id('size')); ?>">
                <?php foreach ($size_values as $key=>$val) : ?>
                <option value="<?php echo esc_attr($key); ?>"<?php if ($key == $size) echo ' selected'; ?>><?php echo esc_html($val); ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('style')); ?>"><?php esc_html_e('Style', 'discover-rw'); ?></label>
            <select class="widefat" name="<?php echo esc_attr($this->get_field_name('style')); ?>" id="<?php echo esc_attr($this->get_field_id('style')); ?>">
                <?php foreach ($style_values as $key=>$val) : ?>
                <option value="<?php echo esc_attr($key); ?>"<?php if ($key == $style) echo ' selected'; ?>><?php echo esc_html($val); ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>"><?php esc_html_e('Facebook Link', 'discover-rw'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" type="text" value="<?php echo esc_url($facebook); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php esc_html_e('Twitter Link', 'discover-rw'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" type="text" value="<?php echo esc_url($twitter); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('google')); ?>"><?php esc_html_e('Google Plus', 'discover-rw'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('google')); ?>" name="<?php echo esc_attr($this->get_field_name('google')); ?>" type="text" value="<?php echo esc_url($google); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkedin')); ?>"><?php esc_html_e('Linkedin', 'discover-rw'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" type="text" value="<?php echo esc_url($linkedin); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('vk')); ?>"><?php esc_html_e('Vkontakte', 'discover-rw'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('vk')); ?>" name="<?php echo esc_attr($this->get_field_name('vk')); ?>" type="text" value="<?php echo esc_url($vk); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('pinterest')); ?>"><?php esc_html_e('Pinterest', 'discover-rw'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" type="text" value="<?php echo esc_url($pinterest); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('tumblr')); ?>"><?php esc_html_e('Tumblr', 'discover-rw'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('tumblr')); ?>" name="<?php echo esc_attr($this->get_field_name('tumblr')); ?>" type="text" value="<?php echo esc_url($tumblr); ?>" />
        </p>
        <?php
    }

}

/* Register the widget */
function discover_rw_register_widget_sociallinks () {
    register_widget( 'Discover_RWSocialLinks_Widget' );
}
add_action( 'widgets_init', 'discover_rw_register_widget_sociallinks' );
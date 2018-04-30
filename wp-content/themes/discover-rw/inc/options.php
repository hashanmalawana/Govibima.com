<?php
global $wp_customize;
$defaults = discover_rw_get_option_defaults();



/*
 * Colors - Links
 */
$wp_customize->add_setting('colors_links', array(
    'default' 			=> $defaults['colors_links'],
    'sanitize_callback' => 'sanitize_hex_color'
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'colors_links',
        array(
            'label'       => esc_html__( 'Links', 'discover-rw' ),
            'settings'    => 'colors_links',
            'section'     => 'colors',
            'priority' => 10,
        )
    )
);

/*
 * Colors - Dark
 */
$wp_customize->add_setting('colors_dark', array(
    'default' 			=> $defaults['colors_dark'],
    'sanitize_callback' => 'sanitize_hex_color'
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'colors_dark',
        array(
            'label'       => esc_html__( 'Dark Color', 'discover-rw' ),
            'settings'    => 'colors_dark',
            'section'     => 'colors',
            'priority' => 10,
        )
    )
);

/*
 * Colors - Light
 */
$wp_customize->add_setting('colors_light', array(
    'default' 			=> $defaults['colors_light'],
    'sanitize_callback' => 'sanitize_hex_color'
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'colors_light',
        array(
            'label'       => esc_html__( 'Light Color', 'discover-rw' ),
            'settings'    => 'colors_light',
            'section'     => 'colors',
            'priority' => 10,
        )
    )
);

/*
 * Colors - Text
 */
$wp_customize->add_setting('colors_text', array(
    'default' 			=> $defaults['colors_text'],
    'sanitize_callback' => 'sanitize_hex_color'
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'colors_text',
        array(
            'label'       => esc_html__( 'Text Color', 'discover-rw' ),
            'settings'    => 'colors_text',
            'section'     => 'colors',
            'priority' => 10,
        )
    )
);

/*
 * Header BG Color
 */
$wp_customize->add_setting('colors_header_bg', array(
    'default' 			=> $defaults['colors_header_bg'],
    'sanitize_callback' => 'sanitize_hex_color',
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'colors_header_bg',
        array(
            'label'       => esc_html__( 'Header Background Color', 'discover-rw' ),
            'settings'    => 'colors_header_bg',
            'section'     => 'colors',
            'priority' => 10,
        )
    )
);

/*
 * Footer BG Color
 */
$wp_customize->add_setting('colors_footer_bg', array(
    'default' 			=> $defaults['colors_footer_bg'],
    'sanitize_callback' => 'sanitize_hex_color',
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'colors_footer_bg',
        array(
            'label'       => esc_html__( 'Footer Background Color', 'discover-rw' ),
            'settings'    => 'colors_footer_bg',
            'section'     => 'colors',
            'priority' => 10,
        )
    )
);

/*
 * Footer Widgets Area BG Color
 */
$wp_customize->add_setting('colors_footer_widgets_bg', array(
    'default' 			=> $defaults['colors_footer_widgets_bg'],
    'sanitize_callback' => 'sanitize_hex_color',
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'colors_footer_widgets_bg',
        array(
            'label'       => esc_html__( 'Footer Widgets Area Background Color', 'discover-rw' ),
            'settings'    => 'colors_footer_widgets_bg',
            'section'     => 'colors',
            'priority' => 10,
        )
    )
);


/*
 * Theme Options Panel
 */
$wp_customize->add_panel(
    'theme_options',
    array(
        'title'	=> esc_html__('Theme Options', 'discover-rw'),
        'priority' 			=> 10
    )
);

/*
 * Blog
 */
$wp_customize->add_section( 'section_blog',
    array(
        'title'      => esc_html__( 'Blog', 'discover-rw' ),
        'priority'   => 10,
        'panel'      => 'theme_options',
    )
);

/*
 * Blog Sidebar
 */
$wp_customize->add_setting(
    'sidebar',
    array(
        'default'           => $defaults['sidebar'],
        'sanitize_callback' => 'discover_rw_sanitize_select'
    )
);
$wp_customize->add_control(
    'sidebar',
    array(
        'type'     => 'radio',
        'label'       => esc_html__('Sidebar', 'discover-rw'),
        'section'     => 'section_blog',
        'choices'  => array(
            'sticky'  => esc_html__( 'Sticky', 'discover-rw' ),
            'show' => esc_html__( 'Show', 'discover-rw' ),
            'hide'    => esc_html__( 'Hide', 'discover-rw' ),
        ),
    )
);

/*
 * Blog Layout
 */
$wp_customize->add_setting(
    'blog_layout',
    array(
        'default'           => $defaults['blog_layout'],
        'sanitize_callback' => 'discover_rw_sanitize_select'
    )
);
$wp_customize->add_control(
    'blog_layout',
    array(
        'type'     => 'radio',
        'label'       => esc_html__('Layout', 'discover-rw'),
        'section'     => 'section_blog',
        'choices'  => array(
            'masonry'  => esc_html__( 'Masonry 3 columns', 'discover-rw' ),
            'masonry2' => esc_html__( 'Masonry 2 columns', 'discover-rw' ),
            'full'    => esc_html__( 'Full Width', 'discover-rw' ),
        ),
    )
);


/*
 * Footer
 */
$wp_customize->add_section( 'section_footer',
    array(
        'title'      => esc_html__( 'Footer', 'discover-rw' ),
        'priority'   => 10,
        'panel'      => 'theme_options',
    )
);

/*
 * Footer Copyright
 */
$wp_customize->add_setting(
    'copyright',
    array(
        'default'           => $defaults['copyright'],
        'sanitize_callback' => 'sanitize_text_field'
    )
);
$wp_customize->add_control(
    'copyright',
    array(
        'type'     => 'text',
        'label'       => esc_html__('Copyright', 'discover-rw'),
        'section'     => 'section_footer',
    )
);
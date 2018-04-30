<?php

if ( !function_exists( 'discover_rw_dynamic_options' ) ) :

    function discover_rw_dynamic_options(){

        $colors_links = discover_rw_get_option( 'colors_links' );
        $colors_dark = discover_rw_get_option( 'colors_dark' );
        $colors_light = discover_rw_get_option( 'colors_light' );
        $colors_text = discover_rw_get_option( 'colors_text' );
        $colors_header_bg = discover_rw_get_option( 'colors_header_bg' );
        $colors_footer_bg = discover_rw_get_option( 'colors_footer_bg' );
        $colors_footer_widgets_bg = discover_rw_get_option( 'colors_footer_widgets_bg' );

        $bg_color = get_background_color();
        $bg_image = get_background_image();

        $header_image = get_header_image();
        ?>
        <style>
            body {
                <?php if (!empty($bg_color)) : ?>
                background-color: <?php echo esc_attr($bg_color); ?>;
                <?php endif; ?>
                <?php if (!empty($bg_image)) : ?>
                background-image: url(<?php echo esc_url($bg_image); ?>);
                <?php endif; ?>
                -webkit-background-size: cover;
                background-size: cover;
                background-attachment: fixed;
                background-position: center center;
                background-repeat: repeat;
            }

            body .header-wrap {
            <?php if (!empty($header_image)) : ?>
                background-image: url(<?php echo esc_url($header_image); ?>);
            <?php endif; ?>
            <?php if (!empty($colors_header_bg)) : ?>
                background-color: <?php echo esc_attr($colors_header_bg); ?>;
            <?php endif; ?>
            }

            body .footer-wrap {
            <?php if (!empty($colors_footer_widgets_bg)) : ?>
                background: <?php echo esc_attr($colors_footer_widgets_bg); ?>;
            <?php endif; ?>
            }
            body .footer-copyright {
            <?php if (!empty($colors_footer_bg)) : ?>
                background: <?php echo esc_attr($colors_footer_bg); ?>;
            <?php endif; ?>
            }

            /* Links Color */
            .stylization a,
            .post-rel .post-rel-info .post-rel-cat,
            .post-rel .post-rel-info a,
            .posts-top li .posts-top-cat,
            .posts-top li .posts-top-info a,
            .post-tags a,
            .footer .footer-socials li a:hover,
            .footer-copyright a:hover {
                color: <?php echo esc_attr($colors_links); ?>;
            }
            .stylization a:hover,
            .stylization blockquote:before,
            .stylization blockquote:after,
            .post-rel .post-rel-info a:hover,
            .posts-top li .posts-top-info a:hover,
            .post-tags a:hover {
                border-color: <?php echo esc_attr($colors_links); ?>;
            }
            .stylization mark,
            .stylization ins {
                background: <?php echo esc_attr($colors_links); ?>;
            }
            /* Links Color */

            /* Color Dark */
            h1, h2, h3, h4, h5, h6 {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .stylization h1,
            .stylization h2,
            .stylization h3,
            .stylization h4,
            .stylization h5,
            .stylization h6 {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .stylization strong,
            .stylization b {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .stylization code {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .stylization pre {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .stylization blockquote p {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .stylization cite {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .stylization dt {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .stylization table {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .stylization input[type=email],
            .stylization input[type=tel],
            .stylization input[type=search],
            .stylization input[type=password],
            .stylization input[type=text] {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .stylization textarea {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .stylization button,
            .stylization input[type=submit] {
                background: <?php echo esc_attr($colors_dark); ?>;
            }
            .stylization button:hover,
            .stylization input[type=submit]:hover {
                background: <?php echo esc_attr(discover_rw_color_luminance($colors_dark, '-0.05')); ?>;
            }
            .header .h-menu li a {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .header .h-menu li a:hover {
                border-color: <?php echo esc_attr($colors_dark); ?>;
            }
            body.menu-opened .mainmenu-close-line {
                background: <?php echo esc_attr($colors_dark); ?>;
            }
            .mainmenu > ul > li > a {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .mainmenu > ul > li ul li a {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .mainmenu > ul > li ul li > a >.fa {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .post-rel-cont .post-rel-all {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .post-rel-cont .post-rel-all:hover {
                border-color: <?php echo esc_attr($colors_dark); ?>;
            }
            .post-rel h3 a {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .fr-posts-wrap .fr-posts-sections li a {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .fr-posts-wrap .fr-posts-sections li.active a:hover,
            .fr-posts-wrap .fr-posts-sections li.current-cat a:hover,
            .fr-posts-wrap .fr-posts-sections li a:hover {
                border-color: <?php echo esc_attr($colors_dark); ?>;
            }
            .maincont .post-list-show {
                background: <?php echo esc_attr($colors_dark); ?>;
            }
            .maincont .post-list-show:hover {
                background: <?php echo esc_attr(discover_rw_color_luminance($colors_dark, '-0.05')); ?>;
            }
            .maincont .post-list-show.loading {
                background: <?php echo esc_attr(discover_rw_color_luminance($colors_dark, '-0.05')); ?>;
            }
            .posts-top li h4 a {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            div.zabuto_calendar .table tr td div.day {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            div.zabuto_calendar .table tr td.event div.day,
            div.zabuto_calendar ul.legend li.event {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .post-list .post-i h3 a {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .post-list .post-i .stylization h2 {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .page-title {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .post-top.post-top-nophoto .post-ttl h1 {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .maincont .post-cmts-more {
                background: <?php echo esc_attr($colors_dark); ?>;
            }
            .post-cmts-more:hover {
                background: <?php echo esc_attr(discover_rw_color_luminance($colors_dark, '-0.05')); ?>;
            }
            .gallery-wrap .gallery-sections li a {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .gallery-wrap .gallery-sections li.active a:hover,
            .gallery-wrap .gallery-sections li.current-cat a:hover,
            .gallery-wrap .gallery-sections li a:hover {
                border-color: <?php echo esc_attr($colors_dark); ?>;
            }
            .gallery-wrap .gallery-list-show {
                background: <?php echo esc_attr($colors_dark); ?>;
            }
            .gallery-wrap .gallery-list-show {
                background: <?php echo esc_attr($colors_dark); ?>;
            }
            .gallery-wrap .gallery-list-show:hover {
                background: <?php echo esc_attr(discover_rw_color_luminance($colors_dark, '-0.05')); ?>;
            }
            .gallery-wrap .gallery-list-show.loading {
                background: <?php echo esc_attr(discover_rw_color_luminance($colors_dark, '-0.05')); ?>;
            }
            .contacts-cont .contacts-col a {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .contacts-cont .contacts-col form input[type=tel],
            .contacts-cont .contacts-col form input[type=email],
            .contacts-cont .contacts-col form input[type=text] {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .contacts-cont .contacts-col form textarea {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .contacts-cont .contacts-col form input[type=submit] {
                background: <?php echo esc_attr($colors_dark); ?>;
                color: #ffffff;
            }
            .contacts-cont .contacts-col form input[type=submit]:hover {
                background: <?php echo esc_attr(discover_rw_color_luminance($colors_dark, '-0.05')); ?>;
            }
            .team-list .team-i .team-i-link {
                background: <?php echo esc_attr($colors_dark); ?>;
            }
            .team-list .team-i .team-i-link:hover {
                background: <?php echo esc_attr(discover_rw_color_luminance($colors_dark, '-0.05')); ?>;
            }
            .posts_carousel-i .posts_carousel-noimg .posts_carousel-info time {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .posts_carousel-i .posts_carousel-noimg .posts_carousel-cmts {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .posts_carousel-i .posts_carousel-noimg .posts_carousel-ttl {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .posts_carousel-i .posts_carousel-noimg .posts_carousel-ttl a {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .posts_slider-i .posts_slider-noimg .posts_slider-info time {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .posts_slider-i .posts_slider-noimg .posts_slider-ttl {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .posts_slider-i .posts_slider-noimg .posts_slider-ttl a {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .posts_slider-wrap .posts_slider-next,
            .posts_slider-wrap .posts_slider-prev {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .pricing-list .pricing-i {
                border-top: 6px solid <?php echo esc_attr($colors_dark); ?>;
            }
            .pricing-list .pricing-i .pricing-i-price {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .pricing-list.style_2 .pricing-i h3 {
                background: <?php echo esc_attr($colors_dark); ?>;
            }
            .promobox-i:not(.promobox-i-hasimg):after {
                background: <?php echo esc_attr($colors_dark); ?>;
            }
            .promobox-i .promobox-i-link {
                background: <?php echo esc_attr($colors_dark); ?>;
            }
            .promobox-i .promobox-i-link:hover {
                background: <?php echo esc_attr(discover_rw_color_luminance($colors_dark, '-0.1')); ?>;
            }
            .promobox-i.promobox-i-dark {
                background: <?php echo esc_attr($colors_dark); ?>;
                border-color: <?php echo esc_attr($colors_dark); ?>;
            }
            .promobox-i.promobox-i-dark .promobox-i-link {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .promobox-i.promobox-i-dark .wpcf7 input[type=submit] {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .content_carousel-cont h3 {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .content_carousel-cont .content_carousel-link {
                background: <?php echo esc_attr($colors_dark); ?>;
            }
            .content_carousel-cont .content_carousel-link:hover {
                background: <?php echo esc_attr(discover_rw_color_luminance($colors_dark, '-0.1')); ?>;
            }
            .content_carousel-wrap .bx-wrapper .bx-pager .bx-pager-link.active {
                background: <?php echo esc_attr($colors_dark); ?>;
            }
            .content_carousel-wrap.content_carousel-dark .content_carousel-slide {
                border-color: <?php echo esc_attr($colors_dark); ?>;
                background: <?php echo esc_attr($colors_dark); ?>;
            }
            .content_carousel-dark .wpcf7 input[type=submit] {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .content_carousel-dark .content_carousel-link {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .block_bg-wrap.block_bg-noimg h2,
            .block_bg-wrap.block_bg-dark h2 {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .maincont .page-numbers li .prev:after {
                background: <?php echo esc_attr($colors_dark); ?>;
            }
            .maincont .page-numbers li .next:after {
                background: <?php echo esc_attr($colors_dark); ?>;
            }
            .maincont .page-numbers li span {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .maincont .page-numbers li span.current:after {
                background: <?php echo esc_attr($colors_dark); ?>;
            }
            .maincont .page-numbers li span.dots {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .maincont .page-numbers li a {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .maincont .page-numbers li a:after {
                background: <?php echo esc_attr($colors_dark); ?>;
            }
            .maincont .page-numbers li a:hover {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .err404 .err404-ttl {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .footer-wrap {
                background: <?php echo esc_attr($colors_dark); ?>;
            }



            .mainmenu > ul > li.menu-item-has-children > a > .fa {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .post-top.post-top-nophoto .post-ttl h1 {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .header .h-menu > ul > li.menu-item-has-children:after {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            .header .h-menu > ul > li > ul:after {
                color: <?php echo esc_attr($colors_dark); ?>;
            }
            /* Color Dark */

            
            
            /* Color Light */
            .mainmenu > ul > li.active > a,
            .mainmenu > ul > li > a:hover,
            .mainmenu > ul > li:hover > a,
            .mainmenu > ul > li ul li.active > a,
            .mainmenu > ul > li ul li > a:hover,
            .mainmenu > ul > li ul li > a >.fa:hover,
            .post-top .post-ttl .post-ttl-info .post-ttl-cat,
            .post-top .post-ttl .post-ttl-info a,
            .post-top .post-ttl .post-ttl-prev a:hover,
            .post-top .post-ttl .post-ttl-next a:hover,
            .post-cmts .post-cmts-form button:hover,
            .post-cmts .post-cmts-form input[type=submit]:hover {
                color: <?php echo esc_attr($colors_light); ?>;
            }
            .post-top .post-ttl .post-ttl-info a:hover {
                border-color: <?php echo esc_attr($colors_light); ?>;
            }
            body.menu-opened .mainmenu-close:hover .mainmenu-close-line {
                background: <?php echo esc_attr($colors_light); ?>;
            }
            .pricing-list .pricing-i .pricing-i-action {
                background-color: <?php echo esc_attr($colors_light); ?>;
            }
            .pricing-list .pricing-i .pricing-i-action:hover {
                background-color: <?php echo esc_attr(discover_rw_color_luminance($colors_light, '-0.05')); ?>;
            }
            /* Color Light */

            /* Color Text */
            body,
            .maincont,
            .stylization,
            .pricing-list .pricing-i,
            .promobox-i,
            .testimonials-i .testimonials-i-cont,
            .block_bg-wrap.block_bg-dark,
            .block_bg-wrap.block_bg-noimg,
            .block_bg-wrap.block_bg-noimg p,
            .block_bg-wrap.block_bg-dark p {
                color: <?php echo esc_attr($colors_text); ?>;
            }
            /* Color Text */
        </style>

    <?php }

endif;

add_action( 'wp_head', 'discover_rw_dynamic_options' );

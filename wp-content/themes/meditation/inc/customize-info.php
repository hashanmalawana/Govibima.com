<?php
/**
 * Add new fields to customizer, create panel 'Info'
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 * @since Meditation 1.0.0
 */
 
function meditation_customize_register_info( $wp_customize ) {

	class Meditation_Customize_Button_Control extends WP_Customize_Control {
		public $type = 'button';
	 
		/**
		 * Render the control's content.
		 *
		 * Allows the content to be overriden without having to rewrite the wrapper.
		 *
		 * @since Meditation 1.0.0
		 */
		public function render_content() {
			?>
			<form>
			<input type="button" value="<?php echo esc_attr( $this->label ); ?>" onclick="window.open('<?php echo esc_js( $this->value() ); ?>')" />
			</form>
			<?php
		}
	}

	class Meditation_Customize_Donate_Control extends WP_Customize_Control {
		public $type = 'donate';
	 
		/**
		 * Render the control's content.
		 *
		 * Allows the content to be overriden without having to rewrite the wrapper.
		 *
		 * @since Meditation 1.1.0
		 */
		public function render_content() {
			?>
			<p>
			<?php
				_e( 'Hi! Thank you for using Meditation! Help to the author by donation!', 'meditation' );
			?>
			</p>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
				">
				<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypalobjects.com/ru_RU/i/scr/pixel.gif" width="1" height="1">
				</form>
			<?php
			_e( 'Send your questions to WordPress support forums or directly to the author at infowpblogs@gmail.com', 'meditation' );

		}
	}

	$defaults = meditation_get_defaults();
	
	$wp_customize->add_section( 'donate', array(
		'title'          => __( 'Donate', 'meditation' ),
		'priority'       => 0,
	) );
	
	$wp_customize->add_setting( 'donate', array(
		'type'			 => 'empty',
		'default'        => '',
		'sanitize_callback' => 'Meditation_sanitize_url'
	) );
	
	$wp_customize->add_control( new Meditation_Customize_Donate_Control( $wp_customize, 'donate', array(
		'label'   => __( 'Donate', 'meditation' ),
		'description'   => __( 'Donate', 'meditation' ),
		'section' => 'donate',
		'settings'   => 'donate',
		'priority'   => 1,
	) ) );
	
//Support button
	$wp_customize->add_setting( 'support_url', array(
		'type'			 => 'empty',
		'default'        => 'https://wordpress.org/support/theme/meditation',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'meditation_sanitize_url'
	) );
	
	$wp_customize->add_control( new Meditation_Customize_Button_Control( $wp_customize, 'support_url', array(
		'label'   => __( 'View Support forum', 'meditation' ),
		'description'   => __( 'View Support forum', 'meditation' ),
		'section' => 'donate',
		'settings'   => 'support_url',
		'priority'   => 10,
	) ) );
	
// How to use
	$wp_customize->add_setting( 'howto', array(
		'type'			 => 'empty',
		'default'        => 'http://wpblogs.ru/themes/meditation-documentation/',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'meditation_sanitize_url'
	) );
	
	$wp_customize->add_control( new Meditation_Customize_Button_Control( $wp_customize, 'howto', array(
		'label'   => __( 'View Documentation', 'meditation' ),
		'description'   => __( 'Open', 'meditation' ),
		'section' => 'donate',
		'settings'   => 'howto',
		'priority'   => 20,
	) ) );
}
add_action( 'customize_register', 'meditation_customize_register_info' );
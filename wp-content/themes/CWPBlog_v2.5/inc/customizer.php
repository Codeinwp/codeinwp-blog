<?php
/**
 * codeinwp Theme Customizer
 *
 * @package codeinwp
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cwp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/* Header*/
	$wp_customize->add_section( 'cwp_header' , array(
    	'title'       => __( 'Header', 'cwp' ),
    	'priority'    => 150,
	) );
		/* Header -  Logo */
		$wp_customize->add_setting( 'cwp_header_logo' );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
		    'label'    => __( 'Header - Logo:', 'cwp' ),
		    'section'  => 'cwp_header',
		    'settings' => 'cwp_header_logo',
		    'priority' => '1',
		) ) );
		/* Header - Facebook Link */
		$wp_customize->add_setting( 'cwp_header_facebook' );
		$wp_customize->add_control( 'cwp_header_facebook', array(
		    'label'    => __( 'Header - Facebook Link:', 'cwp' ),
		    'section'  => 'cwp_header',
		    'settings' => 'cwp_header_facebook',
			'priority' => '2',
		) );
		/* Header - Twitter Link */
		$wp_customize->add_setting( 'cwp_header_twitter' );
		$wp_customize->add_control( 'cwp_header_twitter', array(
		    'label'    => __( 'Header - Twitter Link:', 'cwp' ),
		    'section'  => 'cwp_header',
		    'settings' => 'cwp_header_twitter',
			'priority' => '2',
		) );
	/* Footer*/
	$wp_customize->add_section( 'cwp_footer' , array(
    	'title'       => __( 'Footer', 'cwp' ),
    	'priority'    => 200,
	) );
		/* Footer - Phone Number */
		$wp_customize->add_setting( 'cwp_footer_phone_number' );
		$wp_customize->add_control( 'cwp_footer_phone_number', array(
		    'label'    => __( 'Footer - Phone Number:', 'cwp' ),
		    'section'  => 'cwp_footer',
		    'settings' => 'cwp_footer_phone_number',
			'priority' => '2',
		) );
		/* Footer - Email */
		$wp_customize->add_setting( 'cwp_footer_email' );
		$wp_customize->add_control( 'cwp_footer_email', array(
		    'label'    => __( 'Footer - Email:', 'cwp' ),
		    'section'  => 'cwp_footer',
		    'settings' => 'cwp_footer_email',
			'priority' => '2',
		) );
		
	/* Inner pages*/
	$wp_customize->add_section( 'cwp_innerpages' , array(
    	'title'       => __( 'Inner Pages', 'cwp' ),
    	'priority'    => 250,
	) );
		/* Footer - Phone Number */
		$wp_customize->add_setting( 'cwp_relatedtext' );
		$wp_customize->add_control( 'cwp_relatedtext', array(
		    'label'    => __( 'Related posts section title:', 'cwp' ),
		    'section'  => 'cwp_innerpages',
		    'settings' => 'cwp_relatedtext',
			'priority' => '2',
		) );
}
add_action( 'customize_register', 'cwp_customize_register' );


if( class_exists( 'WP_Customize_Control' ) ):
class Example_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
        </label>
        <?php
    }
}
endif;










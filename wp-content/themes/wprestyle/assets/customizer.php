<?php
/**
 * wprestyle Theme Customizer
 *
 * @package wprestyle
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wprestyle_customize_register( $wp_customize ) {
	// Add custom description to Colors and Background sections.
	$wp_customize->get_section( 'colors' )->description         = __( 'Background color is only visible on transparent section(s) in the absence of background image.', 'wprestyle' );
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	// Rename the label to "Site Title & Tagline" To be extra clear of the options.
	$wp_customize->get_section( 'title_tagline' )->title = __( 'Site Title & Tagline', 'wprestyle' );
	// Rename the label to "Site Title Color" because this only affects the site title in this theme.
	$wp_customize->get_control( 'blogdescription' )->label = __( 'Site Description - Tagline', 'wprestyle' );

	// Rename the label to "Display Site Title & Tagline" in order to make this option extra clear.
	$wp_customize->get_control( 'display_header_text' )->label = __( 'Display Site Title', 'wprestyle' );

	// Setting group for social icons
    $wp_customize->add_section( 'wprestyle_theme_notes' , array(
		'title'       => __('WPRestyle Theme Notes','wprestyle'),
		'description' => sprintf( __( 'Welcome & thank you for choosing WPRestyle as your site theme. In this section you\'ll find some helpful hints and tips to help you configure your site quickly and easily.
		<br/><br/> <b>Social Icons</b> are configurable via a custom menu. To set up your social profile visit the Appearance >><a href="%1$s"> Menu section</a>, enter your profile urls and add them to the "Social" Menu Location.
		<br/><br/><a href="%2$s" target="_blank" />View Theme Demo</a> | <a href="%3$s" target="_blank" />Get Theme Support</a> ', 'wprestyle' ), admin_url( '/nav-menus.php' ), esc_url('http://www.wpstrapcode.com/blog/wprestyle/'), esc_url('http://wordpress.org/support/theme/wprestyle') ),
		'priority'    => 30,
    ) );
	
	$wp_customize->add_section( 'wprestyle_intro_options' , array(
       'title'       => __('WPRestyle CTA Options','wprestyle'),
	   'description' => sprintf( __( 'Use the following settings to control the Intro section.', 'wprestyle' )),
       'priority'    => 33,
    ) );
	
	$wp_customize->add_section( 'wprestyle_services_options' , array(
       'title'       => __('WPRestyle Services Options','wprestyle'),
	   'description' => sprintf( __( 'Use the following settings to control the Service Boxes section.', 'wprestyle' )),
       'priority'    => 35,
    ) );
				
	$wp_customize->add_section( 'wprestyle_blogfeed_options' , array(
       'title'       => __('WPRestyle Blog Feed Options','wprestyle'),
	   'description' => sprintf( __( 'Use the following settings to set Frontpage/Blog home feed layout.', 'wprestyle' )),
       'priority'    => 38,
    ) );
		
	/**
       * Adds textarea support to the theme customizer
    */
    class wprestyle_Customize_Textarea_Control extends WP_Customize_Control {
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
	
    // Intro Section Settings
	$wp_customize->add_setting(
        'wprestyle_home_intro_visibility', array (
		'sanitize_callback' => 'wprestyle_sanitize_checkbox',
		'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(
        'wprestyle_home_intro_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Hide the entire home page intro section?', 'wprestyle'),
        'section'  => 'wprestyle_intro_options',
		'priority' => 1,
        )
    );
	
	$wp_customize->add_setting(
        'wprestyle_intro_text_visibility', array (
		'sanitize_callback' => 'wprestyle_sanitize_checkbox',
		'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(
        'wprestyle_intro_text_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Hide just the home page intro text?', 'wprestyle'),
        'section'  => 'wprestyle_intro_options',
		'priority' => 1,
        )
    );
			
	$wp_customize->add_setting( 
	    'wprestyle_intro_text',
    array(
        'default' => '',
		'sanitize_callback' => 'wprestyle_sanitize_textarea',
		'capability' => 'edit_theme_options',
    ));		

    $wp_customize->add_control(
        new wprestyle_Customize_Textarea_Control(
            $wp_customize,
            'wprestyle_intro_text',
        array(
            'label'    => __('Home Intro Text', 'wprestyle'),
            'section'  => 'wprestyle_intro_options',
			'priority' => 2,
            'settings' => 'wprestyle_intro_text',
        )
        )
    );
	
	//  Intro Image Upload
    $wp_customize->add_setting('wprestyle_intro_image', array(
        'default-image'  => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
    ));
 
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'wprestyle_intro_image',
            array(
               'label'    => __( 'Upload Intro Image', 'wprestyle' ),
               'section'  => 'wprestyle_intro_options',
			   'priority' => 3,
               'settings' => 'wprestyle_intro_image',
            )
        )
    );
	
	$wp_customize->add_setting(
        'wprestyle_intro_image_alttext', array (
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
    'wprestyle_intro_image_alttext',
    array(
        'type' => 'text',
		'default' => '',
        'label' => __('Enter Image Alt Text Here', 'wprestyle'),
        'section' => 'wprestyle_intro_options',
		'priority' => 4,
        )
    );
	
	$wp_customize->add_setting(
        'wprestyle_intro_button_visibility', array (
		'sanitize_callback' => 'wprestyle_sanitize_checkbox',
		'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(
        'wprestyle_intro_button_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Hide CTA Buttons?', 'wprestyle'),
        'section'  => 'wprestyle_intro_options',
		'priority' => 5,
        )
    );
		
	$wp_customize->add_setting(
        'wprestyle_purchase_left_text',
    array(
        'default' => __('Learn more', 'wprestyle'),
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
        'wprestyle_purchase_left_text',
    array(
        'label'     => __('Home Intro Left Button Text', 'wprestyle'),
        'section'   => 'wprestyle_intro_options',
		'priority'  => 6,
        'type'      => 'text',
    ));
	
	$wp_customize->add_setting(
        'wprestyle_purchase_left_url',
    array(
        'default' => '#',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
        'wprestyle_purchase_left_url',
    array(
        'label'    => __('Home Intro Learn Button Link', 'wprestyle'),
        'section'  => 'wprestyle_intro_options',
		'priority' => 7,
        'type'     => 'text',
    ));
	
	$wp_customize->add_setting( 'wprestyle_purchase_left_url_target', array(
		'default' => '_self',
		'sanitize_callback' => 'wprestyle_sanitize_target_url',
		'capability' => 'edit_theme_options',
	) );
	
	$wp_customize->add_control( 'wprestyle_purchase_left_url_target', array(
        'label'   => __( 'Learn More Url Window Target', 'wprestyle' ),
        'section' => 'wprestyle_intro_options',
	    'priority' => 8,
        'type'    => 'radio',
        'choices' => array(
             '_self'   => __( 'Open Link In Same Tab', 'wprestyle' ),
			 '_blank'  => __( 'Open Link In New Tab', 'wprestyle' ),
        ),
    ));
	
	$wp_customize->add_setting(
        'wprestyle_purchase_right_text',
    array(
        'default' => __('Sign Up', 'wprestyle'),
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
        'wprestyle_purchase_right_text',
    array(
        'label'     => __('Home Intro Right Button Text', 'wprestyle'),
        'section'   => 'wprestyle_intro_options',
		'priority'  => 9,
        'type'      => 'text',
    ));
	
	$wp_customize->add_setting(
        'wprestyle_purchase_right_url',
    array(
        'default' => '#',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
        'wprestyle_purchase_right_url',
    array(
        'label'    => __('Home Intro Signup Button Link', 'wprestyle'),
        'section'  => 'wprestyle_intro_options',
		'priority' => 10,
        'type'     => 'text',
    ));
	
	$wp_customize->add_setting( 'wprestyle_purchase_right_url_target', array(
		'default' => '_self',
		'sanitize_callback' => 'wprestyle_sanitize_target_url',
		'capability' => 'edit_theme_options',
	) );
	
	$wp_customize->add_control( 'wprestyle_purchase_right_url_target', array(
        'label'   => __( 'Sign Up Url Window Target', 'wprestyle' ),
        'section' => 'wprestyle_intro_options',
	    'priority' => 11,
        'type'    => 'radio',
        'choices' => array(
             '_self'   => __( 'Open Link In Same Tab', 'wprestyle' ),
			 '_blank'  => __( 'Open Link In New Tab', 'wprestyle' ),
        ),
    ));
	
	// End of intro section	
	
	// Services Section Settings	
	$wp_customize->add_setting(
        'wprestyle_services_visibility', array (
		'sanitize_callback' => 'wprestyle_sanitize_checkbox',
		'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(
        'wprestyle_services_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Hide the front page Services Section?', 'wprestyle'),
        'section'  => 'wprestyle_services_options',
		'priority' => 1,
        )
    );
	
	// Service 1
	$wp_customize->add_setting('wprestyle_box_image1', array(
        'default-image'  => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
    ));
 
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'wprestyle_box_image1',
            array(
               'label'    => __( 'Upload Service Box 1 Image', 'wprestyle' ),
               'section'  => 'wprestyle_services_options',
			   'priority' => 2,
               'settings' => 'wprestyle_box_image1',
            )
        )
    );
	
	// Service 1 Title
	$wp_customize->add_setting(
    'wprestyle_box_title1',
    array(
        'default' => 'Made With Bootstrap',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
    'wprestyle_box_title1',
    array(
        'label'     => __('Service Box 1 Title', 'wprestyle'),
        'section'   => 'wprestyle_services_options',
		'priority'  => 3,
        'type'      => 'text',
    ));
		
	// Service 1 Readmore url
	$wp_customize->add_setting(
        'wprestyle_box_url1',
    array(
        'default' => '#',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
        'wprestyle_box_url1',
    array(
        'label'    => __('Service Box 1 Title Link', 'wprestyle'),
        'section'  => 'wprestyle_services_options',
		'priority' => 4,
        'type'     => 'text',
    ));
		
	$wp_customize->add_setting( 
	    'wprestyle_box_text1',
    array(
        'default' => '',
		'sanitize_callback' => 'wprestyle_sanitize_textarea',
		'capability' => 'edit_theme_options',
    ));		

    $wp_customize->add_control(
        new wprestyle_Customize_Textarea_Control(
            $wp_customize,
            'wprestyle_box_text1',
        array(
            'label'    => __('Service Box 1 Text', 'wprestyle'),
            'section'  => 'wprestyle_services_options',
			'priority' => 5,
            'settings' => 'wprestyle_box_text1',
        )
        )
    );

	// Service 2
	$wp_customize->add_setting('wprestyle_box_image2', array(
        'default-image'  => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
    ));
 
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'wprestyle_box_image2',
            array(
               'label'    => __( 'Upload Service Box 2 Image', 'wprestyle' ),
               'section'  => 'wprestyle_services_options',
			   'priority' => 6,
               'settings' => 'wprestyle_box_image2',
            )
        )
    );
	
	$wp_customize->add_setting(
    'wprestyle_box_title2',
    array(
        'default' => 'Icons by Font Awesome',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
    'wprestyle_box_title2',
    array(
        'label'     => __('Service Box 2 Title', 'wprestyle'),
        'section'   => 'wprestyle_services_options',
		'priority'  => 7,
        'type'      => 'text',
    ));
		
	// Service 2 Readmore url
	$wp_customize->add_setting(
        'wprestyle_box_url2',
    array(
        'default' => '#',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
        'wprestyle_box_url2',
    array(
        'label'    => __('Service Box 2 Title Link', 'wprestyle'),
        'section'  => 'wprestyle_services_options',
		'priority' => 8,
        'type'     => 'text',
    ));
		
	$wp_customize->add_setting( 
	    'wprestyle_box_text2',
    array(
        'default' => '',
		'sanitize_callback' => 'wprestyle_sanitize_textarea',
		'capability' => 'edit_theme_options',
    ));		

    $wp_customize->add_control(
        new wprestyle_Customize_Textarea_Control(
            $wp_customize,
            'wprestyle_box_text2',
        array(
            'label'    => __('Service Box 2 Text', 'wprestyle'),
            'section'  => 'wprestyle_services_options',
			'priority' => 9,
            'settings' => 'wprestyle_box_text2',
        )
        )
    );

	// Service 3 Title
	$wp_customize->add_setting('wprestyle_box_image3', array(
        'default-image'  => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
    ));
 
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'wprestyle_box_image3',
            array(
               'label'    => __( 'Upload Service Box 3 Image', 'wprestyle' ),
               'section'  => 'wprestyle_services_options',
			   'priority' => 10,
               'settings' => 'wprestyle_box_image3',
            )
        )
    );
	
	$wp_customize->add_setting(
    'wprestyle_box_title3',
    array(
        'default' => 'Mobile First & Desktop Friendly',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
    'wprestyle_box_title3',
    array(
        'label'     => __('Service Box 3 Title', 'wprestyle'),
        'section'   => 'wprestyle_services_options',
		'priority'  => 11,
        'type'      => 'text',
    ));
		
	// Service 3 Readmore url
	$wp_customize->add_setting(
        'wprestyle_box_url3',
    array(
        'default' => '#',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
        'wprestyle_box_url3',
    array(
        'label'    => __('Service Box 3 Title Link', 'wprestyle'),
        'section'  => 'wprestyle_services_options',
		'priority' => 12,
        'type'     => 'text',
    ));
		
	$wp_customize->add_setting( 
	    'wprestyle_box_text3',
    array(
        'default' => '',
		'sanitize_callback' => 'wprestyle_sanitize_textarea',
		'capability' => 'edit_theme_options',
    ));		

    $wp_customize->add_control(
        new wprestyle_Customize_Textarea_Control(
            $wp_customize,
            'wprestyle_box_text3',
        array(
            'label'    => __('Service Box 3 Text', 'wprestyle'),
            'section'  => 'wprestyle_services_options',
			'priority' => 13,
            'settings' => 'wprestyle_box_text3',
        )
        )
    );
	
	// Service 4
	$wp_customize->add_setting('wprestyle_box_image4', array(
        'default-image'  => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
    ));
 
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'wprestyle_box_image4',
            array(
               'label'    => __( 'Upload Service Box 4 Image', 'wprestyle' ),
               'section'  => 'wprestyle_services_options',
			   'priority' => 14,
               'settings' => 'wprestyle_box_image4',
            )
        )
    );
	
	$wp_customize->add_setting(
    'wprestyle_box_title4',
    array(
        'default' => 'Mobile First & Desktop Friendly',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
    'wprestyle_box_title4',
    array(
        'label'     => __('Service Box 4 Title', 'wprestyle'),
        'section'   => 'wprestyle_services_options',
		'priority'  => 15,
        'type'      => 'text',
    ));
		
	// Service 4 Readmore url
	$wp_customize->add_setting(
        'wprestyle_box_url4',
    array(
        'default' => '#',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
        'wprestyle_box_url4',
    array(
        'label'    => __('Service Box 4 Title Link', 'wprestyle'),
        'section'  => 'wprestyle_services_options',
		'priority' => 16,
        'type'     => 'text',
    ));
		
	$wp_customize->add_setting( 
	    'wprestyle_box_text4',
    array(
        'default' => '',
		'sanitize_callback' => 'wprestyle_sanitize_textarea',
		'capability' => 'edit_theme_options',
    ));		

    $wp_customize->add_control(
        new wprestyle_Customize_Textarea_Control(
            $wp_customize,
            'wprestyle_box_text4',
        array(
            'label'    => __('Service Box 4 Text', 'wprestyle'),
            'section'  => 'wprestyle_services_options',
			'priority' => 17,
            'settings' => 'wprestyle_box_text4',
        )
        )
    );
	// End Of Service Section
		
	// Begin Blog Feed section
	$wp_customize->add_setting(
        'wprestyle_feed_header_visibility', array (
		'sanitize_callback' => 'wprestyle_sanitize_checkbox',
		'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(
        'wprestyle_feed_header_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Remove Blog Feed header?', 'wprestyle'),
        'section'  => 'wprestyle_blogfeed_options',
		'priority' => 1,
        )
    );
	
	$wp_customize->add_setting(
    'wprestyle_feed_header_title',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
    'wprestyle_feed_header_title',
    array(
        'label'     => __('Blog Section Title', 'wprestyle'),
        'section'   => 'wprestyle_blogfeed_options',
		'priority'  => 2,
        'type'      => 'text',
    ));
		
	$wp_customize->add_setting(
        'wprestyle_homefeed_excerpt_length', array(
		'sanitize_callback' => 'wprestyle_sanitize_integer',
		'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(
    'wprestyle_homefeed_excerpt_length',
    array(
        'type' => 'text',
		'default' => '14',
        'label' => __('Blog Feed Excerpt Length', 'wprestyle'),
        'section' => 'wprestyle_blogfeed_options',
		'priority' => 4,
        )
    );
	// End blog feed options
	
}
add_action( 'customize_register', 'wprestyle_customize_register' );

/**
 * Sanitize the Integer Input values.
 *
 * @since wprestyle 1.0.0
 *
 * @param string $input Integer type.
 */
function wprestyle_sanitize_integer( $input ) {
	return absint( $input );
}

if ( ! function_exists( 'wprestyle_sanitize_textarea' ) ) :
/**
* Sanitize a string to allow only tags in the allowedtags array.
*/

function wprestyle_sanitize_textarea( $string ) {
    global $allowedtags;
    return wp_kses( $string , $allowedtags );
}
endif;

/**
 * Sanitize checkbox
 */
if ( ! function_exists( 'wprestyle_sanitize_checkbox' ) ) :
	function wprestyle_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return 0;
		}
	}
endif;

/**
 * Sanitize url target
 */
if ( ! function_exists( 'wprestyle_sanitize_target_url' ) ) :
function wprestyle_sanitize_target_url( $target_url ) {
	if ( ! in_array( $target_url, array( '_self', '_blank' ) ) ) {
		$target_url = '_self';
	}
	return $target_url;
}
endif;

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wprestyle_customize_preview_js() {
	wp_enqueue_script( 'wprestyle_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'wprestyle_customize_preview_js' );
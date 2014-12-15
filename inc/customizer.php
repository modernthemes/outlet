<?php
/**
 * Outlet Theme Customizer
 *
 * @package outlet
 */
 
function outlet_theme_customizer( $wp_customize ) {
	
	//allows donations
    class outlet_Info extends WP_Customize_Control { 
     
        public $label = '';
        public function render_content() { 
        ?>

        <?php
        }
    }	
	
	// Donations
    $wp_customize->add_section( 
        'outlet_theme_info',
        array(
            'title' => __('Like Outlet? Help Us Out.', 'outlet'),
            'priority' => 5,
            'description' => __('We do all we can do to make all our themes free for you. While we enjoy it, and it makes us happy to help out, a little appreciation can help us to keep theming.</strong><br/><br/> Please help support our mission and continued development with a donation of $5, $10, $20, or if you are feeling really kind $100..<br/><br/> <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7LMGYAZW9C5GE" target="_blank" rel="nofollow"><img class="" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" alt="Make a donation to ModernThemes" /></a>'), 
        )
    );  
	 
    //Donations section
    $wp_customize->add_setting('outlet_help', array(   
			'sanitize_callback' => 'outlet_no_sanitize', 
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new outlet_Info( $wp_customize, 'outlet_help', array(
        'section' => 'outlet_theme_info', 
        'settings' => 'outlet_help', 
        'priority' => 10
        ) )
    ); 
	
	// Fonts  
    $wp_customize->add_section(
        'outlet_typography',
        array(
            'title' => __('Google Fonts', 'outlet' ),  
            'priority' => 39,
        )
    );
	
    $font_choices = 
        array(
			'Oswald:400,700' => 'Oswald',
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
			'Raleway:400,700' => 'Raleway',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',     
            'Droid Sans:400,700' => 'Droid Sans',
            'Lato:400,700,400italic,700italic' => 'Lato',
            'Arvo:400,700,400italic,700italic' => 'Arvo',
            'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif', 
            'PT Sans:400,700,400italic,700italic' => 'PT Sans',
            'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',  
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
            'Arimo:400,700,400italic,700italic' => 'Arimo',
            'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
            'Bitter:400,700,400italic' => 'Bitter',
            'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
            'Roboto:400,400italic,700,700italic' => 'Roboto',
            'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
            'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
            'Roboto Slab:400,700' => 'Roboto Slab',
            'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
            'Rokkitt:400' => 'Rokkitt',
    );
    
    $wp_customize->add_setting(
        'headings_fonts',
        array(
            'sanitize_callback' => 'outlet_sanitize_fonts',
        )
    );
    
    $wp_customize->add_control(
        'headings_fonts',
        array(
            'type' => 'select',
            'description' => __('Select your desired font for the headings. Oswald is the default Heading font.', 'outlet'),
            'section' => 'outlet_typography',
            'choices' => $font_choices
        )
    );
    
    $wp_customize->add_setting(
        'body_fonts',
        array(
            'sanitize_callback' => 'outlet_sanitize_fonts',
        )
    );
    
    $wp_customize->add_control(
        'body_fonts',
        array(
            'type' => 'select',
            'description' => __( 'Select your desired font for the body. Source Sans Pro is the default Body font.', 'outlet' ), 
            'section' => 'outlet_typography',  
            'choices' => $font_choices 
        ) 
    );

	// Colors
    $wp_customize->add_setting( 'outlet_link_color', array(   
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'outlet_link_color', array(
        'label'	   => 'Link Color', 
        'section'  => 'colors',
        'settings' => 'outlet_link_color',
		'priority' => 3  
    ) ) );
	
	$wp_customize->add_setting( 'outlet_hover_color', array( 
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'outlet_hover_color', array(
        'label'	   => 'Hover Color', 
        'section'  => 'colors',
        'settings' => 'outlet_hover_color',
		'priority' => 4  
    ) ) );
	
	$wp_customize->add_setting( 'outlet_custom_color', array( 
		'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'outlet_custom_color', array(
        'label'	   => 'Theme Color',
        'section'  => 'colors',
        'settings' => 'outlet_custom_color', 
		'priority' => 1
    ) ) );
	
	$wp_customize->add_setting( 'outlet_custom_color_hover', array(
		'sanitize_callback' => 'sanitize_hex_color', 
    ) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'outlet_custom_color_hover', array(
        'label'	   => 'Theme Hover Color',
        'section'  => 'colors',
        'settings' => 'outlet_custom_color_hover', 
		'priority' => 2
    ) ) ); 

    // Logo upload
    $wp_customize->add_section( 'outlet_logo_section' , array(  
	    'title'       => __( 'Logo and Icons', 'outlet' ),
	    'priority'    => 25,
	    'description' => 'Upload a logo to replace the default site name and description in the header. Also, upload your site favicon and Apple Icons.',
	) );

	$wp_customize->add_setting( 'outlet_logo', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'outlet_logo', array(
		'label'    => __( 'Logo', 'outlet' ),
		'section'  => 'outlet_logo_section', 
		'settings' => 'outlet_logo',
		'priority' => 1,
	) ) );
	
	// Logo Width
	$wp_customize->add_setting( 'logo_size', 
	array(
		'sanitize_callback' => 'outlet_sanitize_text',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'logo_size', array( 
		'label'    => __( 'Change the width of the Logo in PX.', 'outlet' ),
		'description'    => __( 'Only enter numeric value', 'outlet' ),
		'section'  => 'outlet_logo_section', 
		'settings' => 'logo_size',  
		'priority'   => 2 
	) ) );
	
	//Favicon Upload
	$wp_customize->add_setting(
		'site_favicon',
		array(
			'default' => (get_stylesheet_directory_uri() . '/images/favicon.png'),
			'sanitize_callback' => 'esc_url_raw',
		)
	);
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_favicon',
            array(
               'label'          => __( 'Upload your favicon (16x16 pixels)', 'outlet' ), 
			   'type' 			=> 'image',
               'section'        => 'outlet_logo_section',
               'settings'       => 'site_favicon',
               'priority' => 2,
            )
        )
    );
    //Apple touch icon 144
    $wp_customize->add_setting(
        'apple_touch_144',
        array(
            'default-image' => '',
			'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_144',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (144x144 pixels)', 'outlet' ),
               'type'           => 'image',
               'section'        => 'outlet_logo_section',
               'settings'       => 'apple_touch_144',
               'priority'       => 11,
            )
        )
    );
    //Apple touch icon 114
    $wp_customize->add_setting(
        'apple_touch_114',
        array(
            'default-image' => '',
			'sanitize_callback' => 'esc_url_raw', 
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_114',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (114x114 pixels)', 'outlet' ),
               'type'           => 'image',
               'section'        => 'outlet_logo_section',
               'settings'       => 'apple_touch_114',
               'priority'       => 12,
            )
        )
    );
    //Apple touch icon 72
    $wp_customize->add_setting(
        'apple_touch_72',
        array(
            'default-image' => '',
			'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_72',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (72x72 pixels)', 'outlet' ),
               'type'           => 'image',
               'section'        => 'outlet_logo_section',
               'settings'       => 'apple_touch_72',
               'priority'       => 13,
            )
        )
    );
    //Apple touch icon 57
    $wp_customize->add_setting(
        'apple_touch_57',
        array(
            'default-image' => '',
			'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_57',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (57x57 pixels)', 'outlet' ),
               'type'           => 'image',
               'section'        => 'outlet_logo_section', 
               'settings'       => 'apple_touch_57',
               'priority'       => 14,
            )
        )
    );
	
	// Add Homepage Section
	$wp_customize->add_section( 'outlet_homepage' , array(
    	'title' => __( 'Homepage', 'outlet' ),
    	'priority' => 30,
    	'description' => __( 'Customize your homepage area', 'outlet' )
	) );
	
	$wp_customize->add_setting('active_home_info',
	    array(
	        'sanitize_callback' => 'outlet_sanitize_checkbox',
	    ) 
	);   
	
	$wp_customize->add_control( 
    'active_home_info', 
    array(
        'type' => 'checkbox',
        'label' => 'Hide Homepage Intro',  
        'section' => 'outlet_homepage', 
		'priority'   => 1
    )); 
	
	$wp_customize->add_setting('active_featured',
	    array(
	        'sanitize_callback' => 'outlet_sanitize_checkbox',
	    ) 
	);   
	
	$wp_customize->add_control( 
    'active_featured', 
    array(
        'type' => 'checkbox',
        'label' => 'Hide Featured Products',  
        'section' => 'outlet_homepage', 
		'priority'   => 2
    ));
	
	$wp_customize->add_setting('active_newest',
	    array(
	        'sanitize_callback' => 'outlet_sanitize_checkbox',
	    ) 
	); 
	
	$wp_customize->add_control( 
    'active_newest', 
    array(
        'type' => 'checkbox',
        'label' => 'Hide Newest Products',  
        'section' => 'outlet_homepage', 
		'priority'   => 3
    ));
	
	// Homepage Products 1
	$wp_customize->add_setting( 'outlet_featured_title' , 
	array( 
		'default' => 'Featured Products',
		'sanitize_callback' => 'outlet_sanitize_text',
	));
	 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'outlet_featured_title', array(
    'label' => __( 'Featured Product Title', 'outlet' ),
    'section' => 'outlet_homepage',
    'settings' => 'outlet_featured_title',
	'priority'   => 4
	) ) );
	
	// Homepage Products 2
	$wp_customize->add_setting( 'outlet_newest_title' ,  
	array( 
		'default' => 'Newest Products',
		'sanitize_callback' => 'outlet_sanitize_text', 
	));
	  
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'outlet_newest_title', array(
    'label' => __( 'Newest Product Title', 'outlet' ),
    'section' => 'outlet_homepage', 
    'settings' => 'outlet_newest_title',
	'priority'   => 5   
	) ) );
	
	// Add Footer Section
	$wp_customize->add_section( 'footer-custom' , array(
    	'title' => __( 'Footer', 'outlet' ),
    	'priority' => 32, 
    	'description' => __( 'Customize your footer area', 'outlet' )
	) );
	
	$wp_customize->add_setting('active_footer_top',
	array(
	        'sanitize_callback' => 'outlet_sanitize_checkbox',
	    ) 
	);  
	
	$wp_customize->add_control( 
    'active_footer_top', 
    array(
        'type' => 'checkbox',
        'label' => 'Hide Footer Contact Section',  
        'section' => 'footer-custom',
		'priority'   => 1
    ));
	
	$wp_customize->add_setting('active_footer_social',
	array(
	        'sanitize_callback' => 'outlet_sanitize_checkbox',
	    ) 
	); 
	
	$wp_customize->add_control( 
    'active_footer_social', 
    array(
        'type' => 'checkbox',
        'label' => 'Hide Footer Social Section',   
        'section' => 'footer-custom',
		'priority'   => 2 
    )); 
	
	// Footer Call-to-Action
	$wp_customize->add_setting( 'outlet_footer_cta' , 
	array(  
		'sanitize_callback' => 'outlet_sanitize_text', 
	));
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'outlet_footer_cta', array(
    'label' => __( 'Footer Call-to-Action', 'outlet' ),
    'section' => 'footer-custom',
    'settings' => 'outlet_footer_cta', 
	) ) );
	
	// Footer Hours
	$wp_customize->add_setting( 'outlet_footer_hours' , 
	array(  
		'sanitize_callback' => 'outlet_sanitize_text', 
	)); 
	 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'outlet_footer_hours', array(
    'label' => __( 'Footer Hours', 'outlet' ),
    'section' => 'footer-custom',
    'settings' => 'outlet_footer_hours',  
	) ) ); 
	
	// Footer Contact
	$wp_customize->add_setting( 'outlet_footer_contact' , 
	array(  
		'sanitize_callback' => 'outlet_sanitize_text',
	));
	 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'outlet_footer_contact', array(
    'label' => __( 'Footer Contact Info', 'outlet' ), 
    'section' => 'footer-custom',
    'settings' => 'outlet_footer_contact', 
	) ) );
	
	// Footer Byline Text
	$wp_customize->add_setting( 'outlet_footerid' , 
	array( 
		'sanitize_callback' => 'outlet_sanitize_text', 
	));
	  
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'outlet_footerid', array(
    'label' => __( 'Footer Byline Text', 'outlet' ),
    'section' => 'footer-custom',
    'settings' => 'outlet_footerid', 
) ) ); 

     // Choose excerpt or full content on blog 
    $wp_customize->add_section( 'outlet_layout_section' , array( 
	    'title'       => __( 'Layout', 'outlet' ),
	    'priority'    => 35,
	    'description' => 'Change how outlet displays posts',
	) );

	$wp_customize->add_setting( 'outlet_post_content', array(
		'default'	        => 'option1',
		'sanitize_callback' => 'outlet_sanitize_index_content',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'outlet_post_content', array(
		'label'    => __( 'Post content', 'outlet' ),
		'section'  => 'outlet_layout_section',
		'settings' => 'outlet_post_content',
		'type'     => 'radio',
		'choices'  => array(
			'option1' => 'Excerpts',
			'option2' => 'Full content',
			),
	) ) );
	
	//Excerpt
    $wp_customize->add_setting(
        'exc_length',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '30',
        )       
    );
    $wp_customize->add_control( 'exc_length', array( 
        'type'        => 'number',
        'priority'    => 2, 
        'section'     => 'outlet_layout_section',
        'label'       => __('Excerpt length', 'outlet'),
        'description' => __('Choose your excerpt length here. Default: 30 words', 'outlet'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5,
            'style' => 'padding: 15px;',
        ), 
    ) );  

	// Set site name and description to be previewed in real-time
	$wp_customize->get_setting('blogname')->transport='postMessage';
	$wp_customize->get_setting('blogdescription')->transport='postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	// Move sections up 
	$wp_customize->get_section('static_front_page')->priority = 10;
	$wp_customize->get_section('nav')->priority = 11;

	// Enqueue scripts for real-time preview
	wp_enqueue_script( 'outlet-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );  
 

}
add_action('customize_register', 'outlet_theme_customizer');


/**
 * Sanitizes a hex color. Identical to core's sanitize_hex_color(), which is not available on the wp_head hook.
 *
 * Returns either '', a 3 or 6 digit hex color (with #), or null.
 * For sanitizing values without a #, see sanitize_hex_color_no_hash().
 *
 * @since 1.7
 */
function outlet_sanitize_hex_color( $color ) {
	if ( '#FF0000' === $color ) 
		return '';

	// 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
		return $color;

	return null;
}

/**
 * Sanitizes our post content value (either excerpts or full post content).
 *
 * @since 1.7
 */
function outlet_sanitize_index_content( $content ) {
	if ( 'option2' == $content ) {
		return 'option2';
	} else {
		return 'option1';
	}
}

//Checkboxes
function outlet_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

//Integers
function outlet_sanitize_int( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

//Text
function outlet_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

//Sanitizes Fonts 
function outlet_sanitize_fonts( $input ) {  
    $valid = array(
            'Oswald:400,700' => 'Oswald',
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
			'Raleway:400,700' => 'Raleway',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',     
            'Droid Sans:400,700' => 'Droid Sans',
            'Lato:400,700,400italic,700italic' => 'Lato',
            'Arvo:400,700,400italic,700italic' => 'Arvo',
            'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif', 
            'PT Sans:400,700,400italic,700italic' => 'PT Sans',
            'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',  
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
            'Arimo:400,700,400italic,700italic' => 'Arimo',
            'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
            'Bitter:400,700,400italic' => 'Bitter',
            'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
            'Roboto:400,400italic,700,700italic' => 'Roboto',
            'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
            'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
            'Roboto Slab:400,700' => 'Roboto Slab',
            'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
            'Rokkitt:400' => 'Rokkitt', 
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

//No sanitize - empty function for options that do not require sanitization -> to bypass the Theme Check plugin
function outlet_no_sanitize( $input ) {
} 

/**
 * Add CSS in <head> for styles handled by the theme customizer
 *
 * @since 1.5
 */
function outlet_add_customizer_css() {
	$color = outlet_sanitize_hex_color( get_theme_mod( 'outlet_link_color' ) );
	?>
	<!-- outlet customizer CSS -->
	<style>
		body {
			border-color: <?php echo $color; ?>;
		}
		
		a, .entry-content a { 
			color: <?php echo get_theme_mod( 'outlet_link_color' ) ?>;  
		} 
		
		.site-info a, .main-navigation a, .header-cart a {
			color: <?php echo get_theme_mod( 'outlet_link_color' ) ?>;  
		}
		
		a:hover, .main-navigation li:hover > a  {
			color: <?php echo get_theme_mod( 'outlet_hover_color' ) ?>;  
		}
		
		a:focus, a:active { color: <?php echo get_theme_mod( 'outlet_hover_color' ) ?> !important; }
		  
		.slides-navigation a, .woocommerce span.onsale, .woocommerce-page span.onsale, input.contact-submit[type="submit"] { background: <?php echo get_theme_mod( 'outlet_custom_color' ) ?>; } 
		
		.site-title, .site-title a, .banner--clone .site-title, .banner--clone .site-title a, .banner--clone .site-title a:visited  { color: <?php echo get_theme_mod( 'outlet_custom_color' ) ?>; } 
		
		.underline:after, .page-title:after, .entry-title:after, .related h2:after, #tab-description h2:after { border-color: <?php echo get_theme_mod( 'outlet_custom_color' ) ?>; }
		blockquote { border-color: <?php echo get_theme_mod( 'outlet_custom_color' ) ?>; }
		
		button, input[type="button"], input[type="reset"], input[type="submit"] { background: <?php echo get_theme_mod( 'outlet_custom_color' ) ?>; border-color: <?php echo get_theme_mod( 'outlet_custom_color' ) ?>; }  
		
		button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover { border-color: <?php echo get_theme_mod( 'outlet_custom_color_hover') ?>; background: <?php echo get_theme_mod( 'outlet_custom_color_hover') ?>; } 
		 
	</style>  
<?php }
add_action( 'wp_head', 'outlet_add_customizer_css' );  

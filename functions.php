<?php
/**
 * outlet functions and definitions
 *
 * @package outlet
 */
 
/**
* Theme updater
*/ 
 
require_once('inc/wp-updates-theme.php');
new WPUpdatesThemeUpdater_906( 'http://wp-updates.com/api/2/theme', basename( get_template_directory() ) );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'outlet_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function outlet_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on outlet, use a find and replace
	 * to change 'outlet' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'outlet', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'Featured', 350, 525, true);
	add_image_size( 'outlet_featured_thumb', 325, 250, true);
	add_image_size( 'outlet_newest_thumb', 270, 400, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'outlet' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'outlet_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // outlet_setup
add_action( 'after_setup_theme', 'outlet_setup' );

/**
 * Load Google Fonts.
 */
function load_fonts() {
            wp_register_style('googleFonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,400italic|Oswald:400,300');
            wp_enqueue_style( 'googleFonts'); 
        }
    
    add_action('wp_print_styles', 'load_fonts');
	
/**
* Register and load font awesome CSS files using a CDN.
*
* @link http://www.bootstrapcdn.com/#fontawesome
* @author FAT Media 
*/
	
add_action( 'wp_enqueue_scripts', 'prefix_enqueue_awesome' );

function prefix_enqueue_awesome() {
wp_enqueue_style( 'prefix-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array(), '4.2.0' ); 
}

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function outlet_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'outlet' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Homepage Under Slider', 'outlet' ),
		'id'            => 'homepage-1', 
		'before_widget' => '<aside id="%1$s" class="%2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2>', 
		'after_title'   => '</h2>',
	) );
	
	//Register the sidebar widgets   
	register_widget( 'outlet_Video_Widget' ); 
	register_widget( 'outlet_Contact_Info' );
	
}
add_action( 'widgets_init', 'outlet_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function outlet_scripts() {
	wp_enqueue_style( 'outlet-style', get_stylesheet_uri() );
	
	$headings_font = esc_html(get_theme_mod('headings_fonts'));
	$body_font = esc_html(get_theme_mod('body_fonts')); 
	
	if( $headings_font ) {
		wp_enqueue_style( 'outlet-headings-fonts', '//fonts.googleapis.com/css?family='. $headings_font );	
	} else {
		wp_enqueue_style( 'outlet-oswald', '//fonts.googleapis.com/css?family=Oswald:400,300');  
	}	
	if( $body_font ) {
		wp_enqueue_style( 'outlet-body-fonts', '//fonts.googleapis.com/css?family='. $body_font );	
	} else {
		wp_enqueue_style( 'outlet-source-sans', '//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,400italic');
	} 
	
    wp_enqueue_style( 'outlet-animate', get_stylesheet_directory_uri() . '/css/animate.css', array(), '1.0' );
	wp_enqueue_style( 'outlet-woocommerce', get_template_directory_uri() . '/css/woocommerce.css' );
	wp_enqueue_style( 'outlet-menu', get_template_directory_uri() . '/css/component.css' );
	
	if ( file_exists( get_stylesheet_directory_uri() . '/inc/my_style.css' ) ) {
	wp_enqueue_style( 'outlet-mystyle', get_stylesheet_directory_uri() . '/inc/my_style.css', array(), false, false );
	}
	
	if ( is_admin() ) {
    wp_enqueue_style( 'outlet-codemirror', get_stylesheet_directory_uri() . '/css/codemirror.css', array(), '1.0' ); 
	}

	wp_enqueue_script( 'outlet-modernizr', get_template_directory_uri() . '/js/classie.js', array(), false, false);  
	wp_enqueue_script( 'outlet-classie', get_template_directory_uri() . '/js/modernizr.custom.js', array(), false, true);   
	wp_enqueue_script( 'outlet-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true ); 
	wp_enqueue_script( 'outlet-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'outlet-headhesive', get_template_directory_uri() . '/js/headhesive.min.js', array('jquery'), false, true ); 
	wp_enqueue_script( 'outlet-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array(), false, true );
	wp_enqueue_script( 'outlet-animate', get_template_directory_uri() . '/js/jquery.animate-enhanced.min.js', array(), false, true );
	wp_enqueue_script( 'outlet-slider', get_template_directory_uri() . '/js/jquery.superslides.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'outlet-codemirrorJS', get_template_directory_uri() . '/js/codemirror.js', array(), false, true);
	wp_enqueue_script( 'outlet-cssJS', get_template_directory_uri() . '/js/css.js', array(), false, true);
	wp_enqueue_script( 'outlet-placeholder', get_template_directory_uri() . '/js/jquery.placeholder.js', array('jquery'), false, true);
 	wp_enqueue_script( 'outlet-placeholdertext', get_template_directory_uri() . '/js/placeholdertext.js', array('jquery'), false, true);
	
	if ( is_page_template( 'page-contact.php' ) ) {  
	wp_enqueue_script( 'outlet-validate', get_template_directory_uri() . '/js/jquery.validate.min.js', array('jquery'), false, true);
	wp_enqueue_script( 'outlet-verify', get_template_directory_uri() . '/js/verify.js', array('jquery'), false, true);   
	}
	
	wp_enqueue_script( 'outlet-scripts', get_template_directory_uri() . '/js/outlet-scripts.js', array('jquery'), false, true ); 

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' ); 
	}
}
add_action( 'wp_enqueue_scripts', 'outlet_scripts' );

/**
 * Load html5shiv
 */
function outlet_html5shiv() {
    echo '<!--[if lt IE 9]>' . "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5shiv.js' ) . '"></script>' . "\n";
    echo '<![endif]-->' . "\n";
}
add_action( 'wp_head', 'outlet_html5shiv' );

/**
 * Change the excerpt length
 */
function outlet_excerpt_length( $length ) {
	
	$excerpt = get_theme_mod('exc_length', '30'); 
	return $excerpt; 

}

add_filter( 'excerpt_length', 'outlet_excerpt_length', 999 ); 

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php'; 

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Include additional custom admin panel features. 
 */
require get_template_directory() . '/panel/functions-admin.php';

/**
 * Google Fonts  
 */
require get_template_directory() . '/inc/gfonts.php';   

/**
 * Include additional custom features.
 */
require get_template_directory() . '/inc/my-custom-css.php';
require get_template_directory() . '/inc/socialicons.php'; 

/**
 * register your custom widgets
 */ 
require get_template_directory() . "/widgets/contact-info.php";
require get_template_directory() . "/widgets/video-widget.php"; 

/**
 * Add Woocommerce support
 */
add_theme_support( 'woocommerce' );

	
// Display 16 products per page. Goes in functions.php
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 16;' ), 20 );


/**
 * Slider Post Type.
 */
function slider_post_type() {

	$labels = array(
		'name'                => _x( 'Slider', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Slide', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Slides', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Slides', 'text_domain' ),
		'view_item'           => __( 'View Slides', 'text_domain' ),
		'add_new_item'        => __( 'Add New Slide', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Slide', 'text_domain' ),
		'update_item'         => __( 'Update Slide', 'text_domain' ),
		'search_items'        => __( 'Search Slides', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'slides', 'text_domain' ),
		'description'         => __( 'Add a slide to your schedule.', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', ),
		'taxonomies'          => array( 'thumbnail' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'slider', $args );

}

// Hook into the 'init' action
add_action( 'init', 'slider_post_type', 0 );		
								
function slider_metaboxes( $meta_boxes ) {
    $prefix = '_sr_'; // Prefix for all fields
    $meta_boxes['slider_metabox'] = array(
        'id' => 'slider_metabox',
        'title' => 'Slide Settings',
        'pages' => array('slider'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
			
			array(
   				'name' => __( 'URL', 'cmb' ),
    			'desc' => 'Enter the URL you would like to link to.',
    			'id'   => $prefix . 'slider_url',
    			'type' => 'text_url',
    			'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
				), 
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'slider_metaboxes' );			


// Initialize custom post types 
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
    if ( !class_exists( 'cmb_Meta_Box' ) ) {
        require_once( 'meta/init.php' );
    }
} 

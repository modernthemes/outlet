<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package outlet
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php add_action( 'wp_enqueue_scripts', 'outlet_scripts' ); ?>
<?php if ( get_theme_mod('site_favicon') ) : ?>
	<link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('site_favicon')); ?>" />
<?php endif; ?>
<?php if ( get_theme_mod('apple_touch_144') ) : ?>
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url(get_theme_mod('apple_touch_144')); ?>" />
<?php endif; ?>
<?php if ( get_theme_mod('apple_touch_114') ) : ?>
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url(get_theme_mod('apple_touch_114')); ?>" />
<?php endif; ?>
<?php if ( get_theme_mod('apple_touch_72') ) : ?>
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url(get_theme_mod('apple_touch_72')); ?>" />
<?php endif; ?>
<?php if ( get_theme_mod('apple_touch_57') ) : ?>
	<link rel="apple-touch-icon" href="<?php echo esc_url(get_theme_mod('apple_touch_57')); ?>" />
<?php endif; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class('cbp-spmenu-push'); ?>>
	
    <div id="page" class="hfeed site">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'outlet' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
    		<div class="grid grid-pad head-overflow">
        
			<div class="site-branding col-4-12 mobile-col-9-12">
        		<?php if ( get_theme_mod( 'outlet_logo' ) ) : ?>
    			<div class="site-logo">
        		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url( get_theme_mod( 'outlet_logo' ) ); ?>" <?php if ( get_theme_mod( 'logo_size' ) ) : ?>width="<?php echo get_theme_mod( 'logo_size' ); ?>"<?php endif; ?> alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a> 
    			</div><!-- site-logo -->
				<?php else : ?>
    			<hgroup>
        			<h1 class="site-title custom_color"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    			</hgroup>
			<?php endif; ?> 
			</div><!-- site-branding --> 
        
			<div class="col-6-12 hide-on-mobile">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav><!-- #site-navigation -->
        	</div><!-- col-6-12 -->
        
        	<div class="col-2-12 mobile-col-3-12 header-cart push-right">
        	<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { 
			global $woocommerce; ?><i class="fa fa-shopping-cart"></i> - <span><a href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><?php echo $woocommerce->cart->get_cart_contents_count(); } ?></a></span>
        	</div><!-- col-2-12 -->
        
        	</div><!-- grid -->
		</header><!-- #masthead --> 
    
 
		<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
    		<h3>Menu</h3>
   			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</div><!-- cbp-spmenu -->
    
    	<div class="mobileNav">
        	<button class="mobileNav" id="showRightPush"><i class="fa fa-bars"></i> Menu</button>  
    	</div><!-- mobileNav --> 
        

	<section id="content" class="site-content">

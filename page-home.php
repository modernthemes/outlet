<?php
/**
Template Name: Home Page
 *
 * @package outlet
 */

get_header('home'); ?>

 	<div id="slides">
    	<ul class="slides-container">
    
     		<?php query_posts( array ( 'post_type' => 'slider', 'posts_per_page' => 5 ) );
			
				while ( have_posts() ) : the_post(); ?> 
                    
                <li>
                <a href="<?php global $post; $text = get_post_meta( $post->ID, '_sr_slider_url', true ); echo $text; ?>">
        		<h2 class="slide-title animated fadeInLeft delay"><?php the_title(); ?></h2>
                </a>
                <?php the_post_thumbnail('full', array('class' => 'animated scaleDown')); ?> 
                </li>
        
			<?php endwhile; // end of the loop. ?>   
              
    	</ul><!-- slides-container -->
    
	<div class="down-arrow"><a href="#outlet"><i class="fa fa-angle-down"></i></a></div>
    	<nav class="slides-navigation">
      		<a href="#" class="next"><i class="fa fa-angle-right"></i></a>
      		<a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
    	</nav><!-- slides-navigation -->
  	</div><!-- down-arrow -->
  
 	<?php if( get_theme_mod( 'active_home_info' ) == '') : ?> 
  
 	<div class="home-info">
  		<span id="outlet"></span>
        	<div class="grid grid-pad">
    			<div class="col-1-1"> 
		
				<?php if ( is_active_sidebar('homepage-1') ) {
     			 	dynamic_sidebar('homepage-1');
				} 
			
				else {
	  				// Display none 
				}
				?> 
        	
            	</div><!-- col-1-1 -->
    		</div><!-- grid -->
  	</div><!-- home-info -->
  
  	<?php else : ?>  
  	<?php endif; ?>
  	<?php // end if ?>  
   
  <?php if( get_theme_mod( 'active_featured' ) == '') : ?> 
   
  <div class="featured-block">
    <div class="grid grid-pad">
      <div class="col-1-1">
      	<h2 class="underline">
			<?php if ( get_theme_mod('outlet_featured_title') ) : ?>
				<?php echo get_theme_mod( 'outlet_featured_title' ); ?>
        	<?php endif; ?>
        </h2>
      </div><!-- col-1-1 -->
  			
	<?php
	global $post;
	$args = array( 'post_type' => 'product', 'meta_key' => '_featured', 'meta_value' => 'yes', 'posts_per_page' => 4 ); 
	$myposts = get_posts( $args );
	foreach( $myposts as $post ) :	setup_postdata($post); ?>
	
    <div class="col-1-4 mobile-col-1-2">	
    	<div class="home-product fade">
        	<a href="<?php the_permalink(); ?>">
            	<div class="caption">
                	<h3><?php the_title(); ?></h3>
                 	<?php if ( $price_html = $product->get_price_html() ) : ?>
                 	<p><?php echo $price_html; ?></p>
                </div>
            </a>
            <?php endif; ?>
                 
            <a href="<?php the_permalink(); ?>">
            	<?php the_post_thumbnail('Featured'); ?>
            </a>
        </div>
    </div>
	
	<?php endforeach; ?> 
    </div><!-- grid -->
  </div><!-- featured-block -->
  
  <?php else : ?>  
  <?php endif; ?>
  <?php // end if ?>
    
  <?php if( get_theme_mod( 'active_newest' ) == '') : ?> 

  <div class="newest-block"> 
    <div class="grid grid-pad">
      <div class="col-1-1">
      	<h2 class="underline">
			<?php if ( get_theme_mod('outlet_newest_title') ) : ?>
				<?php echo get_theme_mod( 'outlet_newest_title' ); ?>
        	<?php endif; ?>
        </h2>
      </div><!-- col-1-1 -->
    		
	<?php 
	global $post;
	$args = array( 'post_type' => 'product', 'posts_per_page' => 8 ); 
	$myposts = get_posts( $args );
	foreach( $myposts as $post ) :	setup_postdata($post); ?>
				 
	<div class="col-1-4 mobile-col-1-2">
  		<div class="home-product fade">
    		<a href="<?php the_permalink(); ?>">
        		<div class="caption">
            		<h3><?php the_title(); ?></h3>
                		<?php if ( $price_html = $product->get_price_html() ) : ?>
                 		<p><?php echo $price_html; ?></p>
            	</div>
        	</a>
        	<?php endif; ?>
                 
        	<a href="<?php the_permalink(); ?>">
        		<?php the_post_thumbnail('Featured'); ?>
        	</a>
     	</div>
	</div>
	<?php endforeach; ?>
	
    </div><!-- grid -->
  </div><!-- newest-block -->
  
  <?php else : ?>  
  <?php endif; ?>
  <?php // end if ?>
     

<?php get_footer(); ?>

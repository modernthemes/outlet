<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package outlet
 */
?>

	</section><!-- #content --> 
   
    <?php if( get_theme_mod( 'active_footer_top' ) == '') : ?>
    
    <div class="footer-cta">
    	<div class="grid grid-pad">
    
    		<div class="col-1-1">
            	<?php if ( get_theme_mod( 'outlet_footer_cta' ) ) : ?>
            		<h2><?php echo get_theme_mod( 'outlet_footer_cta' ); ?></h2>
				<?php endif; ?>
                
                <?php if ( get_theme_mod( 'outlet_footer_hours' ) ) : ?>
            		<p><?php echo get_theme_mod( 'outlet_footer_hours' ); ?>   
				<?php endif; ?>
                
                <?php if ( get_theme_mod( 'outlet_footer_contact' ) ) : ?>
            		<?php echo get_theme_mod( 'outlet_footer_contact' ); ?></p>
				<?php endif; ?>
    		</div><!-- .col-1-1 -->
    
    	</div><!-- .grid -->
    </div><!-- .footer-cta -->
    
    <?php else : ?>  
	<?php endif; ?>
	<?php // end if ?>
    
    <?php if( get_theme_mod( 'active_footer_social' ) == '') : ?> 
    
    <div class="footer-social">
    	<div class="grid grid-pad">
    		
            <div class="col-1-1">
   		 		<?php echo outlet_media_icons(); ?> 
    		</div><!-- .col-1-1 -->
    
    	</div><!-- .grid -->
    </div><!-- .footer-social -->
    
    <?php else : ?>  
	<?php endif; ?>
	<?php // end if ?> 


	<footer id="colophon" class="site-footer col-1-1" role="contentinfo">
		<div class="site-info">
          
        <?php if ( get_theme_mod( 'outlet_footerid' ) ) : ?>
        			<?php echo get_theme_mod( 'outlet_footerid' ); ?>  
				<?php else : ?>  
    				<?php	printf( __( 'Theme: %1$s by %2$s', 'outlet' ), 'outlet', '<a href="http://modernthemes.net/" rel="designer">modernthemes.net</a>' ); ?> 
				<?php endif; ?>
      
		</div><!-- .site-info --> 
	</footer><!-- #colophon -->
    
</div><!-- #page --> 

<?php wp_footer(); ?>

</body>
</html>

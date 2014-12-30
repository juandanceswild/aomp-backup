<?php
/**
 * Footer Template
 *
 * Here we setup all logic and XHTML that is required for the footer section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
 
 global $woo_options;

 woo_footer_top();
 	woo_footer_before();
?>

<div class="clear"></div>
<div id="footer" class="container-fluid">
<div class="container">
	
	
		<?php woo_footer_inside(); ?>    
	    
		<div id="copyright" class="col-md-4 col-sm-4 col-xs-12">
			<?php woo_footer_left(); ?>
		</div>
		
        
        <div id="footer-menu" class="col-md-5 col-sm-5 col-xs-12">
       		 <?php wp_nav_menu( array('theme_location' => 'footer-menu','menu_class'=> 'nav navbar-nav',  'container' => '', )); ?>
        </div>
        
		<div id="social-liks" class="col-md-3 col-sm-3 col-xs-12">
        <div class="row">
			<?php if ( ! dynamic_sidebar( 'footer_section' ) ) : ?><?php endif ?>
        </div>
		</div>
</div>		
</div><!-- /#footer  -->
<div class="bottom-band visible-xs"></div>	
    
    
    
    
    
	<?php woo_footer_after(); ?>    
	
	
	
	
	<?php wp_footer(); ?>
	<?php woo_foot(); ?>
	</body>
</html>
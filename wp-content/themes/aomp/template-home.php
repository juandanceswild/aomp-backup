<?php
/**
 * Template Name: Homepage
 *
 * 
 *
 * 
 */

 get_header();

 ?>




    <div id="featured-text" class="container-fluid hidden-xs">
        <div class="container">
            
            <div class="row">
                <div class="text-center"><?php if ( ! dynamic_sidebar( 'home_featured_txt' ) ) : ?><?php endif ?></div>
            </div>
            
        </div>
    </div>
    
    
    <div id="featured-slideshow" class="container-fluid">
        <?php if ( ! dynamic_sidebar( 'home_slider' ) ) : ?><?php endif ?>
    </div>

	<div class="top-band visible-xs">
	</div>

   
    <div class="container">
    
    	

            <div class="call-to-action">
            
                <div class="col-md-5 col-sm-5">
                    <div class="row">
                        <div class="home-cta-one col-md-12 col-sm-12 view view-first">
                            <?php if ( ! dynamic_sidebar( 'home_cta_one' ) ) : ?><?php endif ?>
                        </div>
                        
                        <div class="home-cta-two col-md-12 col-sm-12 view view-first">
                            <?php if ( ! dynamic_sidebar( 'home_cta_two' ) ) : ?><?php endif ?>
                        </div>
                    </div>
                </div>
                
                
                
                
                <div class="col-md-7 col-sm-7 hidden-xs">
                    <div class="row">
                        <div class="home-cta-three col-md-12 view view-first">
                            <?php if ( ! dynamic_sidebar( 'home_cta_three' ) ) : ?><?php endif ?>
                        </div>
                    </div>
                </div>
                
                
                <div class="clear"></div>
            </div>
        
        
      
            <div id="main-entry">
         	   <?php
                if ( is_home() && is_active_sidebar( 'homepage' ) ) {
                    dynamic_sidebar( 'homepage' );
                } else {
                    get_template_part( 'loop', 'index' );
                }
            	?>
             </div>
            

    </div>
	
    
		
<?php get_footer(); ?>
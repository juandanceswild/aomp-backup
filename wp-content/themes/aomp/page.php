<?php
/**
 * Page Template
 *
 */

get_header();
?>
<div class="container">     
   
   
   
            <div id="main-entry">                     
				<?php
                   if (have_posts()) { $count = 0;
                        while (have_posts()) { the_post(); $count++;
                            woo_get_template_part( 'content', 'page' ); 
                        }
                    }
                 ?>     
            </div>
            
            
	
</div>
<?php get_footer(); ?>
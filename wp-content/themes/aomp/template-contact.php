<?php
/**
 *  Template Name: Contact
 *
 */
global $woo_options, $post; 
 get_header();

 if ( is_paged() ) $is_paged = true; else $is_paged = false;
 $page_template = woo_get_page_template();
 
get_header();
?>
<div class="container contact">     
     
            <div id="main-entry">    
               <?php
				    $pagesubtitle = get_field( "page_sub_title" );
                           if (!empty($pagesubtitle)) { 
						   ?>
							  <div class="pagesubtitle">
                               <div class="subtitle">
                                     <div class="leftbg"></div>
                                   <div class="intitle">
                                        <h1> <?php echo $pagesubtitle; ?> </h1>
                                    </div>
                                    <div class="leftbg"></div>
                                    </div>
                             </div>
			        <?php   }  ?>
                              <div class="clearsp"></div>  
                            <div class="post-<?php echo $post->ID; ?> page type-page status-publish hentry">
                            <div class="entry">
                                  <div class="mainconform">
                                  <div class="leftaddress">
									<?php
                                      if ( have_posts() ) : 
                                      while ( have_posts() ) : the_post();
                                      the_content();
                                      endwhile; endif;
                                   ?> 
                                   </div><!-- leftaddress ends here-->
                                     <div class="rightconform">
                                              <?php echo do_shortcode('[contact-form-7 id="263" title="Contact Us"]'); ?>
                                     </div><!-- rightconform ends here-->
                           </div>  <!-- mainconform ends here -->
                      </div>
                 </div>  
            </div>
	</div>
<?php get_footer(); ?>

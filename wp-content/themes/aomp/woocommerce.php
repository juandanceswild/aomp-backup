<?php get_header();?>
<?php 
		    $currentpath=$_SERVER['REQUEST_URI'];
			$pageslug ="shop";
			if (preg_match($currentpath,$pageslug)) {
          
			   $url = wp_get_attachment_url( get_post_thumbnail_id(8) ); ?>
			 <?php  }else{
				   $cat_obj = $wp_query->get_queried_object();
				      if($cat_obj)    {
						$category_ID  = $cat_obj->term_id;
						$thumbnail_id = get_woocommerce_term_meta( $category_ID, 'thumbnail_id', true ); 
					    $url = wp_get_attachment_url( $thumbnail_id );
						 	  }  
					   } ?>
<style>
.prodcatimg{
	background-image:url(<?php echo $url; ?>);
	background-repeat:no-repeat;
	background-position:50% 50%;
	width:100%;
	min-height:180px;
}
</style>
<div class="container woo shop">    
     <script>
	jQuery(document).ready(function(){
	
	jQuery("#grid").click(function(){
		jQuery(this).addClass("active");
		jQuery("#list").removeClass("active");
		jQuery.cookie("gridcookie","grid",{path:"/"});
		jQuery("ul.products").fadeOut(300,function(){
	    jQuery(this).addClass("grid").removeClass("list").fadeIn(300)});return!1});
		jQuery("#list").click(function(){
		jQuery(this).addClass("active");jQuery("#grid").removeClass("active");jQuery.cookie("gridcookie","list",{path:"/"});
		jQuery("ul.products").fadeOut(300,function(){jQuery(this).removeClass("grid").addClass("list").fadeIn(300)});return!1});
		jQuery.cookie("gridcookie")&&jQuery("ul.products, #gridlist-toggle").addClass(jQuery.cookie("gridcookie"));if(jQuery.cookie("gridcookie")=="grid"){
		jQuery(".gridlist-toggle #grid").addClass("active");jQuery(".gridlist-toggle #list")
			.removeClass("active")}if(jQuery.cookie("gridcookie")=="list"){
			jQuery(".gridlist-toggle #list").addClass("active");jQuery(".gridlist-toggle #grid")
			.removeClass("active")}jQuery("#gridlist-toggle a").click(function(e){e.preventDefault()})
			
			//script for ipad shop page product content
	        var isIPad = window.matchMedia("(min-width:768px) and (max-width: 1024px)");
			if (isIPad.matches) {
			jQuery(".archive .shop .product div[itemprop='description']").each(function(){
					len=jQuery(this).text().length;
					if(len>80)
					{
					  jQuery(this).text(jQuery(this).text().substr(0,150)+' ');
					}
				  });
			}
		
			
			});
   </script>
    
    <div class="breadcrumbs navbar-left hidden-xs">
    <?php do_action('woo_custom_breadcrumb');  ?>
    </div>
    
    
    <div class="navbar-right set-nav hidden-xs">
    
        <nav class="gridlist-toggle">
       <?php if ( is_shop()){ ?> 
            <a href="#" id="list" title="<?php _e('List', ''); ?>"><span><?php _e('List', ''); ?></span></a> / <a href="#" class="active" id="grid" title="<?php _e('Grid', ''); ?>"><span><?php _e('Grid', ''); ?></span></a>
       <?php }?>
        </nav>
       <?php $args = array( 'prev_next' => true, 'prev_text' => __( '<', 'woothemes' ), 'next_text' => __( '>', 'woothemes' ), 'before' => '<div class="pagination woo-pagination">' . __( 'Page', 'woothemes' ) . '', 'after' => '</div>' ); ?> <?php woo_pagination( $args ); ?>
    
    </div>
    
    <div class="clear"></div>
    
    <div class="row woo-banner hidden-xs">
 	 <?php //if ( ! dynamic_sidebar( 'woo_banner' ) ) : ?><?php //endif ?>
       <?php if( ! is_single()){ ?>
       <div class="prodcatimg">
          <?php
				 $currentpath=$_SERVER['REQUEST_URI'];
			$pageslug ="shop";
			if (preg_match($currentpath,$pageslug)) {
				    $pagesubtitle = get_post_meta(8, 'page_sub_title', TRUE);
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
						 <?php   
						         }
			                   }else{ 
							   
							    $cat_obj = $wp_query->get_queried_object();
								$category_name = $cat_obj->name;
							   ?>
				                  <div class="pagesubtitle">
                               <div class="subtitle">
                                     <div class="leftbg"></div>
                                   <div class="intitle">
                                        <h1> <?php echo $category_name; ?> </h1>
                                    </div>
                                    <div class="leftbg"></div>
                                    </div>
                             </div>
                                  
				           <?php  }  ?>
					
                     </div> <!-- prodcatimg ends here -->
                     <?php } ?>
          
    </div>  <!-- woo-banner ends here -->
    
     <div id="featured-text" class="row visible-xs">
         <div class="text-center"><?php if ( ! dynamic_sidebar( 'home_featured_txt' ) ) : ?><?php endif ?></div>
      </div>
     
     
      
    <div id="main-entry">
    <div class="row">                     
    <?php woocommerce_content(); ?>
    </div>
    </div>
            
	
</div>
<?php get_footer(); ?>
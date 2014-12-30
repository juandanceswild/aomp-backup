<?php
/**
 *  Template Name: About
 *
 */
global $woo_options, $post; 
 get_header();

 if ( is_paged() ) $is_paged = true; else $is_paged = false;
 $page_template = woo_get_page_template();
 
get_header();
?>
<div class="container about">     
   
   
   
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
<!--<style>
.subtitle{
	 width:50%;
	 margin:0 auto;
}
.intitle{
	width:80%;
	background:#fff;
	float:left;
}
.leftbg{
	width:10%;
	height:26px;
	float:left;
	border-bottom: 2px solid #fad4c7;
    /*margin-top: 15px;*/
}
.intitle h1{
	color:#fad4c7;
	font-size:45px;
}
.clearsp{
	width:100%;
	clear:both;
}
</style>
-->
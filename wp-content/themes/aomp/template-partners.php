<?php
/**
 *  Template Name: Partners
 *
 */
 get_header();

 
 
get_header();
?>
<div class="container partners">     
   
   <div class="col-md-12">
   
                                
				<?php query_posts( 'post_type=partners'); ?>
                <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
          
          
                  <div class="col-md-4 col-sm-6 col-xs-12 partner-item">         
                  
                  <?php if ( has_post_thumbnail() ) { echo '<div class="thumbnail">'; the_post_thumbnail('partners-thumb'); echo '</div>'; } ?>
                  <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><h4 class="text-center"><?php the_title(); ?></h4></a>
                  </div>
                  
          
           	    <?php endwhile; ?>
            
	</div>
    
</div>
<?php get_footer(); ?>
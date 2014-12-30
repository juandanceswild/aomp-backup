<?php
/**
 * Template Name: Blog
 *
 * The blog page template displays the "blog-style" template on a sub-page. 
 *
 * 
 */

 get_header();
 global $woo_options;
?>      
   
   
   
   

    <div class="container blog">
    <?php query_posts( array( 'posts_per_page' => 1 ) ); ?>
    
     <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="blog-entry">
        <div class="date"><p><?php the_time('j.m'); ?><br><?php the_time('Y'); ?></p></div>
        <h1 class="title"><?php the_title() ;?></h1>	
        <a href="<?php the_permalink()?>"><?php if ( has_post_thumbnail() ) {  echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; } ?></a>
        <div class="content"><?php the_excerpt(); ?></div>
        <div class="read-more"><a href="<?php the_permalink()?>">Read More...</a></div>
	</div>

	
	
	
    
	<?php endwhile; else: ?>
    <?php endif; ?>
    
    
<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12  rtl-posts">    

<?php $orig_post = $post;
global $post;
$categories = get_the_category($post->ID);
if ($categories) {
$category_ids = array();
foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
$args=array(
'category__in' => $category_ids,
'post__not_in' => array($post->ID),
'posts_per_page'=> 4, // Number of related posts that will be shown.
'caller_get_posts'=>1
);
$my_query = new wp_query( $args );
if( $my_query->have_posts() ) {
echo '<div class="related-posts"><h4>Related Posts...</h4><ul>';
while( $my_query->have_posts() ) {
$my_query->the_post();?>
<li class="col-md-3 col-sm-3 col-xs-12">

<div class="relatedthumb">
    <a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"> 
    <?php if ( has_post_thumbnail() ) { echo '<div class="thumbnail">'; the_post_thumbnail('related-thumb'); echo '</div>'; } ?>
    </a>
</div>

<div class="relatedcontent relconxs">
	<a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><h5><?php the_title(); ?></h5></a>
</div>

</li>
<?php
}
echo '</ul></div>';
}
}
$post = $orig_post;
wp_reset_query(); ?>    
 
</div> 
 
 
 
    
</div>
            
		
<?php get_footer(); ?>
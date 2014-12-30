<?php
/**
 * Single product short description
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post;

if ( ! $post->post_excerpt ) return;
?>
<div itemprop="description">
<?php //echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
       <?php
			 if(!is_single()){
				$content = apply_filters( 'woocommerce_short_description', $post->post_excerpt );
				   //$content = get_the_content('',FALSE,'');
			    $content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]>', $content);
				 /*echo substr($content,0,860);*/
				 echo substr($content,0,570);
				
				 }else{
					 
					 echo apply_filters( 'woocommerce_short_description', $post->post_excerpt );
					 
				}
			?>
</div>

<?php
// Register widgetized areas
if ( ! function_exists( 'the_widgets_init' ) ) {
	function the_widgets_init() {
	    if ( ! function_exists( 'register_sidebars' ) )
	        return;
	
		} // End the_widgets_init()
}

add_action( 'init', 'the_widgets_init' );  
?>
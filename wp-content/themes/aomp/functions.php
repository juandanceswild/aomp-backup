<?php
/*-----------------------------------------------------------------------------------*/
/* Start WooThemes Functions - Please refrain from editing this section */
/*-----------------------------------------------------------------------------------*/

// Set path to WooFramework and theme specific functions
$functions_path = get_template_directory() . '/functions/';
$includes_path = get_template_directory() . '/includes/';

// Don't load alt stylesheet from WooFramework
if ( ! function_exists( 'woo_output_alt_stylesheet' ) ) {
	function woo_output_alt_stylesheet () {}
}

// Define the theme-specific key to be sent to PressTrends.
define( 'WOO_PRESSTRENDS_THEMEKEY', 'tnla49pj66y028vef95h2oqhkir0tf3jr' );

// WooFramework
require_once ( $functions_path . 'admin-init.php' );			// Framework Init

if ( get_option( 'woo_woo_tumblog_switch' ) == 'true' ) {
	//Enable Tumblog Functionality and theme is upgraded
	update_option( 'woo_needs_tumblog_upgrade', 'false' );
	update_option( 'tumblog_woo_tumblog_upgraded', 'true' );
	update_option( 'tumblog_woo_tumblog_upgraded_posts_done', 'true' );
	require_once ( $functions_path . 'admin-tumblog-quickpress.php' );	// Tumblog Dashboard Functionality
}

/*-----------------------------------------------------------------------------------*/
/* Load the theme-specific files, with support for overriding via a child theme.
/*-----------------------------------------------------------------------------------*/

$includes = array(
				'includes/theme-options.php', 			// Options panel settings and custom settings
				'includes/theme-functions.php', 		// Custom theme functions
				'includes/theme-actions.php', 			// Theme actions & user defined hooks
				'includes/theme-comments.php', 			// Custom comments/pingback loop
				'includes/theme-js.php', 				// Load JavaScript via wp_enqueue_script
				'includes/sidebar-init.php', 			// Initialize widgetized areas
				'includes/theme-widgets.php'			// Theme widgets
				);

// Theme-Specific
$includes[] = 'includes/theme-advanced.php';			// Advanced Theme Functions
$includes[] = 'includes/theme-shortcodes.php';	 		// Custom theme shortcodes
// Modules
$includes[] = 'includes/woo-layout/woo-layout.php';
$includes[] = 'includes/woo-meta/woo-meta.php';
$includes[] = 'includes/woo-hooks/woo-hooks.php';

// Allow child themes/plugins to add widgets to be loaded.
$includes = apply_filters( 'woo_includes', $includes );
			
foreach ( $includes as $i ) {
	locate_template( $i, true );
}

// Load WooCommerce functions, if applicable.
if ( is_woocommerce_activated() ) {
	locate_template( 'includes/theme-woocommerce.php', true );
}

// WooTumblog Loader
if ( get_option( 'woo_woo_tumblog_switch' ) == 'true' ) {
define( 'WOOTUMBLOG_ACTIVE', true ); // Define a constant for use in our theme's templating engine.
require_once ( $includes_path . 'tumblog/theme-tumblog.php' );		// Tumblog Output Functions
// Test for Post Formats
if ( get_option( 'woo_tumblog_content_method' ) == 'post_format' ) {
	require_once( $includes_path . 'tumblog/wootumblog_postformat.class.php' );
} else {
	require_once ($includes_path . 'tumblog/theme-custom-post-types.php' );	// Custom Post Types and Taxonomies
}

// Test for Post Formats
if ( get_option( 'woo_tumblog_content_method' ) == 'post_format' ) {
    global $woo_tumblog_post_format; 
    $woo_tumblog_post_format = new WooTumblogPostFormat(); 
    if ( $woo_tumblog_post_format->woo_tumblog_upgrade_existing_taxonomy_posts_to_post_formats()) {
    	update_option( 'woo_tumblog_post_formats_upgraded', 'true' );
    }
}
}

if ( ! is_admin() ) {
// Output stylesheet and custom.css after Canvas custom styling
remove_action( 'wp_head', 'woothemes_wp_head' );
add_action( 'woo_head', 'woothemes_wp_head' );
if ( get_option( 'woo_woo_tumblog_switch' ) == 'true' && get_option( 'woo_custom_rss' ) == 'true' ) {
	add_filter( 'the_excerpt_rss', 'woo_custom_tumblog_rss_output' );
	add_filter( 'the_content_rss', 'woo_custom_tumblog_rss_output' );
}
}

/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below */
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'woocommerce' );


function custom_excerpt_length( $length ) {
	return 115;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
function loop_columns() {
return 3; // 3 products per row
}
}

// Display 6 products per page.
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 6;' ), 20 );




//Excerpt for products in shop page
add_action('woocommerce_after_shop_loop_item_title','woocommerce_template_single_excerpt', 10);




//Remove related products
function wc_remove_related_products( $args ) {
  return array();
}

add_filter('woocommerce_related_products_args','wc_remove_related_products', 10);


//Remove woo tabs
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
 
function woo_remove_product_tabs( $tabs ) {
 
unset( $tabs['description'] ); // Remove the description tab
unset( $tabs['reviews'] ); // Remove the reviews tab
unset( $tabs['additional_information'] ); // Remove the additional information tab
 
return $tabs;
 
}



//up sells
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_upsells', 15 );
 
    if ( ! function_exists( 'woocommerce_output_upsells' ) ) {
        function woocommerce_output_upsells() {
        woocommerce_upsell_display( 4,1 ); // Display 3 products in 1 row
    }
}




//Reposition WooCommerce breadcrumb 
function woocommerce_remove_breadcrumb(){
remove_action( 
    'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
}
add_action(
    'woocommerce_before_main_content', 'woocommerce_remove_breadcrumb'
);

function woocommerce_custom_breadcrumb(){
    woocommerce_breadcrumb();
}

add_action( 'woo_custom_breadcrumb', 'woocommerce_custom_breadcrumb' );



add_filter( 'woocommerce_breadcrumb_defaults', 'jk_change_breadcrumb_delimiter' );
function jk_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = ' &gt; ';
	return $defaults;
}


add_action( 'woocommerce_product_thumbnails', 'woocommerce_template_single_startsinfo', 11 );

function woocommerce_template_single_startsinfo() { ?>

<div class="roll-over">
<p>Roll over detail zoom</p>
</div>


<?php }


add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
global $woocommerce;
ob_start();
?>
 <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">Cart <span class="bag"><span class="number"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></span></span></a>
<?php
$fragments['a.cart-contents'] = ob_get_clean();
return $fragments;
}




add_filter('wp_nav_menu_items', 'add_search_form', 10, 2);

 function add_search_form($items, $args) {
          if( $args->theme_location == 'primary-menu' )
          $items .= '<li class="search"><a href="javascript:void(0)" class="menu-toggle">Search</a></li>';
     return $items;
}



/*
add_filter('wp_nav_menu_items','add_custom_in_menu', 10, 2);

function add_custom_in_menu( $items, $args ) 
{
    if( $args->theme_location == 'primary-menu' ) // only for primary menu
    {
        $items_array = array();
        while ( false !== ( $item_pos = strpos ( $items, '<li', 1 ) ) )
        {
            $items_array[] = substr($items, 0, $item_pos);
            $items = substr($items, $item_pos);
        }
        $items_array[] = $items;
        array_splice($items_array, 0, 0, ' <li class="menu_item"><a href="' . $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) ) . '">Shop</a><ul>'custom_cat_shop().'</ul></li>'         ); // insert custom item after 2nd one

        $items = implode('', $items_array);
    }
    return $items;
}

*/
/*LAYOUT FOR CART*/



add_action('woocommerce_before_cart', 'cart_heading', 10);


function cart_heading(){
	 global $woocommerce; 
                 if($woocommerce){?>
				 <div class="cart-heading"><h2>Shopping Cart</h2></div>
                <?php }else{}
	}



add_action('woocommerce_after_cart_collaterals', 'bt_checkout', 10);



function bt_checkout() {
 echo' <input type="submit" class="checkout-button button alt wc-forward" name="proceed" value="Proceed to Checkout" />';
}





add_action('woocommerce_before_cart_table', 'my_theme_wrapper_start', 10);


add_action('woocommerce_after_cart_table', 'my_theme_wrapper_end', 10);





function my_theme_wrapper_start() {
  echo '<div>';
}

function my_theme_wrapper_end() {
  echo '</div>';
}

  


// enables wigitized sidebars
	if ( function_exists('register_sidebar') )



	register_sidebar(array(
		'id'=> 'home_slider',
		'name'=>'Slideshow Homepage',
		'before_widget' => '<div class="homepage-slider">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
	register_sidebar(array(
		'id'=> 'home_featured_txt',
		'name'=>'Homepage Featured Text',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
	register_sidebar(array(
		'id'=> 'home_cta_one',
		'name'=>'CTA Homepage #1',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		  'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
	
	register_sidebar(array(
		'id'=> 'home_cta_two',
		'name'=>'CTA Homepage #2',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
	
	register_sidebar(array(
		'id'=> 'home_cta_three',
		'name'=>'CTA Homepage #3',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));


	register_sidebar(array(
		'id'=> 'woo_banner',
		'name'=>'Products Page Banner',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));



	register_sidebar(array(
		'id' => 'footer_section',
		'name'=>'Footer Right Section',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));



add_theme_support( 'menus' );
	if ( function_exists( 'register_nav_menus' ) ) {
	  	register_nav_menus(
	  		array(
	  		  
	  		  'footer-menu' => 'Footer Menu',
	  	
	  		)
	  	);
	}
	
	
	
add_filter('wp_nav_menu_items', 'add_link_antarcti', 10, 2);

 function add_link_antarcti($items, $args) {
          if( $args->theme_location == 'footer-menu' )
          $items .= '<li><a href="http://antarcti.cc">site by antarcti.cc</a></li>';
     return $items;
}

	
	
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------*/	



if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'partners-thumb', 175, 175, true ); //(cropped)
}


if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'related-thumb', 150, 150, true ); //(cropped)
}



	
	// Retails
function wpt_event_posttype() {
	register_post_type( 'partners',
		array(
			'labels' => array(
				'name' => __( 'Partners' ),
				'singular_name' => __( 'Partner' ),
				'add_new' => __( 'Add New Partner' ),
				'add_new_item' => __( 'Add New Partner' ),
				'edit_item' => __( 'Edit Partner' ),
				'new_item' => __( 'Add a New Partner' ),
				'view_item' => __( 'View Partner' ),
				'search_items' => __( 'Search Partner' ),
				'not_found' => __( 'No Partner found' ),
				'not_found_in_trash' => __( 'No Partner found in trash' )
			),
			'public' => true,
			'supports' => array( 'title', 'editor', 'thumbnail', 'comments' ),
			'capability_type' => 'post',
			'rewrite' => array('slug','pages'),
			'menu_position' => 5,
			//'register_meta_box_cb' => 'add_events_metaboxes'
		)
	);
}
add_action( 'init', 'wpt_event_posttype' );
	
	
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/	

	
	
	
	
	
/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here or the sky will fall down */
/*-----------------------------------------------------------------------------------*/
?>
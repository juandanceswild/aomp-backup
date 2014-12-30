<?php
 $heading_tag = 'span';
 if ( is_home() OR is_front_page() ) { $heading_tag = 'h1'; }

 $site_title = get_bloginfo( 'name' );
 $site_url = home_url( '/' );
 $site_description = get_bloginfo( 'description' );
 
 global $woo_options;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>" />
<title><?php woo_title(); ?></title>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_bloginfo( 'stylesheet_url' ) ); ?>" media="all" />
<link href='https://fonts.googleapis.com/css?family=Alegreya+Sans:500' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Petit+Formal+Script' rel='stylesheet' type='text/css'>
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>" />
<?php wp_head(); ?>
<?php woo_head(); ?>
</head>
<body <?php body_class(); ?>>

<!--START HEADER-->  
<div class="container-fluid top-navi hidden-xs">
    <div class="container">
        <div class="navbar-right">
        
        <ul class="nav navbar-nav">
            
            <li>
                 <?php if ( is_user_logged_in() ) { ?><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>"><?php _e('Account','woothemes'); ?></a><?php } 
                 else { ?><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><?php _e('Account','woothemes'); ?></a>
                 <?php }"\n"?>
            </li>
            
		    <li class="cart-link">
                <?php global $woocommerce; ?>
                <?php if($woocommerce){ ?>
				 <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">Cart <span class="bag"><span class="number"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></span></span></a>
                <?php }else{}?>
                <ul class="box-cart">
                    <div class="hover-cart">
                    <?php
                        global $woocommerce;
                        if ( version_compare( WOOCOMMERCE_VERSION, "2.0.0" ) >= 0 ) {
                        the_widget( 'WC_Widget_Cart', 'title=' );
                        } else {
                        
                        }
                      ?>
                    </div>
               </ul>
             </li>
             
        </ul>
        
         <?php woo_top(); ?>
        
        </div>
    </div>
</div>



<div class="container">
      
	<div id="header" class="col-md-3 col-sm-3 col-xs-12">
           
            <div id="logo" class="col-md-12 col-sm-12 col-xs-7">
            <?php if ( isset( $woo_options['woo_logo'] ) && ( '' != $woo_options['woo_logo'] ) ) {
                    $logo_url = $woo_options['woo_logo'];
                    if ( is_ssl() ) $logo_url = str_replace( 'http://', 'https://', $logo_url );
    
                    echo '<a href="' . esc_url( $site_url ) . '" title="' . esc_attr( $site_description ) . '"><img src="' . esc_url( $logo_url ) . '" alt="' . esc_attr( $site_title ) . '" /></a>' . "\n";
                } 
                
                echo '<' . $heading_tag . ' class="site-title"><a href="' . esc_url( $site_url ) . '">' . $site_title . '</a></' . $heading_tag . '>' . "\n";
                if ( $site_description ) { echo '<span class="site-description">' . $site_description . '</span>' . "\n"; }
            ?>
            </div>
            
            <div class="col-xs-5 visible-xs">
                <h3 class="nav-toggle icon"><a href="#navigation"></a></h3>
            </div>
            
	</div>
    
    <div class="xs-clear"></div>
    <div class="row visible-xs"><div class="xs-head"></div></div>
    
	<?php woo_header_after(); ?>
	
  </div>  
<!--END HEADER-->
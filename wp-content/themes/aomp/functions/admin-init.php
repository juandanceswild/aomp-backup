<?php
// File Security Check
if ( ! defined( 'ABSPATH' ) ) exit;

/*-----------------------------------------------------------------------------------*/
/* WooThemes Framework Version & Theme Version */
/*-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/* Load the required Framework Files */
/*-----------------------------------------------------------------------------------*/

$functions_path = get_template_directory() . '/functions/';
$classes_path = $functions_path . 'classes/';

require_once ( $functions_path . 'admin-functions.php' );					// Custom functions and plugins
require_once ( $functions_path . 'admin-setup.php' );						// Options panel variables and functions
require_once ( $functions_path . 'admin-custom.php' );						// Custom fields
require_once ( $functions_path . 'admin-interface.php' );					// Admin Interfaces (options,framework, seo)
require_once ( $functions_path . 'admin-framework-settings.php' );			// Framework Settings
require_once ( $functions_path . 'admin-seo.php' );							// Framework SEO controls
require_once ( $functions_path . 'admin-sbm.php' ); 						// Framework Sidebar Manager
require_once ( $functions_path . 'admin-medialibrary-uploader.php' ); 		// Framework Media Library Uploader Functions // 2010-11-05.
require_once ( $functions_path . 'admin-hooks.php' );						// Definition of WooHooks

if ( get_option( 'framework_woo_woonav' ) == 'true' ) {
	require_once ( $functions_path . 'admin-custom-nav.php' );				// Woo Custom Navigation
}

require_once ( $functions_path . 'admin-shortcodes.php' );					// Woo Shortcodes

// Load certain files only in the WordPress admin.
if ( is_admin() ) {
    require_once ( $functions_path . 'admin-shortcode-generator.php' ); 		// Framework Shortcode generator // 2011-01-21.
    require_once ( $functions_path . 'admin-backup.php' ); 						// Theme Options Backup // 2011-08-26.
}
?>
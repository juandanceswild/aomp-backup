<?php
# Database Configuration
define( 'DB_NAME', 'wp_aomp' );
define( 'DB_USER', 'aomp' );
define( 'DB_PASSWORD', 'dUHWDf7Sb5pi1uN5RHp1' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         '%fSELo:p:dXkHGY^3xQeI|z_dbcf.Mju=a[{w3-E@TW=Ld;]*`@D!h^Ym[;TE]Wg');
define('SECURE_AUTH_KEY',  '(-LJ[5|-@YWI:H?zMV*e`0:zZ/B@9BkTeHn~<j}*}w{l=4R=u7{pGn9UX#hHv|mm');
define('LOGGED_IN_KEY',    'eQxU1j6kclW-m6]R_*fI:nBE)EzA/SKvm-Em:&z#h7hUTk-=_jh<C34VXS[-jnYe');
define('NONCE_KEY',        '32ZzBrhc1CR>W+tv1P7?3%o-6.q@ G2H+V-|p0ks#cEgA%WEWap`b|,1]3grD7k<');
define('AUTH_SALT',        'a5S/q9DRATT&VA]vQL7s%Socb+{xLWW.CP+MOb#X:H4$5$ict&O;0T0AcoAg#j+@');
define('SECURE_AUTH_SALT', 'oGQ%Bo&jk6!c&riJrrz-(^ntA+~L3`wZO1>Dqz)SqZtWWW2KK9}QfC%uJ_g.m~kf');
define('LOGGED_IN_SALT',   '% LOI}*+X,CEHmO9VjkQqB$~Uv>vYk5BM6*,$MStZu1S[]aLJR/_nvF8_S5h5M&o');
define('NONCE_SALT',       '=+XPp8`npt?b#vK]!z+X,:>zT!bM)/1kf~@DKJ3@IoMZ-J_;u?Db|P*H 2QNpPg.');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'aomp' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', '3ee324006531d4b2690e0c0c60558854f2045e85' );

define( 'WPE_FOOTER_HTML', "" );

define( 'WPE_CLUSTER_ID', '2109' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_CACHE_TYPE', 'generational' );

define( 'WPE_LBMASTER_IP', '66.228.50.135' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'aomp.wpengine.com', );

$wpe_varnish_servers=array ( 0 => 'pod-2109', );

$wpe_special_ips=array ( 0 => '66.228.50.135', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}

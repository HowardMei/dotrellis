<?php
/**
* Initial: 28/06/2012 by Howard Mei
* Modified: 25/10/2013 by Howard Mei
* Modified: 20/07/2015 by Howard Mei
* Modified: 27/05/2017 by Howard Mei
*/
!defined('_WEBROOT_DIR_') && exit('_WEBROOT_DIR_ is NOT defined');
/**
 * Custom Dirs and Locations
 */
// Be able to move the original dirs to another place. No trailing slash, full paths only.

define('WP_CORE_DIR', _WEBROOT_DIR_ . '/' . WP_CORE_SLUG);
define('WP_USERFS_DIR', _WEBROOT_DIR_ . '/' . WP_USERFS_SLUG);
define('WP_CONTENT_DIR', _WEBROOT_DIR_ . '/' . WP_CONTENT_SLUG);

define('WPMU_PLUGIN_DIR', WP_CONTENT_DIR . '/' . WP_MUPLUGIN_SLUG);
define('WP_PLUGIN_DIR', WP_CONTENT_DIR . '/' . WP_PLUGIN_SLUG);
define('WP_LANG_DIR', WP_CONTENT_DIR . '/' . WP_LANG_SLUG);
define('WP_UPLOAD_DIR', (defined('WP_USERFS_DIR') ? WP_USERFS_DIR : WP_CONTENT_DIR) . '/' . WP_UPLOAD_SLUG);

/**
 * Define WordPress Abspath Again if not defined
 */
if (!defined('ABSPATH')) {
    define('ABSPATH', WP_CORE_DIR . '/');
}


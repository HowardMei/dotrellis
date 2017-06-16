<?php
/**
* Initial: 28/06/2012 by Howard Mei
* Modified: 25/10/2013 by Howard Mei
* Modified: 27/05/2017 by Howard Mei
**/

if ( defined( 'WP_ALLOW_MULTISITE' ) && WP_ALLOW_MULTISITE === True) {
    define('UPLOADBLOGSDIR', (defined('WP_USERFS_DIR') ? WP_USERFS_DIR : WP_CONTENT_DIR) . '/sites.dir');
    // define( 'UPLOADS', UPLOADBLOGSDIR . "/{$wpdb->blogid}/files/" );

    if (!defined('SITESDIR_CREATED') || SITESDIR_CREATED !== True) {
        if (defined('UPLOADBLOGSDIR') && file_exists(UPLOADBLOGSDIR . '/index.php')) {
            define('SITESDIR_CREATED', True);
        } else {
            define('SITESDIR_CREATED', False);
        }
    }

    if (defined('SITESDIR_CREATED') && SITESDIR_CREATED !== False) {
    // Automatically Activate the network
    // Follow the instructions in the dashboard before activate!
    // Which means sunrise.php and blog.dir are created, .htaccess is updated
        define('MULTISITE', True);
        define('SUBDOMAIN_INSTALL', True);
        define('DOMAIN_CURRENT_SITE', ROOT_DOMAIN);
        define('PATH_CURRENT_SITE', '/');
        define('SITE_ID_CURRENT_SITE', 1);
        define('BLOG_ID_CURRENT_SITE', 1);
        if ( file_exists(WP_CONTENT_DIR . '/sunrise.php') ) {
            define( 'SUNRISE', 'on');
        }
        define('NOBLOGREDIRECT', WP_HOME);
    }

/**
 * There is an url issue #27287 for multisite blogs with WordPress in it's own subdirectory
 * for use with projects such as https://github.com/roots/bedrock and
 * https://github.com/markjaquith/WordPress-Skeleton
 *
 * @see https://core.trac.wordpress.org/ticket/27287
 */
}



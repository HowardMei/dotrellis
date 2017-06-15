<?php

/** @var string Directory containing all of the site's files */
$root_dir = (defined('_ROOT_DIR_') ? _ROOT_DIR_ : dirname(__DIR__));

/** @var string Document Root */
$webroot_dir = $root_dir . '/web';

/**
 * Expose global env() function from oscarotero/env
 */
Env::init();

/**
 * Use Dotenv to set required environment variables and load .env file in root
 */
$dotenv = new Dotenv\Dotenv($root_dir);
if (file_exists($root_dir . '/.env')) {
    $dotenv->load();
    $dotenv->required(['DB_NAME', 'DB_USER', 'DB_PASSWORD', 'ROOT_DOMAIN']);
}

/**
 * Set up our global environment constant and load its config first
 * Default: production
 */
define('WP_ENV', env('WP_ENV'));
define('ROOT_DOMAIN', env('ROOT_DOMAIN') ?: 'localhost');
!defined('ROOT_DOMAIN') && exit('ROOT_DOMAIN is NOT defined');

$env_config = __DIR__ . '/environments/' . WP_ENV . '.php';

if (file_exists($env_config)) {
    require_once $env_config;
}

/**
 * App settings
 */
define( 'AUTOSAVE_INTERVAL', 60 );
define( 'EMPTY_TRASH_DAYS', 30 );
define( 'WP_CRON_LOCK_TIMEOUT', 60);
define( 'DISABLE_WP_CRON', env('DISABLE_WP_CRON') ?: False);
define( 'WP_MEMORY_LIMIT', env('WP_MEMORY_LIMIT') ?: '64M' );
define( 'WP_MAX_MEMORY_LIMIT', env('WP_MAX_MEMORY_LIMIT') ?: '256M' );
define( 'WP_DEFAULT_THEME', env('WP_DEFAULT_THEME') ?: 'twentyseventeen' );
define( 'WP_ALLOW_MULTISITE', env('WP_ALLOW_MULTISITE') ?: False );

/**
 * URLs
 */
define('WP_PROTO', env('WP_PROTO') ?: 'http');
// WP_HOME is the visiting path of wp index page which often is / or /blog
define('WP_HOME', env('WP_HOME') ?: WP_PROTO . '://' . ROOT_DOMAIN);
// WP_SITEURL must point to the relative location of wordpress installation.
define('WP_SITEURL', WP_PROTO . '://' . ROOT_DOMAIN . '/core');

/**
 * DB settings
 */
define('DB_NAME', env('DB_NAME'));
define('DB_USER', env('DB_USER'));
define('DB_PASSWORD', env('DB_PASSWORD'));
define('DB_HOST', env('DB_HOST') ?: 'localhost');
define('DB_CHARSET', env('DB_CHARSET') ?: 'utf8mb4');
define('DB_COLLATE', env('DB_COLLATE') ?: 'utf8mb4_unicode_ci');
$table_prefix = env('DB_PREFIX') ?: 'wpdb_';

/**
 * Authentication Unique Keys and Salts
 */
define('AUTH_KEY', env('AUTH_KEY'));
define('SECURE_AUTH_KEY', env('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY', env('LOGGED_IN_KEY'));
define('NONCE_KEY', env('NONCE_KEY'));
define('AUTH_SALT', env('AUTH_SALT'));
define('SECURE_AUTH_SALT', env('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT', env('LOGGED_IN_SALT'));
define('NONCE_SALT', env('NONCE_SALT'));

/**
 * Bootstrap WordPress
 */
if (!defined('ABSPATH')) {
    define('ABSPATH', $webroot_dir . '/core/');
}

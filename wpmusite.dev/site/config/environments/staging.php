<?php
/** Staging */
ini_set('error_reporting', E_ALL);
ini_set("display_errors", 0);
ini_set("log_errors", 1);
//Define where do you want the log to go, syslog or a file of your liking with
ini_set("error_log", "syslog"); // or ini_set("error_log", "/path/to/syslog/file");
define('SAVEQUERIES', true);
define('WP_DEBUG', true);
define('SCRIPT_DEBUG', true);
define('WP_DEBUG_DISPLAY', false);

// Disallow the entire automatic updater including core/translation/component etc.
define('AUTOMATIC_UPDATER_DISABLED', false );
// Enable/Disable wordpress core updates, including minor and major.
define('WP_AUTO_UPDATE_CORE', false );
// Prevents dbDelta() and the upgrade functions from doing expensive queries against global tables.
##define('DO_NOT_UPGRADE_GLOBAL_TABLES', false); // This definition true/false will cause installation error,
// which locks schema upgrades in wp-admin/includes/schema.php from performing schema upgrades.
// Disable themes & plugins editing & upgrading but current_user_can('edit_plugins') may override it
define('DISALLOW_FILE_EDIT',true);
// Prevent any file modifications;Disable theme/Plugin editor;Disable theme/plugin/core updates.
define('DISALLOW_FILE_MODS',false);

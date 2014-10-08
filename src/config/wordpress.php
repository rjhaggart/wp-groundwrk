<?php

/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

define('APP_ROOT', dirname(__DIR__));
define('APP_ENV', getenv('APPLICATION_ENV'));

if (file_exists(APP_ROOT . '/config/env/local.php')) {
	require APP_ROOT . '/config/env/local.php';
} else {
	require APP_ROOT . '/config/env' . APP_ENV . '.php'; 
}

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', APP_ROOT . '/public/site/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

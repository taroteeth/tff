<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

 //local

 // define('DB_NAME', 'tff');
 // define('DB_USER', 'root');
 // define('DB_PASSWORD', 'root');
 // define('DB_HOST', 'localhost');
 // define('DB_CHARSET', 'utf8');
 // define('DB_COLLATE', '');

 // staging

 define('DB_NAME', 'devontri_tff');
 define('DB_USER', 'devontri_devon');
 define('DB_PASSWORD', 'Forsaken_26!');
 define('DB_HOST', 'localhost');
 define('DB_CHARSET', 'utf8');
 define('DB_COLLATE', '');

//  // Set your environment/url pairs
// $environments = array(
//   'local'       => 'localhost',
//   'staging'     => 'known-development.com',
//   'production'  => 'thinkforwardfinancial.com'
// );
//
// // Get the hostname
// $http_host = $_SERVER['HTTP_HOST'];
// // Loop through $environments to see if there’s a match
// foreach($environments as $environment => $hostname) {
//   if (stripos($http_host, $hostname) !== FALSE) {
//     define('ENVIRONMENT', $environment);
//     break;
//   }
// }
//
// // Exit if ENVIRONMENT is undefined
// if (!defined('ENVIRONMENT')) exit('No database configured for this host');
// // Location of environment-specific configuration
// $wp_db_config = 'wp-config/wp-db-' . ENVIRONMENT . '.php';
// // Check to see if the configuration file for the environment exists
// if (file_exists(__DIR__ . '/' . $wp_db_config)) { require_once($wp_db_config); } else {
// // Exit if configuration file does not exist
// exit('No database configuration found for this host'); }

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

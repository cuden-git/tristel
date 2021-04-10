<?php

// Configuration common to all environments
include_once __DIR__ . '/wp-config.common.php';

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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('REVISR_WORK_TREE', '/home/customer/www/tristel.com/public_html/'); // Added by Revisr
define( 'DB_NAME', 'simonr94_wp949' );

/** MySQL database username */
define( 'DB_USER', 'simonr94_wp949' );

/** MySQL database password */
define( 'DB_PASSWORD', 'SpI8j77[(f' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '1rk2xoe1zt2d4ky58affbs1h34zylreybgiecnpwrccqv7tdq12izcrac93sz2lx' );
define( 'SECURE_AUTH_KEY',  'm5wdiel1lcs169uj0ql17zgogxnqdecsiuj8dsrwinpppusq2lphdnnwaqnxcy6u' );
define( 'LOGGED_IN_KEY',    'utnfxvkiklbp0g0frawb0no2rkksheyqzsdx3xtz8tk2joj8xp1aremoh6jth3el' );
define( 'NONCE_KEY',        '4sff6i8uf2kdgydmfod8biv6khbpmranwr0osb9hfxanj7qc96cewthcimrtckos' );
define( 'AUTH_SALT',        'rsmouhnvdh5fvoeimfaezml56tsynbjzokhjz1mklib22x3rh8v8yephhpnehv0r' );
define( 'SECURE_AUTH_SALT', 'ntiolnqm30z5gu8b8ojh0ihjx2f0d8tumsu6vw6ix7714acyb3py3mtj24fyupv4' );
define( 'LOGGED_IN_SALT',   'ftsj0pk0tr6otjzia4nsjlq0h5goh1zklqucr66uirp18nsty5kgbnpw6gfkgg9h' );
define( 'NONCE_SALT',       'xiq7gu4sspibcp4sexs26trkxnnqfcmlvuepxjk9yrovv3wkeh9vjthh6kjoq96s' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpnv_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define( 'WP_MEMORY_LIMIT', '128M' );
define( 'WP_AUTO_UPDATE_CORE', false );

ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', true);

/* Multisite */
define( 'WP_ALLOW_MULTISITE', true );

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'www.tristel.com');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

// Setting default theme for new sites
define( 'WP_DEFAULT_THEME', 'customstrap' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

@include_once('/var/lib/sec/wp-settings.php'); // Added by SiteGround WordPress management system


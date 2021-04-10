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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'bA2ooZnzqoZrvcr1uNyFCR6KsBdvxvwUz0YfKvi9tmoAZFmXc2F13NFN6ukizzNDuUXLqHdOXB/BDm5KQ8ZTWw==');
define('SECURE_AUTH_KEY',  'H8PMmZKjSKW0u8oIsFwm9ShT8IllG+81V4tOiL4zxvxIHCIBc98OjLnsU6QtEmacttm5C1mgJ6QtE/m4xJEFmA==');
define('LOGGED_IN_KEY',    'taMbZNSHR7Oe5DmHGI8gDj1K85naPW0w/Eq0AURFtEJqxgD2xmHCi9LG7kFnU0iBsOGHx7Oqc+SlUSLWX2/TAA==');
define('NONCE_KEY',        'p8PWED6kj00HoF7SkUxt1sG7RYpDCGauvTYdRkQLwZqw/vQIGKUXkq92x9DR5aoH36RXqCLRgoXoSlC93UZHwA==');
define('AUTH_SALT',        '3aiN6DwKpU4Nq2jIuGp6ze6gbR3xzbKAA/MzxBUAvEBc1bPwF2Rj4GaeA2Tk6sUGevazXWb80onCxpOTgNAWvg==');
define('SECURE_AUTH_SALT', 'Gk2NIvTSK/5yq/wIMRGDEwwqMj+0hrvwepWjc1Cp/Qn77d2RsANT8uVu8GI74BLPNvLYAGwtjn/BuINNZsxCmw==');
define('LOGGED_IN_SALT',   'OOuw2dymP8v7/E+1zP/wDd0A+nDjUTVVjuqoX7MYrW1IZpo4PIkotIZ6BBTipxgIyX8Z78C8DyNXLHwvlwC44Q==');
define('NONCE_SALT',       't8/58UiT7T+1Wbsh04UVLyyivzQZLoetka7E6utzurlcofwlF51thetsCXP9/sKu2g7S+O2/W1znCQMWC3JPKQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpnv_';


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'tristel.local');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

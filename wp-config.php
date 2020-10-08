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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'eneizadatabase' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'H#VuZ*fD%vwq5Na8h580#*FG 6{1Bp/eowZQ{U8QYbUon{7Lbk$8~!P5RB$o8| N' );
define( 'SECURE_AUTH_KEY',  'Sav+X`ZHE|XsLLlt`p!fVRul{5Pvy.O -4iybY ffucF]<?Of7{:d7YRgg}b%9?a' );
define( 'LOGGED_IN_KEY',    '*^fia#ng@t:0%_/D7)lrU`(%NgOL>BuQF4[`(><d;?E(gY- y$Y~rUeCl9w0[J)N' );
define( 'NONCE_KEY',        'c,uVg2J#ITk.X!N4&)XUfP@hk#x5BoB4oq~ZApt1x<LIZrf?q~ZC#HVP0VSV]$lV' );
define( 'AUTH_SALT',        '5ESp3n<,U$ngd.8R]Q:Dho@_<N4`t2jR`jd!j#vQGgs*kM0fR>d?;?zps;>O#Nr)' );
define( 'SECURE_AUTH_SALT', '~8nMu.!E?z)GNUo_iLkgk2Ub&hfaa?lp?(n+NU~Z2.w@Yvqj9aG<g!IB0`KGmy2G' );
define( 'LOGGED_IN_SALT',   'y%Yc=NOC`etoL.{H;Uc*0Q!*b~#-6eW#|4c=O}xV{7(/Y5Z^,k6eJKxg*0JCqQkG' );
define( 'NONCE_SALT',       'Y$jcU&K9SVzY!<Gh>(V09zlAfRLbZCO[56Rmhx0>90?EqR:Lbi@vff$vbuRW.}y)' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

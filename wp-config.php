<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'wantedsurf' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '-reQ27.5+7N;g>3cClp4J)aFath9T4F1;K1n,gyJx^Ol}:EZT2uRQ<F<<i=tkSf4' );
define( 'SECURE_AUTH_KEY',  ']L}2>+R;_o YXpr[r;H/$/(`0pBzFr@q4I$C^GX7SG)-&PGl_cNRX[xr)@D.~b<|' );
define( 'LOGGED_IN_KEY',    ';R7&H.t8.^M@0&f|_#,FGS#).^7VIr:FVBrdn^&,kq_^ZrlNm%}u``rKB8{5V1,8' );
define( 'NONCE_KEY',        '@_Iuj9_3C7g4X0,5e-8TwcYnuOHU?~M)k{H_d@17Q`ubx+*q`o_ft,:>IR[7`)uL' );
define( 'AUTH_SALT',        'Pz/NOIEm^CkX$>`.bpP%1_<U#YY;(v+w2d@q:_`OxM]s (WBS3C9~mq)!wu#3HH&' );
define( 'SECURE_AUTH_SALT', 'PgHx01Fz`]]#5MPyD9?Xmr*WH&Snph2:WQt@wd.NoYc{6NCoC8 BOJZ_#?a&Ip!x' );
define( 'LOGGED_IN_SALT',   'RH9>N$1H|Um.a,3QzHqX::QfXw6[2-4+=3z}`8s~Ba/d6p:6](IDUhJi,J4l>v+u' );
define( 'NONCE_SALT',       '9d1FA-%ail6hm<Fs`g1`/@=8>24]1`<]P`pSug#U1O}*5*t_m7nWKrOp|=M11>tA' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'dc_';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
define('WP_ALLOW_REPAIR', true);
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

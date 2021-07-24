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
define( 'DB_NAME', 'wink' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '9oO8HQYcb;j aIVO<oB@`}I+rT3`e!~-~q[mfQIkh%m#p^3dUE@g6}^=&nQ9U;Ld' );
define( 'SECURE_AUTH_KEY',  '|IT-?ln!Rh^W+cYm?7 ;BBu/;}6v-u5A2lFE/b,7Tz$K<-znv7Fc%ce/o?AEN*$w' );
define( 'LOGGED_IN_KEY',    '~hU LCck4cD3jPYo}lQh^zGv27WfawS73|pE$)UwZWqnBd(J*NU#?joQ?|u(5`87' );
define( 'NONCE_KEY',        '#!o;10{.%%{PXpR(Wi>(e_uI%;1R{o#VU]2ZAz#:`[}|%.f&b(wc+Ek<0UD3%i`g' );
define( 'AUTH_SALT',        ',&NE=vn3D:W8:N3ra{B(5S0*N05e45[~W^](}%gv/zy$;cwgChsWqa*eL0hop->c' );
define( 'SECURE_AUTH_SALT', 'AD!gU63DEcz!3L6uMh :Jpw1=wAJ-gqK3[GzH (sltcic[k^mI}S~oy6+`Iqu.j8' );
define( 'LOGGED_IN_SALT',   '*Bd22v#6Wg&^JuX,FPb+q#[X5#%`fN~2<#F()XG|6T`R m;w,(h&WNm4GACCvO7M' );
define( 'NONCE_SALT',       'mCW{:WA8;^aasWA$`Fb<;x)a7G<(-(,6wA,ggBXi;=9v^b..7|6g0ooiB+df_`P-' );

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
define( 'WP_DEBUG', true );

define('PLL_WPML_COMPAT', false);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

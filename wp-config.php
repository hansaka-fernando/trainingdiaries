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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'hhkfernandollc_himarur_db' );

/** Database username */
define( 'DB_USER', 'hhkfernandollc_himarur_db' );

/** Database password */
define( 'DB_PASSWORD', 'e5$q1pHnoHz48Smvh' );

/** Database hostname */
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
define( 'AUTH_KEY',         '@+hL9, %Bw<g;Lt(xP4u2t<-=m oU4cY0T?MRJ9qsx|?BJaK; ]?[rh-W)h/W}op' );
define( 'SECURE_AUTH_KEY',  '? g4TSj,`+JzS^N/)P1@0+.jI8<H.8FD`x_vX2qHM*drW}A4V,#?xZ?{wHKo}=b*' );
define( 'LOGGED_IN_KEY',    '}wH;1=p=+5q~KxRzO]&Mn|~Fk+;]/cG/spx[6@fc3hoVS)5?eZk4xg*N@PEKKw?g' );
define( 'NONCE_KEY',        'iV2C~xr>rp3h?IkV!$;eibFYamG3sXR~S[>$P;#IQsz1l+lw4WT/oF[l$0u D-Ek' );
define( 'AUTH_SALT',        'E4WfoFirnTqut_.#mbh%H07Bum>s?dc`vvo^YUvA{%h>8F-|Fe&kluM(y{xg&M`?' );
define( 'SECURE_AUTH_SALT', 'v6%Q7uCmAcon*AK1ysex,hB,a(l+%`=wDptk+[rWJJ#%>v0*EHL8&^#Xc/&MrkD~' );
define( 'LOGGED_IN_SALT',   '7n}jg,-fT(gS?5CBgPkOc.d=9C hae)H@~V&SS1b4s`iX~PJl)28hD<151,F-V_m' );
define( 'NONCE_SALT',       '9t3t05%<;]yFY>*i[cje_A9-^[?(#S}0uK-hM:8?HfTai>mkANz`b2nN01@WA5gr' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

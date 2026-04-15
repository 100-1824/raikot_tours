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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '})-Nk5Dd{M%$BC?{V,96dI}=WPRF?kf34 &ainTmPJ8[-oTNa<IUPeL=0BkWRR7e' );
define( 'SECURE_AUTH_KEY',   'J49;LyW(WQ.,D+-{N7N;V~qmb#EKB2`S!63oF_ FbXRg)8pH!6?sGf:mH]ty!YTh' );
define( 'LOGGED_IN_KEY',     'cK>/OxEAk=#zjY)_PGEWy0_6cC_p( y9Z@)Ol.R<Nt`i_StN|$a$}*GszE4iIsZg' );
define( 'NONCE_KEY',         ']8#PE^> #*y~/,t=6Ul+j(?iDbcU_17(kKDyig2G`EUSA[GMVMh-.Hr6U4Y2Zp}[' );
define( 'AUTH_SALT',         '#Q.9d>GTH2%(pz#I5*m%:QrM~Y%m*A}pey_T7~xO??Td.RbJ?@^32)z0{dhtZU.C' );
define( 'SECURE_AUTH_SALT',  '{n-VrV%r$2yhX0UWY`NwK5!N6J5`+!}Tbf:D1FP/-jYcmNWSR9sJ8Ae5&F3+mq;H' );
define( 'LOGGED_IN_SALT',    '3RaqF25.D;P>]GY8ChIi,p5o5~`I2~*_JJAt6$7h_}fXQc0w/]/>Nw1,^Da36%4V' );
define( 'NONCE_SALT',        '<R@]|0wBq(VcgPyC6@gY?bf2zyuv!RlxG(Q<~MNIgwo>R+I MSt=:oh?C^)ki;L{' );
define( 'WP_CACHE_KEY_SALT', 'yYhb6|~n}&)GiYl||V|pkN*i94~<`|kwg7`.<8Oj$;8%*sYYyCZ5u~)trhiHyU^=' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

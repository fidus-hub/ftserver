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
define( 'DB_NAME', 'mgrissendb' );

/** MySQL database username */
define( 'DB_USER', 'mgrissen' );

/** MySQL database password */
define( 'DB_PASSWORD', '123456' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         '0p4h+yE~z!Iff`Z-,:}zCbBUT;<g/XHt2|1+0GD-?Z?42[+pY~Rphh7+z](-xiEO' );
define( 'SECURE_AUTH_KEY',  '}]4V*-)O~,n}eZ-J.0~(^xEyL<[K>+AtmE9+B.cvR^i7.+A^uxO7iZo?Xt/m,4jM' );
define( 'LOGGED_IN_KEY',    '#54yS//5zOvOa0gz0Xqv~g|50~.o>6/2AEpW-=FS*Gl8Id{>7!GP>GIUM7HptkX|' );
define( 'NONCE_KEY',        'UZMBjdRSxnRuy6(7_YTVxL{~/H|;~QqL`&fEVo}HF]nkh~~p)X7&H,tg?s!]b*M0' );
define( 'AUTH_SALT',        'cPH|,!gz$pCaTD]Mm//_qP)JcTMKz>HCl|%;VK&BRwmV$6!@?kjEl`r1.S!.W+i,' );
define( 'SECURE_AUTH_SALT', 'Ejy!tS|k(quc@c/FVrt|uZL~vC4^X++p6l|AyZ:+p&6$>W4 Ed1$+:owi.j%P~&O' );
define( 'LOGGED_IN_SALT',   'A;8u~|(N0 3nPf( T/2$>,jj9st_I]po}!%`^^$a%!$Nk9&q#[TjeAGj*xR{WqUO' );
define( 'NONCE_SALT',       '^@,oy![|$bRZ{:T1AU0JK8{yCAt>Y|xqkvZ:&3|ooQu=$G(h6tp&xbJ=k-Ey&YHh' );

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

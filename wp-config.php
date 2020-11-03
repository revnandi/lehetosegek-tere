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
define( 'DB_NAME', 'lehetosegek_tere' );

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
define( 'AUTH_KEY',         '6~lh[dr$pO:u:Qh%GPB%-PP$!f]0:K_rGt*y_>Q4/xz^lW+3}Z.oB38/9[?29RPG' );
define( 'SECURE_AUTH_KEY',  'Aw-(CKkCrSm5gtI8a3)f4|Oy%1PnC%rr|s]ds0:&]_,45,2JE1u =Ao!_f|6F_64' );
define( 'LOGGED_IN_KEY',    '?CIWv*MC}1@)FS.<{cB~h#9]4kDj;Za^4TFD>3GeyGB*[zOt,5vU.G0Wmy~v^zzA' );
define( 'NONCE_KEY',        '/3m.2*FCP@Mmy_nv`nsq6;,WH7Gc~{k1v ;V6wDsB>b|Pj5(4ElET!r_FOT3zKKI' );
define( 'AUTH_SALT',        'F&T,lIXQie:s2E8Am{dYo@X6,:U+T-|!lCl$-XHb`_i7d:,*LQ5aUg9VD!EzN=j9' );
define( 'SECURE_AUTH_SALT', '|v{uUj*uh}Mpb/p_/J?l%>y7G+RSRnK~HJ$-a6d=CALn)m}e1gAMoG/D(jL%g}oR' );
define( 'LOGGED_IN_SALT',   '/-5zL&eCd8zx&uV1,@5_[(6_!->nEr.[Q<lOrV*}n>B2BN*IKJ%c)](byQlf/RK0' );
define( 'NONCE_SALT',       '}V#~p@P,st)5h115*pR:g5VT4oLv_aR;|nO3`R-g>~B9L*[^qyIIVc<T5K@~~tUZ' );

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

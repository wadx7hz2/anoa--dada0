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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'Kb`UFDLD97Q$al~}@H#SZj9/5[O%X)^+oo$t6-82Ziqll,@Id_$mF~bLs&WBiB(c' );
define( 'SECURE_AUTH_KEY',  'X1&Ap7qR&-Ix.8j~Zmq$CGJ8z2>ggA!U.?#n3`*vTN =z1r0vXgHMA f6c]T!^jr' );
define( 'LOGGED_IN_KEY',    '2DT:wS]NSEy/T.a6W4Y7{3DBA~0^YOe94Vos)uydJuBZ4:,N7-:zB-v17lmt]~s)' );
define( 'NONCE_KEY',        '[}_>V!exa8}%g^M;]3amsa#+HGoXKWlsTXzIH!ipfE>%^`vb4v0-wFyLXPnz%:9S' );
define( 'AUTH_SALT',        'v8J<E}S+0t}<&~F%y[O#&x4h!)A;HPxtAC+w6M8 !TU{=#HB>pE].Em&*0k |t;H' );
define( 'SECURE_AUTH_SALT', 'Eoq/%`cEvoX6fm=)TR1U!mH9Y@[/3! hjSW&9}ePWa*9:WXzSS&SD. -6d+|+T3T' );
define( 'LOGGED_IN_SALT',   'N#Fwy;^tb8.n2DxCfB3NN6lCK:euuOx!ZOx|0fXzMyX-X|UBeDj+h)*P0[:)x<,/' );
define( 'NONCE_SALT',       '5+ob*2eZspO?p~{mu?d9eK;JBOy|;/~)5jeOsI6I)H)CayA$bpG_QV6cw?7W[CNt' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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

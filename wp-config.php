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
define( 'DB_NAME', 'spatio' );

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
define( 'AUTH_KEY',         'zcYk#dv$~A+$|CA5gnd$#O:W`nnSmuHO GrjgN]]$w@)9?j!n<Bh5)Cy/yw9qWk?' );
define( 'SECURE_AUTH_KEY',  '6AyuZ=oNpOu2`.ZOK|FsjJvKLN^jhBbbe$6jkf}nK#2bPe!?q]}jle~$qYR.#||T' );
define( 'LOGGED_IN_KEY',    '?o?Vr*nvsm@iTxCK$x|)En `JMYjf?![cQ{;I)Q^V|f!?wDU8z3,TC3>3m,/f:=U' );
define( 'NONCE_KEY',        'GvAmn2<njg*{K7+wIxeK}@b,?>`D_zT@xF!5IMqb20T768@lZp0`ZgoS[EXgagA$' );
define( 'AUTH_SALT',        'Hws:4R6~NLVt5v5YH.$O6x|Uu5p6|JV(Rfl#uJ<A&Y|)#&/}{xy7/:9IcKJ[C_.j' );
define( 'SECURE_AUTH_SALT', '+)vDi]l51nNT}?zWCCSEz4+V>O+*5&1E]sCH%&o5nU4<!#Y[PE(@X&_u-B-|2nhr' );
define( 'LOGGED_IN_SALT',   'gyNCq*n}6g,~xu*pKb!lFbcX@YfqMQ>5Xz)JQ5Sk~E3vGW:>auUEh Le^{$OVGTe' );
define( 'NONCE_SALT',       '53@;Y*dv,_Sz8nKS,9Pn|l)iR*VfE!n+1y_t#H~x4/DOA0TdTp9|n]2bFku*:WHW' );

/**#@-*/

/**file permission **/
define('FS_METHOD', 'direct');

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

define("NEWSID",43);

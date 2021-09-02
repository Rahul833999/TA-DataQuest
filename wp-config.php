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
define( 'DB_NAME', 'tafirstp' );

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
define( 'AUTH_KEY',         ':t#$bNVw61q+S^UI5R1:gK=!VRW2O&[w-MOmKe_jYIA1xFt:i|cXrKa~Ad7v ~?V' );
define( 'SECURE_AUTH_KEY',  'K4 LAdV^Q[_%PZ4)$,4!fD+&.^:jAb1$|!}1L u[V$(35(+D4$hi%z-QC76BP~n9' );
define( 'LOGGED_IN_KEY',    'E3A@x$%xGR%FS(3=M6d{;aGBpQ=Ql7Edtt|>g!G%_WP*[I+`seBLi:w.TMN^VI%2' );
define( 'NONCE_KEY',        '*1VqhS.T{sbG(/_7DvOPg_xj1Q1?<MlZK9b,Q5]&<yBZFlZ AJ~=XA.SK=xq4M)P' );
define( 'AUTH_SALT',        'AOo{q4jDz44]Uq{Z )QdeGWJ+ug8lX8|2Z<S|YH!%_d<*h)_?c7Wa{|;jI#C,fbl' );
define( 'SECURE_AUTH_SALT', '0P0%QbE8:p[{[Y$<P:Wc+;o|`0k,n[idb0RVsx%~:g9rsrsk6v TJ+G8`L3n=-s8' );
define( 'LOGGED_IN_SALT',   ']u0{d1)j`p4@ky:O?V<M+sMX+I@pJQXHA=:+M?$yY1tw2t`N^SoL, 6WFuU|Iop2' );
define( 'NONCE_SALT',       'mQt>0j64nR{wt&$S:P3rL.:O=^:H (SNv,,vexkJYAV+)MlA~Y,+J@XfURAfr;A%' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'fp_';

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

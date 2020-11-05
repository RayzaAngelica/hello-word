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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'vJwV_P`4xJ3)!Fy?CJ{}JtwOek0y.b62zyutH^+caMf!3DV9PbEow&rRlp U6$@[' );
define( 'SECURE_AUTH_KEY',  'dZ8FV&jNW_(.0CfRmO}#@C^C2,uh~6Y-DQ}*J+; vAj^wSw&H0^!KF^e,6c/g5R_' );
define( 'LOGGED_IN_KEY',    '/@jwhk}-!2[)5SY)`{]$`V>oeOw,i2Cl%e,)1s0g|O]sS]gDh9Wwht_)7SN)$s>^' );
define( 'NONCE_KEY',        'b0:S#{Gc3tk<4wq!)+eYzr%1:Re.-l1z@+1F^*c_MBEr`=~OJ$YsjviV+b.3`XK(' );
define( 'AUTH_SALT',        'zee.#xcV/Fv2nrqU3#jDF$^}Xnf);WTcCYI;{Q{fQ237>GH+DN:|kj`tcxHO?y6U' );
define( 'SECURE_AUTH_SALT', 'CXYxmYUK7&ny7B[[~6iEV;euBCmvEG1LI7$0~GpzcE%=>Z#_g/1sf~7((sC];0;^' );
define( 'LOGGED_IN_SALT',   'Kb:as=F.es^$S53cb_5%CBPCw3sp1fahV:SD|*P/@6**u_)Waok/ !t** 4s0x|>' );
define( 'NONCE_SALT',       '2/SIPMf*tn,T^6/.;+B=2,Q`*?*>@7UT(}axO?FGQpP /O8`n}RZURh|B_V$o9<W' );

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

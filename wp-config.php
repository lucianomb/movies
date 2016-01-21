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
define('DB_NAME', 'movies');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'jFB7>|(!(FD|n#|B2Fr40MD:cL?]Oe~+y-8Rc5Xcce?2jAx[d:+l~Wp>@el;7}= ');
define('SECURE_AUTH_KEY',  'Wv[)[M}(M4vq{4k_.G;xY#9[b>A2~F%mY^0i!,|pUzE^sfEj@5-N[4_}-}Q-!k^|');
define('LOGGED_IN_KEY',    '[)2E?<~fpG,+#_)hHhIy-L-#X4i`~P:RbR~$Ni)uj`8ByMO&;eI|Zw3viql+yNYx');
define('NONCE_KEY',        '_T1z;K>8^_UnPEB$N&8n>+f+1=tqa[QpBO>R[/7qK-W0}h2zILY|gy[@vGu>,s)p');
define('AUTH_SALT',        'C0cnJc)S@o7W=}#G,v^E3@;bF#/>*cIze(Qrjd8G8mY12_/yz:oh2e`Br4k/9;It');
define('SECURE_AUTH_SALT', '+n }dk=:M<wLKui1r4?rYvfgc`8-1/9PP<8<v=[)m- }=R/p7r2BoS39Nka]p|+M');
define('LOGGED_IN_SALT',   '6x|>GKZ=`X[U+r2pBYV3Wnbw;26,?R/9g1=`y(LI>sB3P`C-8`jc8/PS.6C,`|w{');
define('NONCE_SALT',       'O[fy*LOa0^UB`SH U3 tv{QY4Pu8Tk--ChYeWyL;U},YMZahKocg_sy81^Lx^mr!');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

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
/*define('DB_NAME', 'uh347272_med24'); */

/** MySQL database username */
/*define('DB_USER', 'uh347272_med24'); */

/** MySQL database password */
/*define('DB_PASSWORD', 'a6qxcqaby'); */

/** MySQL hostname
/*define('DB_HOST', '10.0.0.2'); */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'andrew19_uh347272_med24');

/** MySQL database username */
define('DB_USER', 'andrew19_med');

/** MySQL database password */
define('DB_PASSWORD', 'a6qxcqabymed');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'f*vGikGx!5hX}{_,T06K2s  .UGu+NP-R;A*@qgj ?r,@PI$&!5?%u==Rx]6At4z');
define('SECURE_AUTH_KEY',  ' +QB*{V-pQhNg?VDGr-%|.KEAZDl].h7{T+cjYyv}j)B{yD4VDQpb.bJl2daMo2?');
define('LOGGED_IN_KEY',    't`xZ6/C  D<$>}DGPeW~o(8=|9/1)V|SW5 IgMdC0)[_~:Oa7X+()?E%)Y__TxZF');
define('NONCE_KEY',        '(:b5 -0:|4j)JRlT+Qno`OV%a 7}KNp7!wY4])YN:d3J]$LfB:tP`#xl [.Hv?4!');
define('AUTH_SALT',        'TMA5V^`]Ady1$VN>Wnsl,<2B3 iy&o3q7=V[C]0uwPB]ZNC=jJJ*.O]qE#.X.mQ+');
define('SECURE_AUTH_SALT', '~*>VP?j@mpf_Kc;Ka-!JA|.DMs5AB!eBd#wR3>chVD@b`mUVP<1Foy:L%q~h`~z-');
define('LOGGED_IN_SALT',   '}}+SV.zlgPFC[EXGtqSKo44!3p_VLsp|hnj|7=9h{>9Vvd-.H=f=nx5E0cH7Lq-4');
define('NONCE_SALT',       'e/Otv!~ GYKoR}77:j8B>=C_=RTiIeWRH{T=^)E1:UF69R|qv$ 7/k[o}hY<e^Xc');

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

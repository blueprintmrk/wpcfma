<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'cfma');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '~pduZ| C{-!bB7pp$z0 !Z7WCdS+yJkL+M{hZ[,f&Uot#AR8&>s95M*b-OqcmL7$');
define('SECURE_AUTH_KEY',  'SXpzJ!Y-YW}-.b;cU.Qduzwj%i} qx7(=^][g1e!dLj1.=K],)@EB|uOddU>GY}p');
define('LOGGED_IN_KEY',    'kdGSZ(]~n+d1bhUQ;~>-OZk5a{@yP,!Cv7>5 s<N|){jUlg}EWyhr@8([MpqSl^P');
define('NONCE_KEY',        '/w4V~+2QHW&<MSY+65M_I,xRfw*NpW;DbQRsI}[e-#*RFoqJBtkib=S@-i5M+AE{');
define('AUTH_SALT',        '@L/unl-erq(@~nhRz>_,|9cW 2]2h>z-{UhdM0XfZa>L]IPw+y(1,j}C+MC2j#sD');
define('SECURE_AUTH_SALT', 'zyJ}q.7)`Aitpr[URo|z87oQ=!=sbw-&VR0=KDCwtw<A4tNyznBY8^0_0-abS[1l');
define('LOGGED_IN_SALT',   ' <#u?^}@TwN1I |[Q7(w8N]6>V|QZ|~}Xec#$jN-?)%`<X5NIdx=7{nQ3}Cg1`},');
define('NONCE_SALT',       '+UCxZIFB+|ns])rcgTX{gAO5|RYq_9 3FB3$<oEkQE%6+[<!]+L-Ycn~EM0qx`Ge');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_cfma_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
define('WP_TEMP_DIR', ABSPATH . 'wp-content/tmp/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

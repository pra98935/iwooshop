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
define('DB_NAME', 'psmwdemo_iwoofree');

/** MySQL database username */
define('DB_USER', 'psmwdemo_iwoofre');

/** MySQL database password */
define('DB_PASSWORD', '+0E6Vvym3@&J');

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
define('AUTH_KEY',         'x3L{9?v[n;sL6G,:<tP2RJ|S6cqq6!|&FLY6fmWjrzUL{itDS$~[29j[$jx9pqJ^');
define('SECURE_AUTH_KEY',  'V7~8N#P{#D0qXYn$ZyVQ5}}Xgs!I+CmR[ Dv%~hWr!{ha0}!9a.pQRPDYk~>BW( ');
define('LOGGED_IN_KEY',    '9Q~bYNnsLY`.=L-|CI&Y]yWf<_i!8z-0H /}TS*A3/x~zWI>1Knp}3n[ S,+/l%B');
define('NONCE_KEY',        'c#5!{&R)%mu$%;z6j WZY#WT/=yJ?!VLV{/XrO)*I2A`Crd])6;dw$]y*<rH:ZXO');
define('AUTH_SALT',        '/P-OgCs =P4{7R[~ZAljzLWcV=NI^FcI{n_;[YR 15z#qie[~QRiMkV4-CHvrk?q');
define('SECURE_AUTH_SALT', 'KLT5,$M?lE]br=d=A!vfdHp<bPz2BkZ>G<;NF5;:;^=^!8ReT/<7H#!!]dU}&dz9');
define('LOGGED_IN_SALT',   'YDh,0 FY}txYc!4>%UF5`5XmTPI&<:JWS5-oII?~-RQza-P]:pVxo@RfLl<LKF&,');
define('NONCE_SALT',       'NOXx>yy%Os+c!!UI|ou_uiIlzF+;/tuUbKiD&$4B/hef|Gq4g{n;f/nD14QuD!;t');

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
define('WP_DEBUG', true);

define( 'WP_MEMORY_LIMIT', '256M' );
define( 'WP_MAX_MEMORY_LIMIT', '512M' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

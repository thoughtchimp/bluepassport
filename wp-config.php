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
define('DB_NAME', 'bluepassport');

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
define('AUTH_KEY',         'f-H|Jbqgh3&po+OPRmz2mKo&:)OS3O*@f>vf5|R;o[&b]~,tjH0j>IK3Wx{<5R%<');
define('SECURE_AUTH_KEY',  '/Sj13<u4|AI3x+UI[>i&t$b.mX2mUg_M$LV-;3bk5uf0DlMH;{+tcDy5tp^LbzP:');
define('LOGGED_IN_KEY',    '`sjH/[}e#e*C]Vq8Qr39HKe.SQq@BoMil?O$<1q@.5J1T[<BSBPN<*FI8Yk,E1$`');
define('NONCE_KEY',        'ynO]K-V@AM#o/:|%ao(u 3({Hdj@5qi8Xd]Jj8{C,^8$E{==9^RS0)4y3Nj&0K/s');
define('AUTH_SALT',        'a9pvk<%X1I^sej80xxwUA=]#y5(76?8SG`pHsm~9l1_Q[I^]h~e9v[5kBT cpv{-');
define('SECURE_AUTH_SALT', '<z<>P!1oY|MK4F&5&9d5zRMx{Xve)nXgYkh!7-yKPg(Z> s0mc]~.UGNZa_2$L+m');
define('LOGGED_IN_SALT',   '0xV7A)dblODZ7[]x_x}NJ8cfc@:-G=ata9ns7!]4MPk*Tbn_3KXY19C_U)ll^Mr`');
define('NONCE_SALT',       'RBl`]!iL!XGb)]|*hr,~6mG-_ln|T Wej8b|j^}CteqfjYvdEXKun}hQ8B&JQSxt');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'bp_';

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


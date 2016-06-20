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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         'p,nA!5XdZk^OP$jBWa3W_sPbHW~%w/#hW)kQo4dW.6h;aPu{Y6IBxu+2jL ]>]ZH');
define('SECURE_AUTH_KEY',  'kM wNL7|oMzOieW#lzB_LCPwHM,[T-G=wHNT-wbl8@8kraDXaU)5<v-MXW/YcS[H');
define('LOGGED_IN_KEY',    '.x<IJ1;I_so|aY4UFhkZg.E8y/3$}3tg,}1?3dOJEsfk7/[JE.c},l,jG>hZ#G(f');
define('NONCE_KEY',        'yNk{hg-NP4`S5M5j.7hzS=F}HUP3!rYF5T $kdGDXt86.I v(3]M;agi|W{/^*|O');
define('AUTH_SALT',        'VH=C-d!uSeb4+RSx>B|yBH*}0c@!I5x3~~C5a=N HGT7tY2De-t9q4Zs&W If;U,');
define('SECURE_AUTH_SALT', '@yo;[In)hk*/eXdXookkn%e5oOH=q+Nx6wU;2@UYzzJ&[X*41-x+&ET**1hx]~a-');
define('LOGGED_IN_SALT',   'CPA{5A{=H2/H.*<O`K*hT.Ft`c)sk(/*|aIx#$rq^}aUxtTV]ztA!7gXA^tH0EsT');
define('NONCE_SALT',       'O%1l40SEgx7YLEat:]?yT&%_NrP>8S9lm%AmvG0_p9=(Di)lOC[OOj^YF5qs(W{(');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'tc_';

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

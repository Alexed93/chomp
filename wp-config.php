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
define('DB_NAME', 'wp_chomp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '/!A<x@ZEv8FcbRx3Q/YED=EA?}.$Y?Chu?dC,))@5P gdss><(n[%)([i}$&V<f%');
define('SECURE_AUTH_KEY',  'hS.,z3! $7,=igRJC,se(5uprXnD 7b>qtOi_dHGch~X~vjj@N_C*:AcOruYtnb;');
define('LOGGED_IN_KEY',    '~pLLnu/~P~G%4mYGSX$0EFkRr5_Bt(d=yWSpl!w3(Y0:K=X4W;J!7jyKbl}7J&-[');
define('NONCE_KEY',        'LoVvl{9T7.0/ke%iV@ET 9BUY2sUoLz*VoG,%6nD37e>l<F1qyvDm>7Yo4H~sMx^');
define('AUTH_SALT',        '_,mzD$0D295YHWGWqK#{(-wj,9J7g5I^mOX9CMM8VpKvNMt^NEM&;RG,o3>7lD.e');
define('SECURE_AUTH_SALT', 'QL5-0&p|N9,#Qb-k,@/mWW_o;ZkJd$z2_PcG4U6h)l6tTvQ):IeeyDCCcJoAq5t;');
define('LOGGED_IN_SALT',   ',01&3pD)|l&?QN{;8u)4{^G_5_17n!e3BU-qNAPM9u4o6;b<#5i 7A}u?k$.$~KG');
define('NONCE_SALT',       'I{g_ZX*ZPDN[m_pj~3t} #BHIP?#,C$`8TKYrHc%mOX?8_U4R-M<rCk`oNvpq[-W');

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

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
define('DB_NAME', 'wp_gathenhielmska');

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
define('AUTH_KEY',         'V!!P1e|LXE&iSt@Y6G79,0DjuX21/:C=PQ]jG:&Ff(|{.z-aWL%K/_jV.C(t6IgM');
define('SECURE_AUTH_KEY',  '^J;=D8yOd[:S|}>{y%o3t8!U^Dp0!r?a/^w@_8|!iS+MU-#c-;)XcCS8x>J5I:gX');
define('LOGGED_IN_KEY',    'Y:uBD}C?EZUwd;z{yz8gEgIzeR>pHl!R4Otmq(fi+jF-S[bO^+0]:-9>R(3u$NjH');
define('NONCE_KEY',        'T~TVhov,3pC*$}w].B#g< YfVn98hw .S1+h;Fh~dei|P)A4`b*ja[]n*PJ{&wkB');
define('AUTH_SALT',        'ux+pR#r44rs,1gvM4I|bm<Ci<K*R{y2{>o7ggxDv3H6[xl=:2bQ9Xv?p|.8tP%BT');
define('SECURE_AUTH_SALT', '}~J#(JK{7W084RFwxNI0)Ji2k}fA{)W&aw8,>M#Pz0baw3< ?iK_DbH/y]$}+-=u');
define('LOGGED_IN_SALT',   '{uo5|})NUk}Qqgzg.%=B2>Sxp5=Y/]#(y?KBZud:=KCA$.Utg,K*}=xB(1KR,Q=_');
define('NONCE_SALT',       '$w9x;r5*(:8OE5Qt^)gI+k8S=4$mIX`ie~Z/D IE}BFbV9`q>7Y@B_se0mh[PQoA');

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

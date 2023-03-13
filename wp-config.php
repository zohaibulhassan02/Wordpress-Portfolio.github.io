<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'newportfolio' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'SXmbk6f5RiAOzUtOoHhctpgQAE4gT0JMwzO9MktoehODz9PXdUCP7OUy4tNGDewt' );
define( 'SECURE_AUTH_KEY',  'QfcZhqob5nv4EjmqLJTo3aTxx9oYElsSIFvO3sJRt0WoGrOXsfIDbnpUYy9T3dcg' );
define( 'LOGGED_IN_KEY',    'rBWXs1pLCzJat6sxITRaQssYtZnKY70hXWKiyjFSHJOjMygvsp3JlBD1Ws3Cbxfw' );
define( 'NONCE_KEY',        'mf7CC4RsIkRd14SUb8mC8tUX5c0jOTxVk52W2yw7WSTW4kugP4PABrLDmF0fd504' );
define( 'AUTH_SALT',        '35RMYzqGrvf70uETvvZvmneWvttPugfvOOSYJe3taxkzqJAbDK68uK4N5RUlqymc' );
define( 'SECURE_AUTH_SALT', '0f18icUnyckNXMXY6bw1cC4ssSUozKZIRnTeeaeiugcUwz7uEFx2omlTOwy1xyWC' );
define( 'LOGGED_IN_SALT',   '87La1f2eshO8GbjySeP4slwxJJeEPr52h27q0lECOzZXYl7jTco2FwSAArIuTGZw' );
define( 'NONCE_SALT',       'zoFhH1NeadcnXSbuqorDUbOtvDgAT00cSVmmZCYLbeAzFAgWdtY0B9JA2QaQyEPQ' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

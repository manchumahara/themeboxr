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
	define('DB_NAME', 'themeboxr');

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
	define('AUTH_KEY',         ');0NEm ,O&~;_sLsKK LV|@F,]}16!c7AxyfNDu?EwKCwr,18g @%/?Oxe8^;-uz');
	define('SECURE_AUTH_KEY',  'YQQuFGZj`KyYMbdz7H~x9 #:3$)8b=|E9[[]6m.+tdlWF=aSC`a}.AHH:w+R/=Ay');
	define('LOGGED_IN_KEY',    'XuuEe9Idh@YGY9 ZtmY)MB4M5YvAAcC!k!3k:/i@$dP8C*Yc&EyFM<L6#V|F.PC,');
	define('NONCE_KEY',        'A#re?Z{{jtH^Bs4ubf+:f3-vB5|$l%<id[G O{r`A<t_=.Qzt4D3[JZ;(n#Mv{FZ');
	define('AUTH_SALT',        ',~$@uLSUH/:V+|^QKc2Tdy(+pWPYJ}gSyj,;mH|GNcH:-51*9kOIK&(b9;:)xA:h');
	define('SECURE_AUTH_SALT', '3)i;0iualN:nP3iJ%<!(Qjp}`0C~JAeNHZeom^)&:=pd5b*bew5ztV]0ee=T8,GJ');
	define('LOGGED_IN_SALT',   '4YzVtoF,.h6C*0*a)K4n>_jWWl|}vo<R<JRFe.:cmS NE@O6`{o>D.`l%&$ oj3,');
	define('NONCE_SALT',       'zL}=U~4$4{n:7s;#Lq>^2%!|0inFSw #GqDG>jfvx#~DN!xPCVBoPkK>]Fi%zASu');


	$table_prefix  = 'tb_';



	define('WP_DEBUG', true);
	define( 'WP_DEBUG_DISPLAY', true);
	define( 'WP_DEBUG_LOG', true);

	/* That's all, stop editing! Happy blogging. */

	/** Absolute path to the WordPress directory. */
	if ( !defined('ABSPATH') )
		define('ABSPATH', dirname(__FILE__) . '/');

	/** Sets up WordPress vars and included files. */
	require_once(ABSPATH . 'wp-settings.php');

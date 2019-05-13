
This plugin adds a helper function to write log in wordpress debug file. This plugin also writes email send fail logs

Usages:

```php
if ( ! function_exists( 'write_log' ) ) {
	write_log('testing a variable output');
	write_log($name);
}
```

For any query [contact us](https://codeboxr.com/contact-us/)



# Installation

This section describes how to install the plugin and get it working.

e.g.

1. Upload `cbxwpwritelog` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. call function `<?php write_log('your content, variable or object here'); ?>` in your templates or plugin anywhere where you need to
4. There are other ways to install a plugin please check WordPress Codex https://codex.wordpress.org/Managing_Plugins

To enable debug you need put following in your WordPress wp-config.php file
```php
define('WP_DEBUG', true); //enable debugs
define( 'WP_DEBUG_DISPLAY', true); //displays debug , if you don't show set it false
define( 'WP_DEBUG_LOG', true); //stores debug in wp-content/debug.log  or as you configure your wp content folder
```

# Screenshots

![screenshot](https://raw.githubusercontent.com/manchumahara/cbxwpwritelog/master/assets/screenshot-1.jpg)

# Changelog

= 1.0.1 =
* Initial version released



<?php

define('WP_HOME', 'http://local.wp-groundwrk');
define('WP_SITEURL', WP_HOME . '/site/');

define('WP_CONTENT_DIR', APP_ROOT . '/public/content');
define('WP_CONTENT_URL', WP_HOME . '/content');

define('WP_DEBUG', true);

define('WP_MEMORY_LIMIT', '96M');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp-groundwrk');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define ('WPLANG', 'en-GB');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

define('AUTH_KEY',         'Tt|!|:;KPe9{h7uFxnp1N|f)?R5|$6qpstwjzEJ4+ls!VA}^G-vC-v34ez&0.bk&');
define('SECURE_AUTH_KEY',  ',OhI1Tis?QIHflDV@)R(@h/r21rc=uL+KITZ#,X]^Mh.Ey<NUTuqz9O&e$R>V:+M');
define('LOGGED_IN_KEY',    '@<P nzwyy:i-J)qOh*u&?5I2)okxisa)NJ#+vXj/RF10M%8hdr>GW+*M<y7|>->L');
define('NONCE_KEY',        'U-aw^b,(ut[pyx{^{vV+z!!Bl$fk)7>vx2f^-4t11J`i|!S|L#.TSZ;zV@`+WlK$');
define('AUTH_SALT',        'FLl`LnW{%>VeoZJM|{?<VS_:zLW4k[V,N.U%w+C-xb!k7+E~yVzi*!f@j}8NF- ^');
define('SECURE_AUTH_SALT', '&iTb#-U%^I`j^x@dfQb?lE.N#TPD/nv%SjcPu#Ai@U+^]U+c|IS?k+cc(j>{w7-q');
define('LOGGED_IN_SALT',   '@|Fv$M7h]s*Vkhl#)V>PS^[HN|S]nL}*02o;m*Q?T`esTid-;mEc%O`1?+r[C# o');
define('NONCE_SALT',       'RdF>V+cXV!}5&^&p>8.}m}dkC|)sTmCq_cu*qYC.X}KW$$P]0r!+cak|Nt=*^]90');

/**#@-*/
#VAWC Setup

Install Xampp / Wamp

Create database [phpmyadmin](http://localhost/phpmyadmin)
Import database sql file spatio.sql

Modify the following configuration from wp-config.php file residing on the project root folder.

define( 'DB_NAME', 'spatio' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );


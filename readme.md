# VAWC Setup

Install Xampp / Wamp

Create database [phpmyadmin](http://localhost/phpmyadmin)
Import database sql file spatio.sql

Modify the following configuration from wp-config.php file residing on the project root folder.

define( 'DB_NAME', 'spatio' );<br>
define( 'DB_USER', 'root' );br>
define( 'DB_PASSWORD', '' );br>
define( 'DB_HOST', 'localhost' );br>




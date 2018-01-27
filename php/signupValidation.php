<?php
require_once('../config/db.php');
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once("../libs/php-login-minimal-master/libraries/password_compatibility_library.php");
}

// include the configs / constants for the database connection
// require_once("../libs/php-login-minimal-master/config/db.php");
// load the login class
require_once("../libs/php-login-minimal-master/classes/Registration.php");

$registration = new Registration();
if ( empty($registration->errors) ) {
  print("Success");
}
else {
  print($registration->errors[0]);
}

?>

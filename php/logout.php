<?php
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once("../libs/php-login-minimal-master/libraries/password_compatibility_library.php");
}

// include the configs / constants for the database connection
require_once("../libs/php-login-minimal-master/config/db.php");
// load the login class
require_once("../libs/php-login-minimal-master/classes/Login.php");

// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
    $login->doLogout();
    print('Success.');

} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    // include("views/not_logged_in.php");
    print("No user was logged in.");
}

// Used for debugging. Remove this line of code once all testing is completed.
// $login->doLogout();

?>

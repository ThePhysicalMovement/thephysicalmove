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

$recaptcha_response = $_POST["response"];
$fields_string = "";
$fields = array(
  "secret" => "6LeGtEIUAAAAAHKotuxT8km0v3-3-sXBF50VG-6L",
  "response" => $recaptcha_response
);

foreach ($fields as $key => $value) {
  $fields_string .= $key . "=" . $value . "&";
}

$fields_string = rtrim($fields_string, "&");

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
curl_close($ch);

$obj = json_decode($result);

if ( $obj->success ) {
  $registration = new Registration();
  if ( !empty($registration->messages) && empty($registration->errors) ) {
    print("Congratulations, your account have been created successfully.<br />You can now login.");
  }
  else {
    print($registration->errors[0]);
  }
}
else {
  print("reCAPTCHA error: Check to make sure your keys match the registered domain and are in the correct locations.");
}

?>

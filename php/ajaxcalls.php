<?php

require('../config/db.php');

// checking for minimum PHP version
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
require_once("../libs/php-login-minimal-master/classes/Login.php");
// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();

// print_r($_SESSION);

if ( !empty($_GET) && isset($_GET["fun_name"]) ) {

  switch ($_GET["fun_name"]) {
    case "setFavorite":
      setFavorite($_SESSION["user_name"], $_GET["centre_id"]);
      break;
    case "unsetFavorite":
      unsetFavorite($_SESSION["user_name"], $_GET["centre_id"]);
      break;
    default:
      print("No function named " . $_GET["fun_name"]);
      break;
  }

}
else {
  print("Request is not formated correctly.");
}


function setFavorite($username, $centre_id) {
  // Create connection
  $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  // Check connection
  if ($conn->connect_error) {
    die("Connection to the database failed: " . $conn->connect_error);
  }
  else {
    $sql = "SELECT `User_Id` FROM `users` WHERE `users`.`user_name` = '" . $_SESSION["user_name"] . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $userId = $result->fetch_assoc()["User_Id"];
      // print_r($userId);
    }

    $sql = "UPDATE `users` SET `CommunityCentre_Id`= " . $centre_id . " WHERE `users`.`User_Id` = " . $userId . ";";
    $result = $conn->query($sql);
  }

}

function unsetFavorite($username, $centre_id) {
  // Create connection
  $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  // Check connection
  if ($conn->connect_error) {
    die("Connection to the database failed: " . $conn->connect_error);
  }
  else {
    $sql = "SELECT `User_Id` FROM `users` WHERE `users`.`user_name` = '" . $_SESSION["user_name"] . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $userId = $result->fetch_assoc()["User_Id"];
      // print_r($userId);
    }

    $sql = "UPDATE `users` SET `CommunityCentre_Id`= " . $centre_id . " WHERE `users`.`User_Id` = " . $userId . ";";
    $result = $conn->query($sql);
  }
}

?>

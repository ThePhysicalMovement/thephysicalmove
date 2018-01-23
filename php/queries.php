<?php
function connect() {
  // Create connection
  $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  // Check connection
  if ($conn->connect_error) {
    die("Connection to the database failed: " . $conn->connect_error);
  }

  // Return connection
  return $conn;
}

function get_logged_user() {
  // Connect to the database
  $conn = connect();

  if (isset($_SESSION["user_name"])) {
    $sql = "SELECT `user_fullname`, `user_name`, `user_email`, `user_phone`, `user_twitterURL`, `user_facebookURL`, `user_pinterestURL`, `user_visible` FROM `users` WHERE `users`.`user_name` = '" . $_SESSION["user_name"] . "'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
      return $result->fetch_object();
    }
    else if ($result->num_rows > 1) {
      return "More than one user returned which should not be possible.";
    }

    return "No user found.";
  }

  return "No user is logged in.";

}

function get_user($username) {
  // Connect to the database
  $conn = connect();

  // Build the query, execute the query and close the connection
  $sql = "SELECT * FROM `users` WHERE `user_name` = '" . $username . "';";
  $result = $conn->query($sql);
  $conn->close();

  // Validate and return the result
  if ($result->num_rows == 1) {
    return $result->fetch_object();
  }
  else if ($result->num_rows > 1) {
    return "More than one user returned which should not be possible.";
  }

  return "No user found.";
}

function get_users_except($username) {
  // Connect to the database
  $conn = connect();

  // Build the query, execute the query and close the connection
  $sql = "SELECT * FROM `users` WHERE `user_name` != '" . $username . "';";
  $result = $conn->query($sql);
  $conn->close();

  // Validate and return the results
  if ($result->num_rows > 0) {
    return $result;
  }

  return "No users founds.";
}

function get_users() {
  // Connect to the database
  $conn = connect();

  // Build the query, execute the query and close the connection
  $sql = "SELECT * FROM `users`;";
  $result = $conn->query($sql);
  $conn->close();

  // Validate and return the results
  if ($result->num_rows > 0) {
    return $result;
  }

  return "No users founds.";
}

function get_community_centre() {
  $conn = connect();

}

function get_community_centres() {
  $conn = connect();

}
?>

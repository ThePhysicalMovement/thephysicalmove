<?php

require_once('../include/header.php');

$servername = DB_HOST;
$database   = DB_NAME;
$username   = DB_USER;
$password   = DB_PASS;

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection to the database failed: " . $conn->connect_error);
}


if ($login->isUserLoggedIn()) {
  $sql = "SELECT `user_fullname`, `user_name`, `user_email`, `user_phone`, `user_twitterURL`, `user_facebookURL`, `user_pinterestURL`, `user_visible` FROM `users` WHERE `users`.`user_name` = '" . $_SESSION["user_name"] . "'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $user = $result->fetch_object();
    // print_r($user);

    $sql = "UPDATE `users` SET `user_fullname` = '" . $_POST["fullname"] . "', `user_email` = '" . $_POST["email"] . "', `user_phone` = '" . $_POST["phone"] . "', `user_twitterURL` = '" . $_POST["twitterURL"] . "',
    `user_facebookURL` = '" . $_POST["facebookURL"] . "', `user_pinterestURL` = '" . $_POST["pinterestURL"] . "', `user_visible` = '" . $_POST["visible"] . "';";
    $result = $conn->query($sql);
    // print($sql);
  }

  $changes = false;

  if (isset($_POST["fullname"]) && $_POST["fullname"] != $user->user_fullname) {
    $changes = true;
    $user->user_fullname = $_POST["fullname"];
  }
  if (isset($_POST["email"]) && $_POST["email"] != $user->user_email) {
    $changes = true;
    $user->user_email = $_POST["email"];
  }
  if (isset($_POST["phone"]) && $_POST["phone"] != $user->user_phone) {
    $changes = true;
    $user->user_phone = $_POST["phone"];
  }
  if (isset($_POST["twitterURL"]) && $_POST["twitterURL"] != $user->user_twitterURL) {
    $changes = true;
    $user->user_twitterURL = $_POST["twitterURL"];
  }
  if (isset($_POST["facebookURL"]) && $_POST["facebookURL"] != $user->user_facebookURL) {
    $changes = true;
    $user->user_facebookURL = $_POST["facebookURL"];
  }
  if (isset($_POST["pinterestURL"]) && $_POST["pinterestURL"] != $user->user_pinterestURL) {
    $changes = true;
    $user->user_pinterestURL = $_POST["pinterestURL"];
  }
  if (isset($_POST["visible"]) && $_POST["visible"] != $user->user_visible) {
    $changes = true;
    $user->user_visible = $_POST["visible"];
  }
}
else {

}

$conn->close();
?>

<section class="mt-200 mb-80">
  <div class="container">
    <h2 class="text-center">Profile</h2>
    <h5 class="text-center mb-80">Add or edit your personal information.</h5>

    <?php if ($changes) : ?>
    <div class="alert alert-success alert-dismissible fade show mb-40" role="alert">
      <strong>Success:</strong> Your changes have been made.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php endif ?>

    <div class="card">
      <div class="card-header">
        Edit your information here
      </div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"><i style="color: #585457;" class="fa fa-address-card"></i>&emsp;Full name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="fullname" value="<?php echo $user->user_fullname; ?>" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"><i style="color: #585457;" class="fa fa-user"></i>&emsp;Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="username" value="<?php echo $user->user_name; ?>" readonly />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"><i style="color: #585457;" class="fa fa-envelope"></i>&emsp;Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" name="email" value="<?php echo $user->user_email; ?>" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"><i style="color: #585457;" class="fa fa-phone"></i>&emsp;Phone Number</label>
            <div class="col-sm-10">
              <input type="phone" class="form-control" name="phone" value="<?php echo $user->user_phone; ?>" placeholder="Insert your phone number here..." />
            </div>
          </div>
          <hr />
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"><i style="color: #585457;" class="fa fa-twitter"></i>&emsp;Twitter URL</label>
            <div class="col-sm-10">
              <input type="url" class="form-control" name="twitterURL" value="<?php echo $user->user_twitterURL; ?>" placeholder="Insert your Twitter account URL here..." />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"><i style="color: #585457;" class="fa fa-facebook"></i>&emsp;Facebook URL</label>
            <div class="col-sm-10">
              <input type="url" class="form-control" name="facebookURL" value="<?php echo $user->user_facebookURL; ?>" placeholder="Insert your Facebook account URL here..." />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"><i style="color: #585457;" class="fa fa-pinterest"></i>&emsp;Pinterest URL</label>
            <div class="col-sm-10">
              <input type="url" class="form-control" name="pinterestURL" value="<?php echo $user->user_pinterestURL; ?>" placeholder="Insert your Pinterest account URL here..." />
            </div>
          </div>
          <hr />
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"><i style="color: #585457;" class="fa fa-eye-slash"></i>&emsp;Visible</label>
            <div class="col-sm-10" style="padding-top: 10px;">
              <label class="switch">
                <input type="checkbox" name="visible" <?php if ($user->user_visible) : ?>checked<?php endif ?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <div class="flex-row-reverse">
            <div class="col-sm-2 float-right">
              <button type="submit" class="btn btn-primary btn-block">Save</button>
            </div>
            <div class="col-sm-2 float-right">
              <a href="homepage.php" class="btn btn-outline-secondary btn-block">Cancel</a>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
</section>

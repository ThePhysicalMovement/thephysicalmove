<?php
require_once('../php/functions.php');
require_once('../php/queries.php');
require_once('../config/db.php');

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

$relative_filename = $_SERVER["PHP_SELF"];
$last_slash_index = strrpos( $_SERVER["PHP_SELF"], "/" );
$path = substr( $relative_filename, 0,  $last_slash_index + 1);
$filename_with_extension = substr( $relative_filename, $last_slash_index + 1);
$extension_index = strpos( $filename_with_extension, ".php" );
$filename = substr( $filename_with_extension, 0, $extension_index);
?>
<!DOCTYPE html>
<html class="skrollr skrollr-desktop">
<head>
  <base href="http://localhost/projects/ThePhysicalMovement/views/">
  <title>The Physical Movement</title>
  <!-- Meta -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
  <link rel="icon" href="../favicon.ico" type="image/x-icon"> -->
  <link rel="apple-touch-icon" sizes="152x152" href="../apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
  <link rel="manifest" href="../manifest.json">
  <link rel="mask-icon" href="../safari-pinned-tab.svg" color="#5bbad5">
  <meta name="theme-color" content="#ffffff">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- CSS -->
  <link rel="stylesheet" href="../css/own/thephysicalmovement.css" />
  <!-- <link rel="stylesheet" href="../css/bootstrap4/bootstrap.min.css" /> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="../css/animate.css" /> -->

  <!-- JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.js"></script>
  <script src="../js/bootstrap4/bootstrap.min.js"></script>
  <script src="../js/own/thephysicalmovement.js"></script>

  <!-- Parallax Lib -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/skrollr/0.6.30/skrollr.min.js"></script>
</head>
<body>
  <div class="navbar-wrapper fixed-top">
    <div class="container">
      <nav class="navbar navbar-expand-lg">
          <a class="navbar-brand" href="homepage.php">So-PhyZ</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse navigation-wrapper" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item <?php if ( $filename == "homepage" ) : ?>active<?php endif ?>">
                <a class="nav-link" href="homepage.php">Home <?php if ( $filename == "homepage" ) : ?><span class="sr-only">(current)</span><?php endif ?></a>
              </li>
              <li class="nav-item <?php if ( $filename == "community_centre_repository" ||  $filename == "community_centre_details") : ?>active<?php endif ?>">
                <a class="nav-link" href="community_centre_repository.php">Community Center Repository <?php if ( $filename == "community_centre_repository" ) : ?><span class="sr-only">(current)</span><?php endif ?></a>
              </li>
              <?php if ( !$login->isUserLoggedIn() ) : ?>
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModalCenter">Log in</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#signupModalCenter">Sign-up</a>
              </li>
              <?php else : ?>
                <li class="nav-item <?php if ( $filename == "social" ) : ?>active<?php endif ?>">
                  <a class="nav-link" href="social.php">Social</a>
                </li>
              <?php endif ?>
            </ul>
            <?php if ( $login->isUserLoggedIn() ) : ?>
            <div class="dropdown show">
              <a class="dropdown-toggle" href="#" role="button" id="profile-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i></a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profile-link">
                <div id="user-information" class="dropdown-item">
                  <h6><i class="fa fa-user"></i>&emsp;Profile information</h6>
                  <p><?php echo $_SESSION["user_fullname"] ?></p>
                  <p><?php echo $_SESSION["user_name"] ?></p>
                  <?php if (isset($_SESSION["user_email"])) : ?>
                    <p><?php echo $_SESSION["user_email"] ?></p>
                  <?php endif ?>
                  <?php if (isset($_SESSION["user_phone"])) : ?>
                    <p><?php echo $_SESSION["user_phone"] ?></p>
                  <?php endif ?>
                </div>
                <a class="dropdown-item" href="profile.php"><i class="fa fa-pencil"></i>&emsp;Edit profile</a>
                <div class="dropdown-divider" href="#"></div>
                <a class="dropdown-item" href="#" onclick="logout(event)"><i class="fa fa-sign-out"></i>&emsp;Log out</a>
              </div>
            </div>
            <?php endif ?>
          </div>
      </nav>
    </div>
  </div>

  <div class="modal fade" id="loginModalCenter" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-style modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="row">
          <div class="col-md-5 left-pane">
            <span>Welcome back</span>
            <span>to</span>
            <span>So-PhyZ</span>
            <img class="top" src="../images/AlphaTenis.png" />
            <img class="left" src="../images/AlphaBasket.png" />
            <img class="bottom" src="../images/AlphaRugby.png" />
          </div>
          <div class="col-md-7">
            <form id="login-form" onsubmit="authenticate(event)" autocomplete="off">
              <div class="modal-header">
                <h5 class="modal-title" id="loginModalTitle">Log in</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <input id="login-user" class="form-control" type="text" name="user_name" placeholder="Email or username" autocomplete="off" />
                </div>
                <div class="form-group">
                  <input id="login-password" class="form-control" type="password" name="user_password" placeholder="Password" autocomplete="off" />
                </div>
                <div class="form-group">
                  <label id="wrong-login"></label>
                </div>
                <div class="row">
                  <div class="col-md-6"><input id="remember-me" type="checkbox" />&emsp;Remember me?</div>
                  <!-- <div class="col-md-6"><a href="" class="form-links pink"><p><strong>Forgot your password?</strong></p></a></div> -->
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-submit-form">Log In</button>
                <p style="margin-top: 40px;">Don't have an account yet? <a href="" class="form-links pink" data-toggle="modal" data-target="" onclick="toggleModal('#loginModalCenter', '#signupModalCenter')"><strong>Sign Up</strong></a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="signupModalCenter" tabindex="-1" role="dialog" aria-labelledby="signupModal" aria-hidden="true">
    <div class="modal-style modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="row">
          <div class="col-md-5 left-pane signup">
            <span>Welcome</span>
            <span>to</span>
            <span>So-PhyZ</span>
            <img class="top" src="../images/AlphaTenis.png" />
            <img class="left" src="../images/AlphaBasket.png" />
            <img class="bottom" src="../images/AlphaRugby.png" />
          </div>
          <div class="col-md-7">
            <form id="signup-form" onsubmit="register(event)" autocomplete="off">
              <div class="modal-header">
                <h5 class="modal-title" id="signupModalTitle">Sign up</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <input id="signup-fullname" class="form-control" type="text" name="full_name" placeholder="Full name" autocomplete="off" pattern=".{3,255}" title="Minimum 3 characters and maximum 64 characters" required />
                </div>
                <div class="form-group">
                  <input id="signup-username" class="form-control" type="text" name="user_password" placeholder="Username" autocomplete="off" pattern=".{3,64}" title="Minimum 3 characters" required />
                </div>
                <div class="form-group">
                  <input id="signup-email" class="form-control" type="email" name="user_email" placeholder="Email (Optional)" autocomplete="off" title="Maximum of 64 characters" />
                </div>
                <div class="form-group">
                  <input id="signup-phone" class="form-control" type="phone" name="user_phone" placeholder="Phone number (Optional)" autocomplete="off" />
                </div>
                <div class="form-group">
                  <input id="signup-date" class="form-control" type="date" name="user_date" placeholder="Phone number" autocomplete="off" />
                </div>
                <div class="form-group">
                  <input id="signup-password" class="form-control" type="password" name="user_password_new" placeholder="Password" autocomplete="off" title="Maximum of 20 characters" />
                </div>
                <div class="form-group">
                  <input id="signup-password-confirm" class="form-control" type="password" name="user_password-repeat" placeholder="Confirm password" autocomplete="off" />
                </div>
                <label id="wrong-signup"></label>
                <!-- <div class="form-group"></div> -->
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-submit-form">Sign Up</button>
                <p style="margin-top: 40px;">Already have an account? <a href="" class="form-links pink" data-toggle="modal" data-target="" onclick="toggleModal('#signupModalCenter', '#loginModalCenter')"><strong>Log In</strong></a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>console.log(document.cookie);</script>

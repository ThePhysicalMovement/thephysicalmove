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

if (isset($_GET['id'])) {
  $centre_id = $_GET['id'];
}
else {
  // Redirect 404

}

if (isset($_SESSION["user_name"])) {
  $sql = "SELECT `User_Id` FROM `users` WHERE `users`.`user_name` = '" . $_SESSION["user_name"] . "'";
}
else {
  // $favorite = false;
}


$conn->close();

$logged_user = get_logged_user();
$users = get_users_except($logged_user->user_name);
print_r($users->fetch_assoc());
$users->data_seek(0);
?>

<section class="mt-200 mb-80">
  <div class="container">
    <h2 class="text-center">Welcome to the social page</h2>
    <h5 class="text-center">Find people to connect to and share ideas.</h5>
    <!-- <div id="search-centres" class="row">
      <div class="col-md-6 offset-md-3 text-center">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search for..." onkeyup="filterTable(this, $('#recreation-centres-table')[0])">
          <span class="input-group-btn">
            <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </div>
    </div> -->
  </div>
</section>

<section>
  <div class="container">
    <ul class="nav nav-tabs nav-fill" role="tablist">
      <li class="nav-item">
        <a id="all-tab" class="nav-link active" href="#all-users" data-toggle="tab" role="tab"><i class="fa fa-globe">&emsp;</i>All</a>
      </li>
      <li class="nav-item">
        <a id="address-book-tab" class="nav-link" href="#address-book" data-toggle="tab" role="tab"><i class="fa fa-address-book">&emsp;</i>Address book</a>
      </li>
    </ul>
  </div>
</section>

<section class="user-grid tab-content">
  <div id="all-users" class="container tab-pane fade show active" role="tabpanel">
    <div class="row">
      <div class="col-md-12">
        <h2 class="text-center">Find people</h2>
        <div id="search-centres" class="row">
          <div class="col-md-6 offset-md-3 text-center">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for..." aria-label="Search for..." onkeyup="filterTable(this, $('#recreation-centres-table')[0])">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <?php while ($user = $users->fetch_assoc()) : ?>

      <div class="col-md-3">
        <div class="profile-card">
          <h5 class="card-status"><i class="fa fa-circle online"></i> Online</h5>
          <img src="http://lorempixel.com/400/400/sports/8" />
          <div class="profile-info">
            <span><strong><?php echo $user["user_fullname"]; ?></strong></span><br />
            <span style="display: block; margin-bottom: 10px;">
              <?php if (strlen($user["user_email"])) : ?>
                <?php echo $user["user_email"]; ?>
              <?php else : ?>
                &nbsp;
            <?php endif ?>
            </span>
            <?php if (strlen($user["user_twitterURL"])) : ?>
              <span class="social-icon">
                <a class="no-decoration" href="<?php echo $user["user_twitterURL"]; ?>">
                  <i class="fa fa-twitter"></i>
                </a>
              </span>&nbsp;
            <?php endif ?>
            <?php if (strlen($user["user_facebookURL"])) : ?>
              <span class="social-icon">
                <a class="no-decoration" href="<?php echo $user["user_facebookURL"]; ?>">
                  <i class="fa fa-facebook-square"></i>
                </a>
              </span>&nbsp;
            <?php endif ?>
            <?php if (strlen($user["user_pinterestURL"])) : ?>
              <span class="social-icon">
                <a class="no-decoration" href="<?php echo $user["user_pinterestURL"]; ?>">
                  <i class="fa fa-pinterest"></i>
                </a>
              </span>&nbsp;
            <?php endif ?>
            <span title="Add to your address book."><i class="fa fa-address-book"></i></span>
          </div>
          <hr />
          <a class="send-message">Send message <i class="fa fa-paper-plane"></i></a>
        </div>
      </div>

    <?php endwhile ?>
      <!-- <div class="col-md-3">
        <div class="profile-card">
          <h5 class="card-status"><i class="fa fa-circle-o offline"></i> Offline</h5>
          <img src="http://lorempixel.com/400/400/sports/3" />
          <div class="profile-info">
            <span><strong>Dwayne Johnson</strong></span><br />
            <span style="display: block; margin-bottom: 10px;">&nbsp;</span>
            <span><i class="fa fa-twitter"></i></span>&nbsp;
            <span><i class="fa fa-facebook-square"></i></span>&nbsp;
            <span><i class="fa fa-pinterest"></i></span>
          </div>
          <hr />
          <a>Send message <i class="fa fa-paper-plane"></i></a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="profile-card">
          <h5 class="card-status"><i class="fa fa-circle online"></i> Online</h5>
          <img src="http://lorempixel.com/400/400/sports/2" />
          <div class="profile-info">
            <span><strong>Kaley Cuoco</strong></span><br />
            <span style="display: block; margin-bottom: 10px;">&nbsp;</span>
            <span><i class="fa fa-twitter"></i></span>&nbsp;
            <span><i class="fa fa-facebook-square"></i></span>&nbsp;
            <span><i class="fa fa-pinterest"></i></span>
          </div>
          <hr />
          <a>Send message <i class="fa fa-paper-plane"></i></a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="profile-card">
          <h5 class="card-status"><i class="fa fa-circle online"></i> Online</h5>
          <img src="http://lorempixel.com/400/400/sports/5" />
          <div class="profile-info">
            <span><strong>Jim Parsons</strong></span><br />
            <span style="display: block; margin-bottom: 10px;">another@email.com</span>
            <span><i class="fa fa-twitter"></i></span>&nbsp;
            <span><i class="fa fa-facebook-square"></i></span>&nbsp;
            <span><i class="fa fa-pinterest"></i></span>
          </div>
          <hr />
          <a>Send message <i class="fa fa-paper-plane"></i></a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="profile-card">
          <h5 class="card-status"><i class="fa fa-circle online"></i> Online</h5>
          <img src="http://lorempixel.com/400/400/sports/9" />
          <div class="profile-info">
            <span><strong>John Snow</strong></span><br />
            <span style="display: block; margin-bottom: 10px;">youknow@nothing.com</span>
            <span><i class="fa fa-twitter"></i></span>&nbsp;
            <span><i class="fa fa-facebook-square"></i></span>&nbsp;
            <span><i class="fa fa-pinterest"></i></span>
          </div>
          <hr />
          <a>Send message <i class="fa fa-paper-plane"></i></a>
        </div>
      </div> -->
    </div>
  </div>
<!-- </section> -->

<!-- <section class="user-grid d-none"> -->
  <div id="address-book" class="container tab-pane fade" role="tabpanel">
    <div class="row">
      <div class="col-md-12">
        <h2 class="text-center">Find people</h2>
        <div id="search-centres" class="row">
          <div class="col-md-6 offset-md-3 text-center">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for..." aria-label="Search for..." onkeyup="filterTable(this, $('#recreation-centres-table')[0])">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <div class="profile-card">
          <h5 class="card-status"><i class="fa fa-circle online"></i> Online</h5>
          <img src="http://lorempixel.com/400/400/sports/8" />
          <div class="profile-info">
            <span><strong>Wade Wilson</strong></span><br />
            <span style="display: block; margin-bottom: 10px;">my@email.com</span>
            <span><i class="fa fa-twitter"></i></span>&nbsp;
            <span><i class="fa fa-facebook-square"></i></span>&nbsp;
            <span><i class="fa fa-pinterest"></i></span>&nbsp;
            <span title="Add to your address book."><i class="fa fa-address-book-o"></i></span>
          </div>
          <hr />
          <a class="send-message">Send message <i class="fa fa-paper-plane"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

<!DOCTYPE html>
<html class="skrollr skrollr-desktop">
<head>
  <!-- Meta -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="apple-touch-icon" sizes="152x152" href="../apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
  <link rel="manifest" href="../manifest.json">
  <link rel="mask-icon" href="../safari-pinned-tab.svg" color="#5bbad5">
  <meta name="theme-color" content="#ffffff">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

  <!-- CSS -->
  <link rel="stylesheet" href="../css/own/thephysicalmovement.css" />
  <link rel="stylesheet" href="../css/bootstrap4/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/animate.css" />

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
          <a class="navbar-brand" href="#">So-PhyZ</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse navigation-wrapper" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="homepage.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="community_centre_repository.php">Community Center Repository</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contactPage.html">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="aboutPage.html">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="loginPage.html">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="signupPage.html">Sign-up</a>
              </li>
            </ul>
          </div>
      </nav>
    </div>
  </div>

  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "thephysicalmovement";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) {
    die("Connection to the database failed: " . $conn->connect_error);
  }

  if (isset($_GET['id'])) {
    $centre_id = $_GET['id'];
  }
  // $sql = "SELECT * FROM `communitycentre` WHERE CommunityCentre_Id = " . $centre_id;
  $sql = "SELECT `CommunityCentre`.`Name`, `CommunityCentre`.`Address`, `CommunityCentre`.`PhoneNumber`, `CommunityCentre_Facility`.`Quantity`, `Facility`.`Type` FROM ((`CommunityCentre_Facility` INNER JOIN `CommunityCentre` ON `CommunityCentre_Facility`.`CommunityCentre_Id` = `CommunityCentre`.`CommunityCentre_Id`) INNER JOIN `Facility` ON `CommunityCentre_Facility`.`Facility_Id` = `Facility`.`Facility_Id`)
  WHERE `CommunityCentre`.`CommunityCentre_Id` = " . $centre_id;
  $result = $conn->query($sql);
  $centre = $result->fetch_assoc();

  $conn->close();
  ?>

  <section class="recreation-centres mb-80">
    <div class="container">

      <h2><?php echo $centre["Name"] ?></h2>
      <p>
        Adam Beck Community Centre is a shared use facility. We offer fun filled programs for all ages including birthday parties packages & community special events. Also, there is limited space available for community group & private permits.
      </p>

    </div>
  </section>

  <section class="information mb-80">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="http://www.techstrikers.com/GoogleMap/Code/images/google-map-on-click-draw-marker.png" width="100%" />
        </div>
        <div class="col-md-6">
          <h3 class="pink">Contact</h3>
          <p class="bold">Contact us: <?php echo $centre["PhoneNumber"] ?></p>
          <p class="bold">Address: <?php echo $centre["Address"] ?></p>
          <!-- <p class="bold">URL: <?php echo $centre["Address"] ?></p> -->
          <!-- <p>Ward: 44</p> -->
          <!-- <p>District: Scarborough</p> -->
        </div>
      </div>
    </div>
  </section>

  <section class="extras mb-80">
    <div class="container">
      <div id="accordion" role="tablist">

        <div class="card">
          <div id="programs-header" class="card-header" role="tab">
            <h5 class="mb-0">
              <a class="btn-accordion" data-toggle="collapse" href="#programs-body" aria-expanded="true" aria-controls="programs-body">
                Drop-In Programs
                <span class="pull-right">
                    <i class="fa fa-caret-up"></i>
                </span>
              </a>
            </h5>
          </div>

          <div id="programs-body" class="collapse show" role="tabpanel" aria-labelledby="programs-header" data-parent="#accordion">
            <div class="card-body">
              <table class="table table-striped" style="margin-bottom: 0;">
                <thead>
                  <tr>
                    <th>Program</th>
                    <th><button class="btn-no-style"><i class="fa fa-caret-left"></i></button></th>
                    <th>Sunday</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                    <th><button class="btn-no-style"><i class="fa fa-caret-right"></i></button></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>Club Homework</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>3:30 - 6pm</td>
                    <td>3:30 - 6pm</td>
                    <td>3:30 - 6pm</td>
                    <td>3:30 - 6pm</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Youth Space</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>3:30 - 8pm</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Youth Space</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>3:30 - 8pm</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Youth Space</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>3:30 - 8pm</td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Youth Space</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>3:30 - 8pm</td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="card">
          <div id="facilities-header" class="card-header" role="tab">
            <h5 class="mb-0">
              <a class="btn-accordion collapsed" data-toggle="collapse" href="#facilities-body" aria-expanded="false" aria-controls="facilities-body">
                Facilities
                <span class="pull-right">
                    <i class="fa fa-caret-down"></i>
                </span>
              </a>
            </h5>
          </div>

          <div id="facilities-body" class="collapse" role="tabpanel" aria-labelledby="facilities-header" data-parent="#accordion">
            <div class="card-body">
              <ul>
                <?php while($centre) : ?>
                  <li class="card-list"><?php echo $centre["Quantity"] . " &emsp; " . $centre["Type"] ?></li>
                  <?php $centre = $result->fetch_assoc(); ?>
                <?php endwhile ?>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <p>Copyright &copy; 2017 So-PhyZ - All Rights Reserved.</p>
    </div>
  </footer>

  <!-- <script type="text/javascript">
  	skrollr.init({
  		smoothScrolling: false
  	});
	</script> -->

</body>

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

  <section class="recreation-centres">
    <div class="container">
      <h2 class="text-center">Recreation Centres</h2>
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

        $sql = "SELECT * FROM `communitycentre`";
        $result = $conn->query($sql);
        $conn->close();
      ?>

      <table id="recreation-centres-table" class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Contact</th>
            <th scope="col">See more</th>
          </tr>
        </thead>
        <tbody>

        <?php if ($result->num_rows > 0) : ?>

          <?php while($row = $result->fetch_assoc()) : ?>
            <tr>
              <td><?php echo $row["Name"] ?></td>
              <td><?php echo $row["Address"] ?></td>
              <td><?php echo "", (strlen($row["PhoneNumber"]) == 0 ? "N/A" : $row["PhoneNumber"]) ?></td>
              <td class="text-center">
                <a href="community_centre_details.php?id=<?php echo $row['CommunityCentre_Id'] ?>">
                  <i class="fa fa-plus-circle"></i>
                </a>
              </td>
            </tr>
          <?php endwhile ?>

        <?php else : ?>
          <tr>
            <td colspan="4">No records found.</td>
          </tr>
        <?php endif ?>

        </tbody>
      </table>

      <!-- <div class="row" style="position: relative;">
        <div class="floating-images">
          <img id="slash-1" class="skrollable skrollable-between" src="../images/Slash.png" data-0="transform: scale(0.75); left: 200px; top[linear]: 150px;" data-end="top: 500px;" />
          <img id="tennis-ball-1" class="skrollable skrollable-between" src="../images/Tennis ball.png" data-0="transform: scale(0.75); right: -50px; top[linear]: 300px;" data-end="top: 400px;" />
          <img id="soccer-ball-1" class="skrollable skrollable-between" src="../images/Soccer ball.png" data-0="transform: scale(0.75); left: -75px; top[linear]: 350px;" data-end="top: 450px;" />
          <img id="slash-2" class="skrollable skrollable-between" src="../images/Slash.png" data-0="transform: scale(0.75); right: -200px; top[linear]: 500px;" data-end="top: 600px;" />
          <img id="football-ball-1" class="skrollable skrollable-between" src="../images/Football ball.png" data-0="transform: scale(0.75); left: 100px; top[linear]: 600px;" data-end="top: 750px;" />
          <img id="basketball-ball-1" class="skrollable skrollable-between" src="../images/Basketball ball.png" data-0="transform: scale(0.75); left: 100px; top[linear]: 650px;" data-end="top: 800px;" />
          <img id="slash-3" class="skrollable skrollable-between" src="../images/Slash.png" data-0="transform: scale(0.75); left: 100px; top[linear]: 750px;" data-end="top: 900px;" />
          <img id="soccer-ball-2" class="skrollable skrollable-between" src="../images/Soccer ball.png" data-0="transform: scale(0.75); left: 100px; top[linear]: 800px;" data-end="top: 1000px;" />
        </div>
      </div> -->

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

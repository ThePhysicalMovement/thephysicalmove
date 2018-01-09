  <?php require('../include/header.php'); ?>

  <?php
  $servername = DB_HOST;
  $database   = DB_NAME;
  $username   = DB_USER;
  $password   = DB_PASS;

  // // checking for minimum PHP version
  // if (version_compare(PHP_VERSION, '5.3.7', '<')) {
  //     exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
  // } else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
  //     // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
  //     // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
  //     require_once("../libs/php-login-minimal-master/libraries/password_compatibility_library.php");
  // }
  //
  // // include the configs / constants for the database connection
  // require_once("../libs/php-login-minimal-master/config/db.php");
  // // load the login class
  // require_once("../libs/php-login-minimal-master/classes/Login.php");
  // // create a login object. when this object is created, it will do all login/logout stuff automatically
  // // so this single line handles the entire login process. in consequence, you can simply ...
  // $login = new Login();
  // // ... ask if we are logged in here:
  // if ($login->isUserLoggedIn() == true) {
  //     // the user is logged in. you can do whatever you want here.
  //     // for demonstration purposes, we simply show the "you are logged in" view.
  //     // include("../libs/php-login-minimal-master/views/logged_in.php");
  // }
  // else {
  //     // the user is not logged in. you can do whatever you want here.
  //     // for demonstration purposes, we simply show the "you are not logged in" view.
  //     // include("../libs/php-login-minimal-master/views/not_logged_in.php");
  // }

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
  $sql = "SELECT `communitycentre`.`Name`, `communitycentre`.`Address`, `communitycentre`.`PhoneNumber`, `communitycentre_facility`.`Quantity`, `facility`.`Type` FROM ((`communitycentre_facility` INNER JOIN `communitycentre` ON `communitycentre_facility`.`CommunityCentre_Id` = `communitycentre`.`CommunityCentre_Id`) INNER JOIN `facility` ON `communitycentre_facility`.`Facility_Id` = `facility`.`Facility_Id`)
  WHERE `communitycentre`.`CommunityCentre_Id` = " . $centre_id;
  $result = $conn->query($sql);
  $centre = $result->fetch_assoc();

  $sql = "SELECT * FROM `program` INNER JOIN `programtype` ON `program`.`ProgramType_Id` = `programtype`.`ProgramType_Id` WHERE `program`.`CommunityCentre_Id` = " . $centre_id;
  $programs = $conn->query($sql);

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

          <?php

            $program = $programs->fetch_assoc();
            print_r($program);
            print("<br />");
            print("ProgramType = " . $program["Name"] . "<br />");
            print("Start time = " . get_time($program["StartTime"]) . "<br />");
            print("Today is " . get_weekday($program["StartDate"]) . "<br />"); // fix if wrong date type

          ?>

          <div id="programs-body" class="collapse show" role="tabpanel" aria-labelledby="programs-header" data-parent="#accordion">
            <div class="card-body">
              <table id="week1" class="table table-striped" style="margin-bottom: 0;">
                <thead>
                  <tr>
                    <th>Program</th>
                    <!-- <th><button class="btn-no-style"><i class="fa fa-caret-left"></i></button></th> -->
                    <th>Sunday</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                    <!-- <th><button class="btn-no-style"><i class="fa fa-caret-right"></i></button></th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $listed = array();
                    $rows = array();

                    $dom = new DOMDocument();
                    $xpath = new DOMXPath($dom);
                    // $table = new DOMElement('table');

                    while ($program = $programs->fetch_assoc()) {
                      if ( !in_array($program["Name"], $listed) ) {
                        array_push($listed, $program["Name"]);

                        $tr = new DOMElement('tr');
                        $thProgram = new DOMElement('th');

                        $weekday_list = array();
                        for ($i = 0; $i < 7; $i++) {
                          array_push($weekday_list, new DOMElement('td'));
                        }

                        $dom->appendChild($tr);
                        $tr->appendChild($thProgram);

                        for ($i = 0; $i < 7; $i++) {
                          $tr->appendChild($weekday_list[$i]);
                        }

                        $weekday_number_list = array('Sun' => 0, 'Mon' => 1, 'Tue' => 2, 'Wed' => 3, 'Thu' => 4, 'Fri' => 5, 'Sat' => 6);
                        $event_day = get_weekday($program["StartDate"]);
                        $weekday_list [ $weekday_number_list[$event_day] ]->appendChild(new DOMText(get_time($program["StartTime"]) . " - " . get_time($program["EndTime"])));

                        $thProgram->appendChild(new DOMText($program["Name"]));
                        echo $dom->saveHTML($tr);
                      }
                      else {
                        $elements = $xpath->query('//tr');

                        for ($i = 0; $i < $elements->length; $i++) {
                          $node = $elements->item($i);

                          if ($program["Name"] == $node->getElementsByTagName('th')->item(0)->nodeValue) {
                            print($node->getElementsByTagName('th')->item(0)->nodeValue);
                          }
                        }
                      }
                    }
                    // echo $dom->getElementsByTagName('tr')->item(0);

                    $xpath = new DOMXPath($dom);
                    $elements = $xpath->query('//tr');

                    $programs->data_seek(0);

                    // for ($i = 0; $i < $elements->length; $i++) {
                    //   echo $elements->item($i)->nodeValue . " - " . $elements->item($i)->nodeName . "<br />";
                    // }

                  ?>
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

<?php require '../include/footer.php' ?>

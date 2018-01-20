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
    $sql = "SELECT `User_Id`, `CommunityCentre_Id` FROM `users` WHERE `users`.`user_name` = '" . $_SESSION["user_name"] . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $favorite = $result->fetch_assoc()["CommunityCentre_Id"];
    }
    else {
      $favorite = false;
    }
  }
  else {
    $favorite = false;
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

  <section class="recreation-centres mt-200 mb-80">
    <div class="container">

      <h2 id="centre-name"><?php echo $centre["Name"] ?>
        <?php if ($login->isUserLoggedIn()) : ?>
          &emsp;
          <?php if ($favorite == $centre_id) : ?>
            <i class="fa fa-star" onclick="unsetFavorite(this, <?php echo $centre_id; ?>)" onmouseover="toggleClass('fa-star', 'fa-star-o')" onmouseout="toggleClass('fa-star-o', 'fa-star')"></i></h2>
          <?php else : ?>
            <i class="fa fa-star-o" onclick="setFavorite(this, <?php echo $centre_id; ?>)" onmouseover="toggleClass('fa-star-o', 'fa-star')" onmouseout="toggleClass('fa-star', 'fa-star-o')"></i></h2>
          <?php endif ?>
        <?php endif ?>
      <!--<p>
        Adam Beck Community Centre is a shared use facility. We offer fun filled programs for all ages including birthday parties packages & community special events. Also, there is limited space available for community group & private permits.
      </p>-->

      <div id="snackbar"></div>
    </div>
  </section>

  <section class="information mb-80">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div id="map" style="height: 300px;" data-address="<?php echo $centre["Address"]; ?>"></div>
          <script>
            var map;
            function initMap() {
              map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 15
              });

              var geocoder = new google.maps.Geocoder();
              geocodeAddress(geocoder, map);
            }

            function geocodeAddress(geocoder, resultsMap) {
              var address = document.getElementById("map").getAttribute("data-address");
              geocoder.geocode({'address': address}, function(results, status) {
                if (status === 'OK') {
                  resultsMap.setCenter(results[0].geometry.location);
                  var marker = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location
                  });
                } else {
                  console.log('Geocode was not successful for the following reason: ' + status);
                }
              });
            }
          </script>
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYrb99vk7KQRzD2Je2fFf43WF9OfXXsq8&callback=initMap" async defer></script>
          <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMIcGShj81KQ_i-LGIst1gD065dGflHuc&callback=initMap" async defer></script> -->
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
              <!-- <div class="alert alert-primary text-center" role="alert">
                <strong>Info:</strong> Open until September 3
              </div> -->
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
                    <th></th>
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
                    $weekday_number_list = array(
                      'Sun' => 0,
                      'Mon' => 1,
                      'Tue' => 2,
                      'Wed' => 3,
                      'Thu' => 4,
                      'Fri' => 5,
                      'Sat' => 6
                    );

                    while ($program = $programs->fetch_assoc()) {
                      if ( !in_array($program["Name"], $listed) ) {
                        array_push($listed, $program["Name"]);

                        $tr = new DOMElement('tr');
                        $thProgram = new DOMElement('th');

                        $weekday_list = array();
                        for ($i = 0; $i < 8; $i++) {
                          array_push($weekday_list, new DOMElement('td'));
                        }

                        $dom->appendChild($tr);
                        $tr->appendChild($thProgram);

                        for ($i = 0; $i < 8; $i++) {
                          $tr->appendChild($weekday_list[$i]);
                        }
                        $pos = strpos($program["Name"], "(");

                        if ($pos) {
                          $firstLine = substr($program["Name"], 0, $pos);
                          $secondLine = substr($program["Name"], $pos);
                          $thProgram->appendChild(new DOMText($firstLine));
                          $thProgram->appendChild(new DOMElement('br'));
                          $span = new DOMElement('span');
                          $thProgram->appendChild($span);
                          $span->appendChild(new DOMText($secondLine));
                        }
                        else {
                          $thProgram->appendChild(new DOMText($program["Name"]));
                        }
                        $tooltip = new DOMElement('div');
                        $weekday_list[7]->appendChild($tooltip);
                        $i_tag = new DOMElement('i');
                        $tooltip->appendChild($i_tag);
                        $tooltip_text = new DOMElement('span');
                        $tooltip->appendChild($tooltip_text);
                        $text = new DOMText($program["Description"]);
                        $tooltip_text->appendChild($text);
                        $tooltip->setAttribute('class', 'own-tooltip');
                        $i_tag->setAttribute('class', 'fa fa-question-circle');
                        $tooltip_text->setAttribute('class', 'tooltiptext tooltip-left');

                        $event_day = get_weekday($program["StartDate"]);
                        $span = new DOMElement('span');
                        $weekday_list[ $weekday_number_list[$event_day] ]->appendChild($span);
                        $span->appendChild(new DOMText(get_time($program["StartTime"], true) . " - " . get_time($program["EndTime"])));
                        $weekday_list[ $weekday_number_list[$event_day] ]->appendChild(new DOMElement('br'));

                      }
                      else {
                        $elements = $xpath->query('//tr');

                        for ($i = 0; $i < $elements->length; $i++) {
                          $node = $elements->item($i);

                          if ($program["Name"] == $node->getElementsByTagName('th')->item(0)->nodeValue) {
                            $event_day = get_weekday($program["StartDate"]);
                            $weekday = $weekday_number_list[$event_day];
                            $element = $node->getElementsByTagName('td')->item($weekday);
                            $span = new DOMElement('span');
                            $element->appendChild($span);
                            $span->appendChild(new DOMText(get_time($program["StartTime"], true) . " - " . get_time($program["EndTime"])));
                            $element->appendChild(new DOMElement('br'));
                            break;
                          }
                        }
                      }
                    }
                    echo $dom->saveHTML();
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

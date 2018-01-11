  <?php require('../include/header.php') ?>

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

        // if (isset($_SESSION["user_name"])) {
        if ($login->isUserLoggedIn()) {
          $userIdSql = "SELECT `User_Id` FROM `users` WHERE `users`.`user_name` = '" . $_SESSION["user_name"] . "'";
          $userId = $conn->query($userIdSql);
          $userId = $userId->fetch_assoc()["User_Id"];
          $sql = "SELECT * FROM `communitycentre` INNER JOIN `users` ON `communitycentre`.`CommunityCentre_Id` = `users`.`CommunityCentre_Id` WHERE `users`.`User_id` = " . $userId . ";";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            $favorite = $result->fetch_assoc();
          }
          else {
            $favorite = false;
          }
        }
        else {
          $userId = 0;
          $favorite = false;
        }

        $sql = "SELECT `communitycentre`.`CommunityCentre_Id`, `Name`, `Address`, `PhoneNumber`, `WebsiteURL` FROM `communitycentre` LEFT JOIN `users` ON `communitycentre`.`CommunityCentre_Id` = `users`.`CommunityCentre_Id` WHERE `users`.`User_Id` IS NULL OR `users`.`User_Id` != " . $userId . ";";
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

          <?php if ($favorite) : ?>
            <?php //$row = $favorite->fetch_assoc(); ?>

            <tr class="favorite">
              <td><?php echo $favorite["Name"] ?><i class="fa fa-star pull-right"></i></td>
              <td><?php echo $favorite["Address"] ?></td>
              <td><?php echo "", (strlen($favorite["PhoneNumber"]) == 0 ? "N/A" : $favorite["PhoneNumber"]) ?></td>
              <td class="text-center">
                <a href="community_centre_details.php?id=<?php echo $favorite['CommunityCentre_Id'] ?>">
                  <i class="fa fa-plus-circle"></i>
                </a>
              </td>
            </tr>
          <?php endif ?>

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

<?php require('../include/footer.php') ?>

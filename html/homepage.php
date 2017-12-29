<!DOCTYPE html>
<html class="skrollr skrollr-desktop">
<head>
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
              <li class="nav-item active">
                <a class="nav-link" href="homepage.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
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

  <header class="hero">
    <div class="container-fluid">
      <div class="intro">
        <h1>
          <span>Welcome to</span>
          <span>So-PhyZ</span>
        </h1>
      </div>
    </div>
  </header>

  <section class="about-us">
    <div class="container">
      <h1 class="text-center">About Us</h1>

      <div id="our-goals" class="row">
        <div class="col-md-6">
          <h2>Our Goals</h2>
          <p>
            We wish to create an accessible website with information regarding community centers located across Toronto.
          </p>
        </div>

        <div class="col-md-6">
          <img class="full-width box-shadow-gray" src="../images/Yoga in the grass.jpg" />
        </div>

        <div class="floating-images">
          <img id="tennis-ball-1" class="skrollable skrollable-between" src="../images/Tennis ball.png" data-0="transform: scale(0.75); top[quadratic]: -150px;" data-800="top: -300px;" />
          <img id="slash-1" class="skrollable skrollable-between" src="../images/Slash.png" data-0="transform: scale(0.75); top[quadratic]: 0px;" data-800="top: -150px;" />
        </div>
      </div>

      <div id="our-drive" class="row">
        <div class="col-md-6">
          <img class="full-width box-shadow-yellow" src="../images/Elderly aqua aerobics.jpg" />
        </div>

        <div class="col-md-6">
          <h2>Our Drive</h2>
          <p>
            We wish to create an accessible website with information regarding community centers located across Toronto.
          </p>
        </div>

        <div class="floating-images">
          <img id="basketball-ball-1" class="skrollable skrollable-between" src="../images/Basketball ball.png" data-0="transform: scale(0.75);" data-200="top[quadratic]: -150px;" data-1000="top: -300px;" />
          <img id="football-ball-1" class="skrollable skrollable-between" src="../images/Football ball.png" data-0="transform: scale(0.75);" data-600="top[quadratic]: -25px;" data-1400="top: -175;" />
          <img id="slash-2" class="skrollable skrollable-between" src="../images/Slash.png" data-0="transform: scale(0.75);" data-800="top[quadratic]: 75px;" data-1600="top: -75px;" />
        </div>
      </div>

      <div id="what-makes-us-special" class="row">
        <div class="col-md-6">
          <h2>What makes us special</h2>
          <p>
            We wish to create an accessible website with information regarding community centers located across Toronto.
          </p>
        </div>

        <div class="col-md-6">
          <img class="full-width box-shadow-green" src="../images/Sport kids smiling.jpg" />
        </div>

        <div class="floating-images">
          <img id="soccer-ball-1" class="skrollable skrollable-between" src="../images/Soccer ball.png" data-0="transform: scale(0.75);" data-800="top[quadratic]: 325px;" data-1600="top: 175px;" />
          <img id="slash-3" class="skrollable skrollable-between" src="../images/Slash.png" data-0="transform: scale(0.75);" data-800="top[quadratic]: 350px;" data-1600="top: 200px;" />
        </div>
      </div>

    </div>
  </section>

  <section class="contact-us">
    <div class="container text-center">
      <h1>Contact Us</h1>

      <div class="row">
        <div class="col-md-8 offset-md-2">
          <p>Send us any and all feedback!</p>

          <form action="" method="POST" onsubmit="return false;" novalidate>
            <div class="form-group">
              <input class="form-control" type="text" placeholder="Name" />
            </div>

            <div class="form-group">
              <input class="form-control" type="email" placeholder="Email*" required />
            </div>

            <div class="form-group">
              <textarea class="form-control" placeholder="Message" rows="5"></textarea>
            </div>

            <div class="text-center">
              <input class="btn btn-primary btn-submit-form" type="submit" value="Send" />
            </div>

          </form>

          <div class="row text-center" style="margin-top: 60px;">
            <div class="col-12">
              <h3 style="font-size: 22px; margin-bottom: 20px;">
                Better yet, send me personally a call!
              </h3>
            </div>
          </div>

          <div class="row text-center">
            <div class="col-12">
              <p>
                We love our customers, so feel free to call anytime, and I will try my best to maintain contact with you!
              </p>
            </div>
          </div>

          <div class="row text-center">
            <div class="col-12">
              <h3 style="font-size: 22px; margin-top: 20px; margin-bottom: 20px;">
                So-PhyZ
              </h3>
            </div>
          </div>

          <div class="row text-center">
            <div class="col-12">
              <p>
                20 Stornoway Court, M1E 5C5, ON M1E5C5, CA<br />
                (416) 903-8267
              </p>
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

  <script type="text/javascript">
  	skrollr.init({
  		smoothScrolling: false
  	});
	</script>

</body>
</html>

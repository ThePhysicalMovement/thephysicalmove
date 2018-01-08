  <?php require_once('../include/header.php') ?>

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

  <?php require ('../include/footer.php') ?>
<!--
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
</html> -->

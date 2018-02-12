<?php
$page_title = 'GetDiet';
include 'inc/header.php';
include 'inc/sessions.php';
  if($_POST){
    if($_POST['logout']){
      session_unset();
      session_destroy();
      header('Location: index');
    }
  }
?>

  <section id="home" class="">
    <div class="container-fluid">
      <div class="row">

        <!-- NAVIGATION MAIN TOP -->
        <section id="nav-top" class="col-12">
          <nav class="navbar navbar-light justify-content-between">
            <a class="navbar-brand" href="#"><img src="img/logo-carrot.png" alt="logo carrot" id="logo-carrot"><span>G</span>etDiet</a>
            <form class="form-inline" action="home.php" method="POST">
              <div class="nav-top-button-container profile-button" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Profile page"><i class="fas fa-user"></i></div>
              <div class="nav-top-button-container home-button" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Home page"><i class="fas fa-home"></i></div>
              <div class="nav-top-button-container logout-button" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Logout"><i class="fas fa-sign-out-alt"></i></div>
              <input type="submit" name="logout" class="d-none" id="input-logout">
            </form>
          </nav>
        </section>
        <!-- END OF NAVIGATION -->



        <!-- SECONDARY NAV/BUTTONS GENERATORS  -->
        <section id="nav-top-secondary" class="d-md-none">
          <div class="nav-left-button-container calc-button" data-container="body" data-toggle="popover" data-placement="bottom" data-content="BMI and BMR calculator">
            <!--calc bmi bmr-->
            <i class="fas fa-calculator"></i>
          </div>

          <div class="nav-left-button-container diet-button" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Diet list">
            <!--diet list-->
            <i class="fas fa-list-ol"></i>
          </div>

          <div class="nav-left-button-container recommended-button" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Recommended sites">
            <!--recommended links-->
            <i class="far fa-thumbs-up"></i>
          </div>
        </section>
        <!-- END OF NAV/BUTTONS TOP MOBILE -->
        
        
        <!-- SECONDARY NAV/BUTTONS GENERATORS MD AND MORE -->
        <section id="nav-top-secondary" class="d-none d-md-block col-2 nav-top-secondary-md">
          <div class="nav-left-button-container calc-button" data-container="body" data-toggle="popover" data-placement="bottom" data-content="BMI and BMR calculator">
            <!--calc bmi bmr-->
            <i class="fas fa-calculator"></i>
          </div>

          <div class="nav-left-button-container diet-button" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Diet list">
            <!--diet list-->
            <i class="fas fa-list-ol"></i>
          </div>

          <div class="nav-left-button-container" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Recommended sites">
            <!--recommended links-->
            <i class="far fa-thumbs-up"></i>
          </div>
        </section>
		<!-- END OF NAV/BUTTONS	LEFT ON MD AND MORE -->


        <!-- MAIN CONTENT  -->
        <section id="main-content" class="ml-auto w-100 col-md-10">
          <div class="welcome-message">
            <div class="jumbotron jumbotron-fluid m-auto">
              <div class="container" id="main-content-welcome-info">
                <h1 class="display-4">Welcome <?php echo $username ?></h1>
                <p class="lead">Welcome!! This is your private diet generator and calculator with ready results. On top you can find: <br> 
                Your profile info <i class="fas fa-user"></i><br> Home page <i class="fas fa-home"></i><br>
                Logout button <i class="fas fa-sign-out-alt"></i><br> On left (or on top if you are using phone):<br>
                BMI and RMR/BMR calculator with all ready results <i class="fas fa-calculator"></i><br>
                Diet list  <i class="fas fa-list-ol"></i><br> Recommended sites <i class="far fa-thumbs-up"></i><br>
                Remember, I am not a diet specialist, these diets are good for me but everyone is diffrent. It can help you with building your own diet. If you have any questions how to change some types of food probably you'll find answer in 'recommended' section. I hope you like it. Have fun!</p>
              </div>
            </div>
          </div>
        </section>
        <!-- END OF MAIN CONTENT -->


      </div>
    </div>
  </section>

  <!-- FOOTER  -->
  <section id="footer" class="m-auto">
    <div id="footer-button">
      <i class="fas fa-angle-double-up"></i>
    </div>
    <div class="container-fluid">
      <div class="row text-center">
        <div class="col-12">
          <p>GetDiet - powered by Mateusz Skibicki</p>
        </div>
        <div class="col-12">
          <img src="img/logo-carrot.png" alt=""><img src="img/logo-carrot.png" alt=""><img src="img/logo-carrot.png" alt=""><img src="img/logo-carrot.png" alt="">
          <p>
            <?php echo date('Y') ?> All rights reserved</p>
        </div>
        <div class="col-12">
          <a href="https://facebook.com/mateusz.skibicki.9" target="_blank"><i class="fab fa-facebook"></i></a>
          <a href="https://www.instagram.com/el.papugo/" target="_blank"> <i class="fab fa-instagram"></i></a>
          <a href="#" target="_blank"><i class="fas fa-home"></i></a>
        </div>
      </div>
    </div>
  </section>
  <!-- FOOTER -->


  <?php include 'inc/footer.php' ?>

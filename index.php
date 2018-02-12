<?php
//If isset session >> redirect to home page
session_start();
if(isset($_SESSION["username"])) {
    header('Location: home');
}


$page_title = 'Diet Generator';
include 'inc/header.php';
?>

  <section id="index" class="m-auto">
    <div class="row">
    
    
     <!-- LEFT SIDE LOGIN -->
      <div class="col-12 col-sm-6" id="welcome-left">
        <div>
          <p><i class="far fa-address-card"></i> Observe your progress.</p>
          <p><i class="fas fa-sort-numeric-up"></i> BMI and BMR calculator.</p>
          <p><i class="fas fa-utensils"></i> Diet generator.</p>
          <p><i class="far fa-handshake"></i> Tips and advices.</p>
          <p><i class="far fa-money-bill-alt"></i> FOR FREE!</p>
        </div>
      </div>
      
      <!-- RIGHT SIDE LOGIN -->
      <div class="col-12 col-sm-6 row text-center m-auto" id="welcome-right">
        <div class="col-12">
         <p class="m-0 p-0">GetDiet project!</p>
          <a href="register"><button class="btn btn-lg btn-register">REGISTER</button></a>
          <a href="login"><button class="btn btn-lg btn-login">LOGIN</button></a><br>
          <span class="small col-12">Powered by Mateusz Skibicki</span>
        </div>
      </div>
      
      
      
    </div>
  </section>


  <?php include 'inc/footer.php' ?>
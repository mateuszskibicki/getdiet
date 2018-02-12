<?php 
include '../inc/sessions.php';
?>


<section id="profile-page" class="">

  <h1 class="profile-page-top-info">Profile info: </h1>

  <ul class="list-group profile-info-list">
    <!--li items -- each for profile info-->
    <!--username-->
    <li class="list-group-item">Username
      <span class="float-right"><?php echo $username; ?></span></li>
    <!--password-->
    <li class="list-group-item">Password
      <span class="float-right">**hidden**</span></li>
    <!--sex-->
    <li class="list-group-item">Sex
      <span class="float-right"><?php echo $user_sex; ?></span></li>
    <!--age-->
    <li class="list-group-item">Age
      <span class="float-right"><?php echo $user_age; ?></span></li>
    <!--weight-->
    <li class="list-group-item">Weight
      <span class="float-right"><?php echo $user_weight; ?></span></li>
    <!--height-->
    <li class="list-group-item">Height
      <span class="float-right"><?php echo $user_height; ?></span></li>
    <!--activity_factor-->
    <li class="list-group-item">Activity factor
      <span class="float-right"><?php echo $user_activity; ?></span></li>
  </ul>

<button class="btn btn-lg mt-2 profile-update-button" id="profile-modal-btn-update">Update</button>
<p>After update you have to login again.</p>



</section>

<script>
//Update profile info
$("#profile-modal-btn-update").on('click', function () {
  $('#profile-page').children().hide('fade', 500, function() {
      $('#profile-page').load('ajax/update-form.php');
      $('#profile-page').hide();
      $('#profile-page').fadeIn(300);
  });
});
</script>

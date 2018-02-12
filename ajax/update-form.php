<?php 
  include '../inc/sessions.php';
?>

<form action="">
  <div class="row">

    <div class="col-12 col-sm-9 col-md-8 form-group">
      <div class="alert alert-danger data-container d-none lead" role="alert">

      </div>
    </div>

    <div class="col-12 col-sm-9 col-md-8 form-group">
      <label for="username">Password</label>
      <input class="form-control" type="password" placeholder="Username" id="password" name="password" value="<?php echo $user_password; ?>">
      <small class="form-text text-muted">Only letters and numbers.</small>
      <!--PASSWORD-->
    </div>

    <div class="col-12 col-sm-9 col-md-8 form-group">
      <label class="mr-sm-2" for="inlineFormCustomSelect">Sex</label>
      <select class="custom-select mr-sm-2" id="sex" name="sex">
            <?php if($user_sex == 'Woman') : ?>
            <option value="Woman" selected>Woman</option>
            <option value="Man">Man</option>
            <?php elseif($user_sex == 'Man') : ?>
            <option value="Woman">Woman</option>
            <option value="Man" selected>Man</option>
            <?php endif; ?>
          </select>
    </div>
    <!-- SEX -->

    <div class="col-12 col-sm-9 col-md-8 form-group">
      <label for="age">Age</label>
      <input class="form-control" type="text" placeholder="Age" id="age" name="age" value="<?php echo $user_age; ?>">
      <!--AGE-->
    </div>

    <div class="col-12 col-sm-9 col-md-8 form-group">
      <label for="weight">Weight in kg</label>
      <input class="form-control" type="text" placeholder="Weight(kg)" id="weight" name="weight" value="<?php echo $user_weight; ?>">
      <!--WEIGHT-->
    </div>

    <div class="col-12 col-sm-9 col-md-8 form-group">
      <label for="height">Height in cm</label>
      <input class="form-control" type="text" placeholder="Height(cm)" id="height" name="height" value="<?php echo $user_height; ?>">
      <!--HEIGHT-->
    </div>

    <div class="col-12 col-sm-9 col-md-8 form-group">
      <label class="mr-sm-2" for="activity_factor">Your activity factor</label>
      <select class="custom-select mr-sm-2" id="activity_factor" name="activity_factor">         
        <option value="1.2" <?php if($user_activity == 1.2){ echo 'selected';};?>>
        Sedentary (you work at a desk job and do very little exercise or housework)</option>
        <option value="1.375" <?php if($user_activity == 1.375){ echo 'selected';};?>>Lightly active (you go for long walks 1–3 days per week or do housework like cleaning and gardening</option>
        <option value="1.55" <?php if($user_activity == 1.55){ echo 'selected';};?>>Moderately active (you’re moving most of the day and/or exercise with a moderate amount of effort 3–5 days of the week</option>
        <option value="1.725" <?php if($user_activity == 1.725){ echo 'selected';};?>>Very active (you’re vigorously exercising or playing sports most days</option>
        <option value="1.9" <?php if($user_activity == 1.9){ echo 'selected';};?>>Extra active (vigorous exercise or sports 6–7 days of the week plus a job which requires physical exertion)</option>
      </select>
    </div>
    <!-- ACTIVITY FACTOR -->
  </div>

  <button id="profile-modal-btn-update" type="button" class="btn profile-update-button mt-3">Save changes</button>
</form>

<script type="text/javascript">
  $('#profile-modal-btn-update').on('click', function() {
    $.post('ajax/update-form-php.php', {
      password: $('#password').val(),
      sex: $('#sex').val(),
      age: $('#age').val(),
      weight: $('#weight').val(),
      height: $('#height').val(),
      activity_factor: $('#activity_factor').val()
    }, function(data) {
      if (data) {
        $('.data-container').removeClass('d-none');
        $('.data-container').html(data);
        $('html, body').animate({
          scrollTop: $("#home").offset().top
        }, 300);
        if(data.length == 2) {
          $('.logout-button').click();
        }
      }
    })
  });

</script>

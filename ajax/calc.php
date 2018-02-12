<?php 
include '../inc/sessions.php';
$bmi = $user_weight/(($user_height/100)*($user_height/100));
$bmi = round($bmi, 2);
if($user_sex == 'Man'){
  $rmr =(10*$user_weight) + (6.25*$user_height) - (5*$user_age) + 5;
  $rmr = round($rmr);
} elseif ($user_sex == 'Woman') {
  $rmr = (10*$user_weight) + (6.25*$user_height) - (5*$user_age) -161;
  $rmr = round($rmr);
}
?>
<section id="calc-bmi">
  <div class="jumbotron jumbotron-fluid mb-0">
    <div class="container">
      <p class="lead">
       Your BMI : <?php echo $bmi; ?> <br>
       Your RMR/BMR : <?php echo $rmr ?> kcal <br>
       What does it mean?
      </p>
      <h1 class="display-4">BMI</h1>
      <p class="lead">
        The body mass index (BMI) is a measure that uses your height and weight to work out if your weight is healthy.<br> The BMI calculation divides an adult's weight in kilograms by their height in metres squared. For example, A BMI of 25 means 25kg/m2.<br> BMI ranges : <br> For most adults, an ideal BMI is in the 18.5 to 24.9 range.<br> For children and young people aged 2 to 18, the BMI calculation takes into account age and gender as well as height and weight.<br>
        <span class="text-stronger">BMI Formula = weight (kg) ÷ (height*height) (m2)<br>
        Your weight: <?php echo $user_weight; ?> kg<br>
        Your height: <?php echo $user_height; ?> cm<br>
        Your BMI: <?php echo $bmi; ?><br></span> If your BMI is:<br>
      </p>
      <ul class="list-group mt-2 mb-2">
        <li class="list-group-item list-group-item-warning">Below 18.5 – you're in the underweight range</li>
        <li class="list-group-item list-group-item-success">Between 18.5 and 24.9 – you're in the healthy weight range</li>
        <li class="list-group-item list-group-item-warning">Between 25 and 29.9 – you're in the overweight range</li>
        <li class="list-group-item list-group-item-danger">Between 30 and 39.9 – you're in the obese range </li>
      </ul>
    </div>
  </div>

  <div class="jumbotron jumbotron-fluid mb-0 mt-0 pt-1">
    <div class="container">
      <h1 class="display-4">RMR/BMR</h1>
      <p class="lead">
        The Resting Metabolic Rate (RMR) is closely related to the basal metabolic rate (BMR) and it is the amount of energy required to maintain the body's normal metabolic activity, such as respiration, maintenance of body temperature (thermogenesis), and digestion. Specifically, it is the amount of energy required at rest with no additional activity. The energy consumed is sufficient only for the functioning of the vital organs such as the heart, lungs, nervous system, kidneys, liver, intestine, sex organs, muscles, and skin<br> My calculator uses the Mifflin-St. Jeor equations to estimate your RMR which is believed to be more accurate than the more commonly used Harris-Benedict equation.<br>
        <span class="text-stronger">RMR/BMR Formula:<br>
        Men<br>
        10 x weight (kg) + 6.25 x height (cm) – 5 x age (y) + 5<br>
        Women<br>
        10 x weight (kg) + 6.25 x height (cm) – 5 x age (y) – 161<br>
        </span> To give yourself an idea of the total calories you’re burning in a day, you take that number and multiply it by your personal activity factor:<br>
      </p>
      <ul class="list-group mt-2 mb-2">
        <li class="list-group-item">Sitting = 1.2</li>
        <li class="list-group-item">Lighly active = 1.375</li>
        <li class="list-group-item">Moderately acrive = 1.550</li>
        <li class="list-group-item">Very active = 1.725</li>
        <li class="list-group-item">Extra active = 1.9</li>
      </ul>
      <p class="lead">
        For example, if you're a 25 year old woman / 70kg / 170cm height :<br> (10 x 70kg) + (6.25 x 170) – (5 x 25) – 161 = 700 + 1062.5 – 125 – 161 = 1476.5 calories <br> Than you have to multiply by your activity factor : <br>
      </p>
      <ul class="list-group mt-2 mb-2">
        <li class="list-group-item">If you’re sedentary (you work at a desk job and do very little exercise or housework) : 1476.5 x 1.2 = 1771.8 calories</li>
        <li class="list-group-item">If you’re lightly active (you go for long walks 1–3 days per week or do housework like cleaning and gardening): 1476.5 x 1.375 = 2030 calories</li>
        <li class="list-group-item">If you’re moderately active (you’re moving most of the day and/or exercise with a moderate amount of effort 3–5 days of the week): 1476.5 x 1.550 = 2288.5 calories</li>
        <li class="list-group-item">If you’re very active (you’re vigorously exercising or playing sports most days): 1476.5 x 1.725 = 2547 calories</li>
        <li class="list-group-item">If you’re extra active (vigorous exercise or sports 6–7 days of the week plus a job which requires physical exertion): 1476.5 x 1.9 = 2805 calories</li>
      </ul>
      <p class="lead">
        <span class="text-stronger">RMR/BMR CALCULATOR FOR YOU :  <br>
        You are: <?php echo $user_sex; ?><br>
        Your weight: <?php echo $user_weight; ?><br>
        Your height: <?php echo $user_height; ?><br>
        Your age: <?php echo $user_age; ?><br>
        Your RMR/BMR: <?php echo $rmr; ?> kcal<br>
        With your activity factor: <?php echo round($rmr*$user_activity); ?> kcal<br></span> All activity factors for you:
        <ul class="list-group mt-2 mb-2">
          <li class="list-group-item">Sedentary:
            <?php echo round($rmr*1.2); ?> kcal
          </li>
          <li class="list-group-item">Lightly active:
            <?php echo round($rmr*1.375); ?> kcal
          </li>
          <li class="list-group-item">Moderately active:
            <?php echo round($rmr*1.550); ?> kcal
          </li>
          <li class="list-group-item">Very active:
            <?php echo round($rmr*1.725); ?> kcal
          </li>
          <li class="list-group-item">Extra active:
            <?php echo round($rmr*1.9); ?> kcal
          </li>
        </ul>
        To checkout prepared diets between 1500-5000 kcal visit section 'Diets'
      </p>
    </div>
  </div>

</section>

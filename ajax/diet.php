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
$daily_kcal = round($rmr * $user_activity);
?>


<section id="diet-list">
	<div class="jumbotron jumbotron-fluid mb-0">
		<div class="container">
			<h1>You need:</h1>
			<p class="lead">
				<strong class="font-weight-bold"><?php echo $daily_kcal ?></strong> kcal daily to keep weight</p>
			<p class="lead">
				<strong class="font-weight-bold"><?php echo $daily_kcal-200 ?></strong> kcal daily to loose weight</p>
			<p class="lead">
				<strong class="font-weight-bold"><?php echo $daily_kcal+200 ?></strong> kcal daily to gain weight</p>
			<select class="form-control" id="diet-list-select">
			 	<option value="1500">Choose diet</option>
			 	<?php for($i=1500; $i<=5000; $i=$i+100) : ?>
				<option value="<?php echo $i; ?>"><?php echo $i; ?> kcal</option>
			 	<?php endfor; ?>
			</select>
			<div id="placeForDiet" class="mt-1">
				<h1>This is place for your diet. Choose calories and read. Below diet you'll find all ideas how to change products and make your diet uniqe and personal.</h1>
			</div>
		</div>
	</div>
</section>

<script>
	//On change check value of select option
	$('#diet-list-select').change(function() {
		var valOfSelect = $(this).val();
		//Take values of json file with smallest diet1500
		$.getJSON('ajax/diet1500.json', function(data) {
			$.each(data, function(key, value) {
				//How many calories more in each product to add 100kcal
				var checkCalories = valOfSelect;
				var multiple = 0;
				var porridge = 5;
				var nuts = 2;
				var yogurt = 5;
				var fruits = 5;
				var chicken = 2;
				var rice = 5;
				var potatoes = 5;
				var vegetables = 5;
				var banana = 1;
				var quark = 5;
				var banana = 0;
				//Switch multiple value depends of select options
				switch (true) {
					case checkCalories == 1600:
						multiple = 1;
						break;
					case checkCalories == 1700:
						multiple = 2;
						break;
					case checkCalories == 1800:
						multiple = 3;
						break;
					case checkCalories == 1900:
						multiple = 4;
						break;
					case checkCalories == 2000:
						multiple = 5;
						break;
					case checkCalories == 2100:
						multiple = 6;
						break;
					case checkCalories == 2200:
						multiple = 7;
						break;
					case checkCalories == 2300:
						multiple = 8;
						break;
					case checkCalories == 2400:
						multiple = 9;
						break;
					case checkCalories == 2500:
						multiple = 10;
						break;
					case checkCalories == 2600:
						multiple = 11;
						break;
					case checkCalories == 2700:
						multiple = 12;
						break;
					case checkCalories == 2800:
						multiple = 13;
						break;
					case checkCalories == 2900:
						multiple = 14;
						break;
					case checkCalories == 3000:
						multiple = 15;
						break;
					case checkCalories == 3100:
						multiple = 16;
						break;
					case checkCalories == 3200:
						multiple = 17;
						break;
					case checkCalories == 3300:
						multiple = 18;
						break;
					case checkCalories == 3400:
						multiple = 19;
						break;
					case checkCalories == 3500:
						multiple = 20;
						banana = 1;
						break;
					case checkCalories == 3600:
						multiple = 21;
						banana = 1;
						break;
					case checkCalories == 3700:
						multiple = 22;
						banana = 1;
						break;
					case checkCalories == 3800:
						multiple = 23;
						banana = 1;
						break;
					case checkCalories == 3900:
						multiple = 24;
						banana = 1;
						break;
					case checkCalories == 4000:
						multiple = 25;
						banana = 1;
						break;
					case checkCalories == 4100:
						multiple = 26;
						banana = 1;
						break;
					case checkCalories == 4200:
						multiple = 27;
						banana = 1;
						break;
					case checkCalories == 4300:
						multiple = 28;
						banana = 1;
						break;
					case checkCalories == 4400:
						multiple = 29;
						banana = 1;
						break;
					case checkCalories == 4500:
						multiple = 30;
						banana = 2;
						break;
					case checkCalories == 4600:
						multiple = 31;
						banana = 2;
						break;
					case checkCalories == 4700:
						multiple = 32;
						banana = 2;
						break;
					case checkCalories == 4800:
						multiple = 33;
						banana = 2;
						break;
					case checkCalories == 4900:
						multiple = 34;
						banana = 2;
						break;
					case checkCalories == 5000:
						multiple = 35;
						banana = 2;
						break;
					default:
						multiple = 0;
						
				}
				//Add input list group
				var input = '';
				input = `
<p class="lead mt-2">
<strong class="font-weight-bold">Diet ${checkCalories} kcal</strong>
	</p>
<ul class="list-group mt-2">
  <li class="list-group-item list-group-item-success lead">First meal - breakfast</li>
  <li class="list-group-item">Porridge oats: ${value.meal1.porridge+(porridge*multiple)}g</li>
  <li class="list-group-item">Yogurt : ${value.meal1.yogurt+(yogurt*multiple)}g</li>
  <li class="list-group-item">Fruits : ${value.meal1.fruits+(fruits*multiple)}g</li>
  <li class="list-group-item">Nuts : ${value.meal1.nuts+(nuts*multiple)}g</li>
  <li class="list-group-item list-group-item-success lead">Second meal - before training</li>
  <li class="list-group-item">Chicken : ${value.meal2.chicken+(chicken*multiple)}g</li>
  <li class="list-group-item">Brown rice : ${value.meal2.rice+(rice*multiple)}g</li>
  <li class="list-group-item">Vegetables : ${value.meal2.vegetables+(vegetables*multiple)}g</li>
  <li class="list-group-item list-group-item-success lead">Third meal - after training</li>
  <li class="list-group-item">Chicken : ${value.meal3.chicken+(chicken*multiple)}g</li>
  <li class="list-group-item">Boiled potatoes : ${value.meal3.potato+(potatoes*multiple)}g</li>
  <li class="list-group-item">Vegetables : ${value.meal3.vegetables+(vegetables*multiple)}g</li>
  <li class="list-group-item list-group-item-success lead">Fourth meal - fruits</li>
  <li class="list-group-item">Whole banana : ${value.meal4.banana+banana}</li>
  <li class="list-group-item list-group-item-success lead">Fifth meal - dinner</li>
  <li class="list-group-item">Quark : ${value.meal5.quark+(quark*multiple)}g</li>
  <li class="list-group-item">Nuts : ${value.meal5.nuts+(nuts*multiple)}g</li>
  <li class="list-group-item">Fruits : ${value.meal5.fruits+(fruits*multiple)}g</li>
</ul>`;
				
				$("#placeForDiet").children().hide('fade', 200, function(){
					$("#placeForDiet").html(input);
					$("#placeForDiet").children().show('fade', 200);
				});
				
				
			});
		});
	});

</script>


<?php

// If isset session >> redirect to home page

session_start();

if (isset($_SESSION["username"])) {
    header('Location: home');
}

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {


    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_POST['register']) {
        if ($_POST['username'] == '' || $_POST['password'] == '' || $_POST['sex'] == '' || $_POST['age'] == '' || $_POST['weight'] == '' || $_POST['height'] == '' || $_POST['activity_factor'] == '') {
            $alert = 'Fill all fields.';
        }
        else {

            // echo 'ok2';

            try {
                include('inc/conf.php');//ASSOC not OBJ
                $username = $_POST['username'];
				
                // WE ARE LOOKING FOR USERNAME IN DB
                $sql = 'SELECT username FROM userinfo WHERE username = "' . $username . '"';
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $userinfo = $stmt->fetch();

                // userinfo >> var with assoc array with user
                // -------
                // $register_username validate
                // -------
                if ($userinfo['username']) {
                    $alert = 'Username exists in databse, choose another one.';
                }
                elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['username'])) {
                    $alert = 'Username : only letters and numbers and dots.';
                }
                else {
                    $register_username = $_POST['username'];
                    $register_username = test_input($register_username);
                }

                // -------
                // $register_password validate
                // -------
                if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['password'])) {
                    $alert = 'Password : only letters and numbers and dots.';
                }
                else {
                    $register_password = $_POST['password'];
                    $register_password = test_input($register_password);

                    // echo $register_password;

                }

                // -------
                // $register_sex validate
                // -------
                if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['sex'])) {
                    $alert = 'Try again.';
                }
                else {
                    $register_sex = $_POST['sex'];
                    $register_sex = test_input($register_sex);
          }

                // -------
                // $register_age validate
                // -------
                if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['age']) || !is_numeric($_POST['age']) || $_POST['age'] > 99) {
                    $alert = 'Age max 99.';
                }
                else {
                    $register_age = $_POST['age'];
                    $register_age = test_input($register_age);
                }

                // -------
                // $register_weight validate
                // -------
                if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['weight']) || !is_numeric($_POST['weight']) || $_POST['weight'] >= 200 || $_POST['weight'] <= 30) {
                    $alert = 'Weight min 30, max 200.';
                }
                else {
                    $register_weight = $_POST['weight'];
                    $register_weight = test_input($register_weight);
                }

                // -------
                // $register_height validate
                // -------
                if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['height']) || !is_numeric($_POST['height']) || $_POST['height'] >= 220 || $_POST['height'] <= 120) {
                    $alert = 'Height min 120, max 220.';
                }
                else {
                    $register_height = $_POST['height'];
                    $register_height = test_input($register_height);
                }

                // -------
                // $register_activity_factor validate
                // -------
                if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['activity_factor']) || !is_numeric($_POST['activity_factor'])) {
                    $alert = 'Activity factor : error.';
                }
                else {
                    $register_activity_factor = $_POST['activity_factor'];
                    $register_activity_factor = test_input($register_activity_factor);
                }

                // -------
                // if true >> PDO insert
                // -------
                if (isset($register_username) && isset($register_password) && isset($register_sex) && isset($register_age) && isset($register_weight) && isset($register_height) && isset($register_activity_factor)) {

                    // insert data
					include('inc/conf.php');//ASSOC not OBJ
                    $sql = 'INSERT INTO userinfo(username, password, sex, age, weight, height, activity_factor) VALUES (:username, :password, :sex, :age, :weight, :height, :activity_factor)';
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(['username' => $register_username, 'password' => $register_password, 'sex' => $register_sex, 'age' => $register_age, 'weight' => $register_weight, 'height' => $register_height, 'activity_factor' => $register_activity_factor]);
                    $success = "Account created. Login website redirecting in 5 seconds.";
                    header('Location: login');
                }
            }

            catch(PDOException $e) {
                $alert = $e;
            }

            $conn = null;
        };
    };
}
$page_title = 'Register';
include 'inc/header.php';
?>

<section id="register" class="row">
	<div class="col-12 col-lg-6 right-login">
		<form action="register.php" method="POST">
			<div class="row">
				<p class="col-12 text-center lead mb-2">Fill in to gain access to GetDiet</p>

				<?php if(isset($alert)) :?>
				<!--isset-->
				<div class="alert alert-danger col-12 text-center" role="alert">
					<?php echo $alert; ?>
				</div>
				<?php endif; ?>

				<?php if(isset($success)) :?>
				<!--isset-->
				<div class="alert alert-success col-12 text-center" role="alert">
					<?php echo $success; ?>
				</div>
				<?php endif; ?>

				<div class="col-12 col-sm-9 col-md-8 form-group m-auto">
					<label for="username">Username</label>
					<input class="form-control" type="text" placeholder="Username" id="username" name="username">
					<small class="form-text text-muted">Only letters and numbers. Max length : 15.</small>
					<!--USERNAME-->
				</div>

				<div class="col-12 col-sm-9 col-md-8 form-group m-auto">
					<label for="password">Password</label>
					<input class="form-control" type="password" placeholder="Password" id="password" name="password">
					<small class="form-text text-muted">Only letters and numbers. Max length : 15.</small>
					<!--PASSWORD-->
				</div>

				<div class="col-12 col-sm-9 col-md-8 form-group m-auto">
					<label class="mr-sm-2" for="inlineFormCustomSelect">Sex</label>
					<select class="custom-select mr-sm-2" id="sex" name="sex">
              <option selected>Choose...</option>
              <option value="Woman">Woman</option>
              <option value="Man">Man</option>
            </select>
				</div>
				<!-- SEX -->

				<div class="col-12 col-sm-9 col-md-8 form-group m-auto">
					<label for="age">Age</label>
					<input class="form-control" type="text" placeholder="Age" id="age" name="age">
					<!--AGE-->
				</div>

				<div class="col-12 col-sm-9 col-md-8 form-group m-auto">
					<label for="weight">Weight in kg</label>
					<input class="form-control" type="text" placeholder="Weight(kg)" id="weight" name="weight">
					<!--WEIGHT-->
				</div>

				<div class="col-12 col-sm-9 col-md-8 form-group m-auto">
					<label for="height">Height in cm</label>
					<input class="form-control" type="text" placeholder="Height(cm)" id="height" name="height">
					<!--HEIGHT-->
				</div>

				<div class="col-12 col-sm-9 col-md-8 form-group m-auto">
					<label class="mr-sm-2" for="activity_factor">Your activity factor</label>
					<select class="custom-select mr-sm-2" id="activity_factor" name="activity_factor">
              <option selected>Choose...</option>
              <option value="1.2">Sedentary (you work at a desk job and do very little exercise or housework)</option>
              <option value="1.375">Lightly active (you go for long walks 1–3 days per week or do housework like cleaning and gardening</option>
              <option value="1.55">Moderately active (you’re moving most of the day and/or exercise with a moderate amount of effort 3–5 days of the week</option>
              <option value="1.725">Very active (you’re vigorously exercising or playing sports most days</option>
              <option value="1.9">Extra active (vigorous exercise or sports 6–7 days of the week plus a job which requires physical exertion)</option>
            </select>
				</div>
				<!-- ACTIVITY FACTOR -->

				<div class="col-12 text-center mt-3">
					<input type="submit" value="Register" name="register" class="btn btn-lg btn-register">
				</div>

			</div>
		</form>
	</div>
	<div class="col-12 col-lg-6 right-login">
		<img class="img-fluid" src="img/screens.png" alt="">
	</div>
</section>

<?php include 'inc/footer.php' ?>

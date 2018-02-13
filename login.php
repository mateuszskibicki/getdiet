<?php

// If isset session >> redirect to home page

session_start();

if (isset($_SESSION["username"])) {
    header('Location: home');
}

if ($_POST) {
    try {
		include('inc/conf.php');
        // USERNAME AND PASSWORD FROM FORM
        $username = $_POST['username'];
        $password = $_POST['password'];

        // WE ARE LOOKING FOR USERNAME IN DB
        $sql = 'SELECT * FROM userinfo WHERE username = "' . $username . '"';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $userinfo = $stmt->fetch();

        // userinfo >> var with assoc array with user

        if ($userinfo["username"]) {
            if ($userinfo["password"] === $password) {
                session_start();
                $_SESSION["id"] = $userinfo["id"];
                $_SESSION["username"] = $userinfo["username"];
                $_SESSION["password"] = $userinfo["password"];
                $_SESSION["sex"] = $userinfo["sex"];
                $_SESSION["age"] = $userinfo["age"];
                $_SESSION["weight"] = $userinfo["weight"];
                $_SESSION["height"] = $userinfo["height"];
                $_SESSION["activity_factor"] = $userinfo["activity_factor"];
                header('Location: home.php');
            }
            else {
                $alert = '<div class="alert alert-danger lead col-8 m-auto mb-3" role="alert">
                      Wrong password!
                      </div>';
            }
        }
        else {
            $alert = '<div class="alert alert-danger lead col-8 m-auto mb-3" role="alert">
                    Wrong username!
                    </div>';
        }
    }

    catch(PDOException $e) {
        echo 'Error :' . $e;
    }

    $conn = null;
}

$page_title = 'Login';
include 'inc/header.php';

?>

<section id="login">
	<div class="row">
		<div class="col-12 col-lg-6 left-login m-auto">
			<form action="login.php" method="POST" class="p-3 pb-0 col-12">
				<div class="row">
					<?php if(isset($alert)){echo $alert;}; ?>
					<h1 class="col-12 text-center display-4 mb-2">Login to GetDiet</h1>
					<div class="col-12 col-md-8 form-group m-auto">
						<label for="username">Username</label>
						<input class="form-control" type="text" placeholder="Username" id="username" name="username">
						<!--USERNAME-->
					</div>
					<div class="col-12 col-md-8 form-group m-auto">
						<label for="password">Password</label>
						<input class="form-control" type="password" placeholder="Password" id="password" name="password">
						<!--PASSWORD-->
					</div>
					<div class="col-12 text-center mt-3">
						<input type="submit" value="Login" name="login" class="btn btn-lg btn-login">
					</div>
					<div class="col-12 text-center mt-3">
						<p class="lead">Don't have an account? Register for free!</p>
					</div>
				</div>
			</form>
			<div class="col-12 text-center mt-0 pb-3">
				<a href="register.php"><button class="btn btn-lg btn-login">REGISTER</button></a>
			</div>
		</div>
		<div class="col-12 col-lg-6 right-login">
			<img class="img-fluid" src="img/screens.png" alt="">
		</div>
	</div>
</section>


<?php include 'inc/footer.php' ?>

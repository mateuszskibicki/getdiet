<?php
include '../inc/sessions.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $host     = "localhost";
    $user     = "root";
    $password = "root";
    $dbname   = "getdiet";
    $dsn      = 'mysql:host=' . $host . ';dbname=' . $dbname;
    /*conn*/
    $conn     = new PDO($dsn, $user, $password);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); //wole assoc niz obj
    $conn->exec("SET CHARACTER SET utf8");
    if ($_POST['password'] == '' || $_POST['sex'] == '' || $_POST['age'] == '' || $_POST['weight'] == '' || $_POST['height'] == '' || $_POST['activity_factor'] == '') {
        $alert = 'Fill all fields';
        echo $alert;
    } else {
        //MAIN PART OF VALIDATION
        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        // -------
        // $register_password validate
        // -------
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['password'])) {
            $alert = 'Password : only letters and numbers and dots.';
        } else {
            $register_password = $_POST['password'];
            $register_password = test_input($register_password);
            //echo $register_password;
        }
        // -------
        // $register_sex validate
        // -------
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['sex'])) {
            $alert = 'Try again.';
        } else {
            $register_sex = $_POST['sex'];
            $register_sex = test_input($register_sex);
            //echo $register_sex;
        }
        // -------
        // $register_age validate
        // -------
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['age']) || !is_numeric($_POST['age']) || $_POST['age'] > 99) {
            $alert = 'Age max 99.';
        } else {
            $register_age = $_POST['age'];
            $register_age = test_input($register_age);
            //echo $register_age;
        }
        // -------
        // $register_weight validate
        // -------
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['weight']) || !is_numeric($_POST['weight']) || $_POST['weight'] >= 200 || $_POST['weight'] <= 30) {
            $alert = 'Weight min 30, max 200.';
        } else {
            $register_weight = $_POST['weight'];
            $register_weight = test_input($register_weight);
            //echo $register_weight;
        }
        // -------
        // $register_height validate
        // -------
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['height']) || !is_numeric($_POST['height']) || $_POST['height'] >= 220 || $_POST['height'] <= 120) {
            $alert = 'Height min 120, max 220.';
        } else {
            $register_height = $_POST['height'];
            $register_height = test_input($register_height);
            //echo $register_height;
        }
        // -------
        // $register_activity_factor validate
        // -------
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['activity_factor']) || !is_numeric($_POST['activity_factor'])) {
            $alert = 'Activity factor : error.';
        } else {
            $register_activity_factor = $_POST['activity_factor'];
            $register_activity_factor = test_input($register_activity_factor);
            //echo $register_activity_factor;
        }
        // -------
        // if true >> PDO insert
        // -------
        if (isset($register_password) && isset($register_sex) && isset($register_age) && isset($register_weight) && isset($register_height) && isset($register_activity_factor)) {
            $id   = $_SESSION['id'];
            $sql  = "
      UPDATE userinfo
        SET 
        password = :password,
        sex = :sex,
        age = :age,
        weight = :weight,
        height = :height,
        activity_factor = :activity_factor
      WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":password", $register_password);
            $stmt->bindValue(":sex", $register_sex);
            $stmt->bindValue(":age", $register_age);
            $stmt->bindValue(":weight", $register_weight);
            $stmt->bindValue(":height", $register_height);
            $stmt->bindValue(":activity_factor", $register_activity_factor);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            $alert = 'ok';
            echo $alert;
            return session_destroy();
            return header('Location: login.php');
        } else {
            echo $alert;
        }
    }
}
?>
   
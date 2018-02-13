<?php
	//info how to set up your db
	//host : localhost
	//user in db : default = root /or change
	//password in db : default = root /or change
	//database name - getdiet
	//table - userinfo
	//structure :
		//id int(10) auto_increment primary
		//username varchar(15)
		//password	varchar(15)
		//sex varchar(5)
		//age int(2)
		//weight int(3)
		//height int(3)
		//activity_factor float
	$host = "localhost";
	$user = "root";
	$password = "root";
	$dbname = "getdiet";
	$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
	$pdo = new PDO($dsn, $user, $password);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); //assoc array

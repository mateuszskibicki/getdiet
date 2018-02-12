<?php
session_start();
if(!$_SESSION["username"]) {
    header('Location: index');
  }
$user_id = $_SESSION["id"];
$username = $_SESSION["username"];
$user_password = $_SESSION["password"];
$user_sex = $_SESSION["sex"];
$user_age = $_SESSION["age"];
$user_weight = $_SESSION["weight"];
$user_height = $_SESSION["height"];
$user_activity = $_SESSION["activity_factor"];
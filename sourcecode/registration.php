<?php

error_reporting(0);
ob_start();
session_start();
header("Pragma: no-cache");
header("Cache: no-cahce");
include_once "../connection/dbconfig.php"; //Connection

$name = $_POST['txt_name'];
$gender = $_POST['txt_gndr'];
$phone = $_POST['txt_phone'];
$email = $_POST['txt_eml'];
$password = $_POST['txt_pass'];

$query = "insert into regestration(name,gender,phone,email,password) values('$name','$gender','$phone','$email','$password')";
$r = mysql_query($query);
$num = (int) $r;
if ($num > 0) {
    $_SESSION['MSG'] = "Your information has been successfully submited.!!";
} else {
    $_SESSION['MSG'] = "Your information has not been submited.!!";
}
header("location:../Regestration.php");
?>

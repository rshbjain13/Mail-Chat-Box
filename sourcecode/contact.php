<?php

error_reporting(0);
ob_start();
session_start();
header("Pragma: no-cache");
header("Cache: no-cahce");
include_once "../connection/dbconfig.php"; //Connection
$uid = $_SESSION['USERID'];

$name = $_POST['txtnme'];
$email = $_POST['txteml'];
$phone = $_POST['txtpne'];

$query = "insert into contacts(name,email,phone,user_id) values('$name','$email','$phone','$uid')";

$r = mysql_query($query);
$num = (int) $r;
if ($num > 0) {
    $_SESSION['MSG'] = "Your contact information has been successfully saved.!!";
} else {
    $_SESSION['MSG'] = "Your contact information has not been saved.!!";
}
header("location:../addcontacts.php");
?>

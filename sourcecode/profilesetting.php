<?php

error_reporting(0);
ob_start();
session_start();
header("Pragma: no-cache");
header("Cache: no-cahce");
include_once "../connection/dbconfig.php"; //Connection

$user_id = $_SESSION['USERID'];
$name = $_POST['txt_name'];
$dob = $_POST['txt_dob'];
$gender = $_POST['txt_gndr'];
$phone = $_POST['txt_phone'];
$address = $_POST['txt_adrs'];
$contact_as = $_POST['txt_cntas'];
$email = $_POST['txt_eml'];
$password = $_POST['txt_pass'];

$query = "update regestration set  name='$name' ,dob='$dob',gender='$gender',phone='$phone',address='$address',contact_as='$contact_as',email='$email' where id='$user_id'";
$r = mysql_query($query);
$num = (int) $r;
if ($num > 0) {
    $_SESSION['MSG'] = "Your information has been successfully updated.!!";
} else {
    $_SESSION['MSG'] = "Your information has not been updated.!!";
}
header("location:../updateprofile.php");
?>


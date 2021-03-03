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
$des = $_POST['txtdes'];

$query = "insert into complain(name,email,phone,des,user_id) values('$name','$email','$phone','$des','$uid')";

$r = mysql_query($query);
$num = (int) $r;
if ($num > 0) {
    $_SESSION['MSG'] = "Your complain information has been successfully saved.!!";
} else {
    $_SESSION['MSG'] = "Your complain information has not been saved.!!";
}
header("location:../complain.php");
?>

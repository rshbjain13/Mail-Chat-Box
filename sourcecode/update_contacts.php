<?php

ob_start();
//genereate customer id
session_start();
$uid = $_SESSION['USERID'];

include_once "../connection/dbconfig.php"; //Connection

$id = $_POST['hidid'];
$name = $_POST['txt_nme'];
$email = $_POST['txt_eml'];
$phone = $_POST['txt_pne'];

$query = "update contacts set name='$name',email='$email',phone='$phone' where id='$id'";
$r = mysql_query($query);
$num = (int) $r;

header("location:../addcontacts.php");
?>

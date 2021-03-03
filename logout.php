<?php

ob_start();
session_start();
header("Pragma: no-cache");
header("Cache: no-cahce");
$user_id = $_SESSION['USERID'];
include_once "connection/dbconfig.php"; //Connection */
$sql = "update regestration set status='3' where id='$user_id'";
$result = mysql_query($sql);
$valueInsert = (int) $result;
$_SESSION['UTYPE'] = "";
$_SESSION['USERID'] = "";
$_SESSION['MSG'] = "";
session_destroy();
header("location:index.php");
?>

<?php

error_reporting(0);
ob_start();
session_start();
header("Pragma: no-cache");
header("Cache: no-cahce");
$user_id = $_SESSION['USERID'];
$name = $_SESSION['NAME'];

include_once "../connection/dbconfig.php"; //Connection */


if (isset($_POST['btnsubmit'])) {


    $reciver = $_POST['rdodoctid'];
    $message = $_POST['textmessage'];
    $query = "insert into message(sender_id,receiver_id,message,date,sname) values('$user_id','$reciver','$message',now(),'$name')";
    $r = mysql_query($query);
    $num = (int) $r;


    header("location:../chatting.php");
} 
?>

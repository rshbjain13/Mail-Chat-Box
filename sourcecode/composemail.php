<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include '../connection/dbconfig.php';

error_reporting(0);
ob_start();
session_start();
$user_id = $_SESSION['USERID'];
$emailfrom = $_SESSION['EMAIL'];
$to = $_POST['txtto'];
$cc = $_POST['txtcc'];
$sub = $_POST['txtsubject'];
$messae = $_POST['textmessage'];

//upload attachement

$current_file = $_FILES['attachedfile']['name'];
$extension = substr(strrchr($current_file, '.'), 1);
$time = date("fYhis");
$file = "attachement_" . $time . "." . $extension;
$path = "../attachement/" . $file;
$action = copy($_FILES['attachedfile']['tmp_name'], $path);
if (!$action) {
    $file = "";
}

if (isset($_POST['btnsend'])) {
//insert into msgbox table
    $query = "insert into mailbox(email_from,email_to,email_cc,subject,message,attachement,type,msg_date) values('$emailfrom','$to','$cc','$sub','$messae','$file','sent',now())";
    $r = mysql_query($query);
    $num = (int) $r;
    if ($num > 0) {
        $_SESSION['MSG'] = "Your email has been successfully send.!!";
    } else {
        $_SESSION['MSG'] = "Your email has not been send.!!";
    }
    echo "<script>window.location.href=('../compose.php')</script>";
} else if (isset($_POST['btnsave'])) {
//insert into msgbox table
    $query = "insert into mailbox(email_from,email_to,email_cc,subject,message,attachement,type,msg_date) values('$emailfrom','$to','$cc','$sub','$messae','$file','draft',now())";
    $r = mysql_query($query);

    $num = (int) $r;
    if ($num > 0) {
        $_SESSION['MSG'] = "Your email has been successfully saved.!!";
    } else {
        $_SESSION['MSG'] = "Your email has not been saved.!!";
    }
     echo "<script>window.location.href=('../compose.php')</script>";
}

//header("location:../compose.php");
?>

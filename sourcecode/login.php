<?php

ob_start(); //start obeject
session_start(); //start sessiong

include('../connection/dbconfig.php');


//click on submit button
if (isset($_POST['btnLogin'])) {

    //variable and validation
    $error_msg = '';
    $row_effected = 0;
    $status = false;


    $loginas = $_POST['rdType']; //email id
    $email = $_POST['login']; //email id
    $password = $_POST['password']; //password

    if ($loginas == "admin") {

        //login for admin
        $query = "select id,name from admin_login where username='$email' and password = '$password'";
        $result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
            $name = $row ['id'];
            $status = true;
            $_SESSION['USERID'] = $name; //patienthome
            $_SESSION['NAME'] = $row ['name'];
        }

        if ($status == true) {
            header("location:../admin/userlist.php");
        } else {
            $_SESSION['MSG'] = "Email id and password are wrong.!!";
            header("location:../index.php");
        }
    } else if ($loginas == "user") {

        //login for patient
        $query = "select id,name from regestration where email='$email' and password = '$password'";
        $result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
            $name = $row ['id'];
            $status = true;
            //update login table
            $query2 = "update regestration set status='4' where id='$name'";
            mysql_query($query2);

            $_SESSION['USERID'] = $name;
            $_SESSION['NAME'] = $row ['name'];
            $_SESSION['EMAIL'] = $email;
        }
        if ($status == true) {
            header("location:../inbox.php");
        } else {
            $_SESSION['MSG'] = "Email id and password are wrong.!!";
            header("location:../index.php");
        }
    } else {
        $_SESSION['MSG'] = $error_msg; //set message in sessiong
        header("location:../index.php");
    }
}
?>

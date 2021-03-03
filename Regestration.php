<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php
error_reporting(0);
//session management
ob_start(); //start obeject
session_start(); //start sessiong
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Emailing - Sign Up </title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <style type="text/css">
            .x-panel-body p {
                margin:10px;
                font-size:12px;
            }
        </style>
        <script type="text/javascript">
            function checkform(){

                var name = document.getElementById("txt_name").value;
                if(name == ""){
                    alert('Name field cannot be blank.');
                    return false;
                }
               
                var gender = document.getElementById("txt_gndr").value;
                if(gender=="na")
                {
                    alert('Please select a gender');
                    return false;
                }
                var phone = document.getElementById("txt_phone").value;
                if(phone == ""){
                    alert('Please Enter Your Contact Number.');
                    return false;
                }
                
                var Email = document.getElementById("txt_eml").value;
                if(Email  == ""){
                    alert('Please Enter Your Email.');
                    return false;
                }
                var a = document.getElementById("txt_pass").value;
                if(a == ""){
                    alert('Password field cannot be blank.');
                    return false;
                }
                
            }

            //check for Integer
            function checkInteger(i)
            {
                if(i.value.length>0)
                {
                    i.value = i.value.replace(/[^\d]+/g, '');


                }

            }
        </script>

    </head>
    <body id="main">        
        <form id="login-form" name="registration-from" action="sourcecode/registration.php" method="post" onSubmit="return checkform()">

            <div style="margin-left: 40px">
                <?php
                if ($_SESSION['MSG'] != '') {
                    echo '<font color="red" style="font-size:13px;">' . $_SESSION['MSG'] . ' </font>';
                    $_SESSION['MSG'] = "";
                }
                ?>
                <div class="clear"></div>
            </div>
            <fieldset>
                <legend>Sign Up</legend>
                <label for="login">Name :</label>
                <input type="text"id="txt_name" name="txt_name" class="login"/>
                <div class="clear"></div>
                <label for="login">Gender : </label>
                <select   id="txt_gndr" name="txt_gndr" class="login">
                    <option value="select"> - - - -Select - - - - </option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

                <div class="clear"></div>
                <label for="login">Mobile No :</label>
                <input type="text" id="txt_phone" name="txt_phone" class="login" onkeyup="checkInteger(this)"/>
                <div class="clear"></div>
                <label for="login">Email ID: </label>
                <input type="text"id="txt_eml" name="txt_eml" class="login"/>
                <div class="clear"></div>
                <label for="password">Password :</label>
                <input type="password" id="txt_pass" name="txt_pass" class="login"/>
                <div class="clear"></div>

                <label for="forgot_pass" style="padding: 0;"><a href="index.php" id="forgot_pass"  class="f_pass" style="color:#ffffff">Log In</a></label>
                <input type="submit" id="btnSignUp" name="btnSignUp" style="cursor:pointer;margin: -25px 0 0 275px;" class="button"  value="Sign Up"/>
            </fieldset>
        </form>
        <div align="center"></div>
    </body>
</html>

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
        <title>Emailing - Login </title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <style type="text/css">
            .x-panel-body p {
                margin:10px;
                font-size:12px;
            }
        </style>
        <script type="text/javascript">
            function checkform(){

                var Email = document.getElementById("login").value;
                if(Email  == ""){
                    alert('Please Enter Your Email.');
                    return false;
                }
                
                var a = document.getElementById("password").value;
                if(a == ""){
                    alert('Password field cannot be blank.');
                    return false;
                }
            }

        </script>

    </head>
    <body id="main">

        <form id="login-form" action="sourcecode/login.php" method="post" onSubmit="return checkform()">

            <div style="margin-left: 110px">
                <?php
                if ($_SESSION['MSG'] != '') {
                    echo '<font color="red" style="font-size:13px;">' . $_SESSION['MSG'] . ' </font>';
                    $_SESSION['MSG'] = "";
                }
                ?>
                <div class="clear"></div><br/>
            </div>
            <div style="margin-left: 42px">

                User Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="rdType" id="rdAdmin" value="admin"/>
                &nbsp;&nbsp;&nbsp;Admin
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="rdType" id="rdUser" value="user" checked/>
                &nbsp;&nbsp;&nbsp;User
                <div class="clear"></div>
            </div>
            <fieldset>
                <legend>Log in</legend>
                <br/>
                <label for="login" style="padding-right: 10px;">Email ID</label>
                <input type="text" id="login"  name="login"/>
                <div class="clear"></div>
                <br/>
                <label for="password" style="padding-right: 10px;">Password</label>
                <input type="password" id="password"  name="password"/>
                <div class="clear"></div>
                <br/>
                <label for="forgot_pass" style="padding: 0;"><a href="Regestration.php" id="forgot_pass"  class="f_pass" style="color:#ffffff">Sign Up</a></label>
                <input type="submit" id="btnLogin" name="btnLogin" style="cursor:pointer;margin: -25px 0 0 250px;" class="button"  value="Log in"/>
            </fieldset>
        </form>
        <div align="center"></div>
    </body>
</html>

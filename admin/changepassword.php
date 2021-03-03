<?php
error_reporting(0);
ob_start();
session_start();
header("Pragma: no-cache");
header("Cache: no-cahce");
$user_id = "";
$user_id = $_SESSION['USERID'];
if ($user_id != '') {
    include_once "connection/dbconfig.php"; //Connection */
?>
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link href="../css/headerbar.css" rel="Stylesheet" type="text/css">
            <title>Emailing</title>
            <script type="text/javascript">
                //function for balnk field
                function validate(){
                    var  oldpwd = document.getElementById('txtoldpwd');
                    if(oldpwd.value.trim() == ""){
                        alert('Old password field cannot be left blank.!!');
                        oldpwd.focus();
                        return false;
                    }
                    var  newpwd = document.getElementById('txtnewpwd');
                    if(newpwd.value.trim() == ""){
                        alert('New password field cannot be left blank.!!');
                        newpwd.focus();
                        return false;
                    }
                    var  conpwd = document.getElementById('txtconpwd');
                    if(conpwd.value.trim() == ""){
                        alert('Confirm password field cannot be left blank.!!');
                        conpwd.focus();
                        return false;
                    }
                    if(newpwd.value.trim() != conpwd.value.trim()){
                        alert('Confirm password does not matched new password.!!');
                        conpwd.focus();
                        return false;
                    }
                }

                //function for check old password
                function oldPassword(val){

                    if(val != ""){
                        var ajaxRequest;  // The variable that makes Ajax possible!
                        try{
                            // Opera 8.0+, Firefox, Safari
                            ajaxRequest = new XMLHttpRequest();
                        } catch (e){
                            // Internet Explorer Browsers
                            try{
                                ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                            } catch (e) {
                                try{
                                    ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                                } catch (e){
                                    // Something went wrong
                                    alert("Your browser broke!");
                                    return false;
                                }
                            }
                        }
                        // Create a function that will receive data sent from the server
                        ajaxRequest.onreadystatechange = function(){
                            if(ajaxRequest.readyState == 4){
                                //document.myForm.time.value = ajaxRequest.responseText;
                                var res = ajaxRequest.responseText;
                                if(res.trim() != "na"){
                                    alert(res);
                                }    
                            }
                        }
                        var queryString = "?oldpwd=" + val;
                        ajaxRequest.open("GET", "changepwd.php" + queryString, true);
                        ajaxRequest.send(null);
                    }else{
                        return;
                    }

                }
            </script>
        </head>
        <body>
            <table cellpadding="0" rules="none" frame="box" cellspacing="0" border="0"  width="100%">
                <tr>
                    <td>
                        <table cellpadding="0" cellspacing="0"  border="0" bgcolor="white" width="950px" align="center">
                            
                            <tr>
                                <td colspan="2">
                                <?php
                                include("header.php");
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td valign="top">
                                <?php include("leftmenu.php"); ?>
                            </td>
                            <td  height="500" valign="top" style="padding-left: 50px;">
                                <form action="changepwd.php" method="post">
                                    <table cellpadding="5" cellspacing="5" border="0">
                                        <tr>
                                            <td class="heading" colspan="2">Change Password</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" valign="middle" align="center">
                                                <?php
                                                if ($_SESSION['MSG'] != '') {
                                                    echo '<div class="msgbox">' . $_SESSION['MSG'] . '</div>';
                                                    $_SESSION['MSG'] = "";
                                                }
                                                ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td >Old Password:</td>
                                            <td><input type="password"  id="txtoldpwd" name="txtoldpwd" style="width: 250px; height: 25px;" onblur="oldPassword(this.value);"></td>
                                        </tr>
                                        <tr>
                                            <td >New Password:</td>
                                            <td><input type="password"  id="txtnewpwd" name="txtnewpwd" style="width: 250px; height: 25px;"></td>
                                        </tr>
                                        <tr>
                                            <td >Confirm Password:</td>
                                            <td><input type="password"  id="txtconpwd" name="txtconpwd" style="width: 250px; height: 25px;"></td>
                                        </tr>

                                        <tr>
                                            <td colspan="2" align="right"><input type="submit" name="btnchangenow" id="btnchangenow" class="button" value="Change Now" onclick="return validate();"/></td>
                                        </tr>

                                    </table>
                                </form>
                            </td>
                        </tr>



                        <tr>
                            <td colspan="2" class="footer" align="center">Design & Developed By : Emailing@Team</td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </body>
</html>
<?php
                                            } else {
                                                $_SESSION['MSG'] = "You must be login"; //set message in sessiong
                                                header("location:index.php");
                                            }
?>



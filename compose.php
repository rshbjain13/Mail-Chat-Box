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
            <link href="css/headerbar.css" rel="Stylesheet" type="text/css">
            <title>Emailing - Compose</title>
            <script type="text/javascript">
                //function for balnk field
                function validate(){
                    var  txtto = document.getElementById('txtto');
                    if(txtto.value.trim() == ""){
                        alert('To field cannot be left blank.!!');
                        txtto.focus();
                        return false;
                    }

                    var  textmessage = document.getElementById('textmessage');
                    if(textmessage.value.trim() == ""){
                        alert('Message field cannot be left blank.!!');
                        textmessage.focus();
                        return false;
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
                            <td  height="500" valign="top" style="padding-left: 10px;width: 750px;">
                                <form id="cntfrm" action="sourcecode/composemail.php" method="post" enctype="multipart/form-data" onsubmit="validate();">
                                    <table cellpadding="1" cellspacing="1" border="0">
                                        <tr>
                                            <td class="heading" colspan="2">Compose</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center" style="padding: 5px;">
                                                <?php
                                                if ($_SESSION['MSG'] != '') {
                                                    echo '<font color="red" style="font-size:13px;">' . $_SESSION['MSG'] . ' </font>';
                                                    $_SESSION['MSG'] = "";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>To:</td>
                                            <td><input type="text" id="txtto" name="txtto" style="width: 550px;" class="login"></td>
                                        </tr>
                                        <tr>
                                            <td>CC:</td>
                                            <td><input type="text" id="txtcc" name="txtcc" style="width: 550px;" class="login"></td>
                                        </tr>
                                        <tr>
                                            <td>Subject:</td>
                                            <td><input type="text" id="txtsubject" name="txtsubject" style="width: 550px;" class="login"></td>
                                        </tr>
                                        <tr>
                                            <td>Attached File:</td>
                                            <td><input type="file" id="attachedfile" name="attachedfile" size="62" class="login"></td>
                                        </tr>
                                        <tr>
                                            <td valign="top">Message:</td>
                                            <td>
                                                <textarea id="textmessage" name="textmessage" style="width: 550px;height: 250px;" class="login"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="right">
                                                <input type="submit" name="btnsave" id="btnsave" class="button" value="Save">
                                                <input type="submit" name="btnsend" id="btnsend" class="button" value="Send">
                                            </td>
                                        </tr>

                                    </table>
                                </form>

                            </td>
                        </tr>


                        <tr>
                            <td colspan="2" class="footer" align="center">Design & Developeded By : Emailing@Team</td>
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



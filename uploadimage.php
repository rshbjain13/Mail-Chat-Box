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
            <title>Emailing - Change Profile Image</title>
            <script type="text/javascript">
                //function for balnk field
                function validate(){
                    var  img = document.getElementById('fileimage');
                    if(img.value.trim() == ""){
                        alert('Please select image.!!');
                        img.focus();
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
                                <form action="sourcecode/uploadimge.php" method="post" enctype="multipart/form-data">
                                    <table cellpadding="5" cellspacing="5" border="0">
                                        <tr>
                                            <td class="heading" colspan="2">Change Profile Picture</td>
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
                                            <td >Select Image:</td>
                                            <td><input type="file"  id="fileimage" name="fileimage" size="30"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="right"><input type="submit" name="uploadimage" id="uploadimage" class="button" value="UploadImage" onclick="return validate();"/></td>
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



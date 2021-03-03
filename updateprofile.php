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
            <title>Emailing - Update Profile</title>
            <script type="text/javascript" src="js/scw.js"></script>
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
                                <form action="sourcecode/profilesetting.php" method="post">
                                    <table cellpadding="1" cellspacing="1" border="0">
                                        <tr>
                                            <td class="heading" colspan="2">Account Setting</td>
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
                                        <?php
                                                $query = "select * from regestration where id = '$user_id'";
                                                $result = mysql_query($query);
                                                while ($row = mysql_fetch_array($result)) {
                                        ?>

                                                    <tr>
                                                        <td>Name:</td>
                                                        <td><input type="text" id="txt_name" name="txt_name" value="<?php echo $row ['name']; ?>" class="login"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>DOB:</td>
                                                        <td><input type="text"  id="txt_dob" name="txt_dob" class="login" readonly onclick="scwShow(this,event)" value="<?php echo $row ['dob']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gender:</td>
                                                        <td>
                                                            <select id="txt_gndr" name="txt_gndr"  class="login">
                                                                <option value="select"> - - - -Select - - - - </option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="<?php echo $row ['gender']; ?>" selected><?php echo $row ['gender']; ?></option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td >Phone</td>
                                                        <td><input type="text"  id="txt_phone" name="txt_phone"  class="login" onkeyup="checkInteger(this,value)" value="<?php echo $row ['phone']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td >Address:</td>
                                                        <td><input type="text"  id="txt_adrs" name="txt_adrs"  class="login" value="<?php echo $row ['address']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td >Contact No:</td>
                                                        <td><input type="text" id="txt_cntas" name="txt_cntas"  class="login" value="<?php echo $row ['contact_as']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td >Email:</td>
                                                        <td><input type="text"  id="txt_eml" name="txt_eml" class="login" value="<?php echo $row ['email']; ?>"  readonly></td>
                                                    </tr>

                                        <?php
                                                }
                                        ?>
                                                <tr>
                                                    <td colspan="2" align="right"><input type="submit" name="btnupdate" id="btnupdate" class="button" value="Update"/></td>
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



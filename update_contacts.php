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
            <title>Emailing - Update Contact</title>
            <script type="text/javascript">
                //function for balnk field

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
                               <table cellpadding="2" border="0">
                                    <tr>
                                        <td class="heading">Update Contacts</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <form id="updtfrm" action="sourcecode/update_contacts.php" method="post">
                                                <table cellpadding="5" cellspacing="5" border="0">
                                                    <?php
                                                    $query = "select * from contacts where id = '" . $_GET['contid'] . "'";

                                                    $result = mysql_query($query);
                                                    while ($row = mysql_fetch_array($result)) {
                                                    ?>

                                                        <tr>
                                                            <td>Name:</td>
                                                            <td>
                                                                <input type="hidden" name="hidid" id="hidid" value="<?php echo $_GET['contid']; ?>">
                                                                <input type="text" id="txt_nme" name="txt_nme" value="<?php echo $row ['name']; ?>" size="30">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email:</td>
                                                            <td><input type="text" id="txt_eml" name="txt_eml" value="<?php echo $row ['email']; ?>" size="30"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Phone:</td>
                                                            <td><input type="text" id="txt_pne" name="txt_pne" value="<?php echo $row ['phone']; ?>" size="30"></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" align="right"><input type="submit" class="button" name="btnupdate" id="btnupdate" class="newuser_button" value="Update"/></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </table>
                                            </form>
                                        </td>
                                    </tr>
                                </table>
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



<?php
error_reporting(0);
ob_start();
session_start();
header("Pragma: no-cache");
header("Cache: no-cahce");
$user_id = "";
$user_id = $_SESSION['USERID'];
$email = $_SESSION['EMAIL'];
if ($user_id != '') {
    include_once "connection/dbconfig.php"; //Connection */
?>
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link href="css/headerbar.css" rel="Stylesheet" type="text/css">
            <title>Emailing - Email Details</title>
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
                                <form action="#" method="post">
                                    <table cellpadding="5" cellspacing="5" border="0" width="100%">
                                        <tr>
                                            <td class="heading" colspan="2">Email Details</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div style="height: 450px;width: 100%;overflow: auto;">
                                                    <table cellpadding="2" cellspacing="2" border="0" width="100%">

                                                        <?php
                                                        $ctr = 0;
                                                        $msgid = $_GET['msgid'];
                                                        $query = "select email_from,email_to,email_cc,subject,message,msg_date,type,attachement from mailbox where msg_id='$msgid'";
                                                        $result = mysql_query($query);
                                                        while ($row = mysql_fetch_array($result)) {
                                                            $ctr++;
                                                            $emailfrom = $row['email_from'];
                                                            $emailto = $row['email_to'];
                                                            $emailcc = $row['email_cc'];
                                                            $subject = $row['subject'];
                                                            $mesage = $row['message'];
                                                            $date = $row['msg_date'];
                                                            $attachement = $row['attachement'];
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    From:
                                                                </td>
                                                                <td>
                                                                <?php echo $emailfrom; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                To:
                                                            </td>
                                                            <td>
                                                                <?php echo $emailto; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                CC:
                                                            </td>
                                                            <td>
                                                                <?php echo $emailcc; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Subject:
                                                            </td>
                                                            <td>
                                                                <?php echo $subject; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Message:
                                                            </td>
                                                            <td>
                                                                <?php echo $mesage; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Date:
                                                            </td>
                                                            <td>
                                                                <?php echo $date; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Attachement:
                                                            </td>
                                                            <td>
                                                                <a href="attachement/<?php echo $attachement; ?>" target="_blank" class="leftlink"><?php echo $attachement; ?></a>
                                                            </td>
                                                        </tr>

                                                        <?php
                                                            }
                                                        ?>
                                                        </table>
                                                    </div>
                                                </td>
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



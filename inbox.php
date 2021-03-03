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
            <title>Emailing - Inbox</title>
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
                                            <td class="heading" colspan="2">Inbox</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div style="height: 450px;width: 100%;overflow: auto;">
                                                    <table cellpadding="2" cellspacing="2" border="0" width="100%">
                                                        <tr>
                                                            <td class="heading_lable">&nbsp;&nbsp;S.No.&nbsp;</td>
                                                            <td class="heading_lable">&nbsp;&nbsp;Email&nbsp;ID&nbsp;</td>
                                                            <td class="heading_lable">&nbsp;&nbsp;Subject&nbsp;&nbsp;</td>
                                                            <td class="heading_lable">&nbsp;&nbsp;Message&nbsp;&nbsp;</td>
                                                            <td class="heading_lable">&nbsp;&nbsp;Date&nbsp;&nbsp;</td>
                                                            <td class="heading_lable">&nbsp;&nbsp;Details&nbsp;&nbsp;</td>
                                                        </tr>
                                                        <?php
                                                        $ctr = 0;
                                                        $query = "select msg_id,email_from,subject,message,msg_date from mailbox where email_to='$email' and type= 'sent' order by msg_id desc";
                                                        $result = mysql_query($query);
                                                        while ($row = mysql_fetch_array($result)) {
                                                            $ctr++;
                                                            $msgid = $row['msg_id'];
                                                            $emailto = $row['email_from'];
                                                            $subject = $row['subject'];
                                                            $mesage = $row['message'];
                                                            $date = $row['msg_date'];
                                                        ?>
                                                            <tr bgcolor="#f2f2f2">
                                                                <td><?php echo $ctr; ?></td>
                                                                <td><?php echo $emailto; ?></td>
                                                                <td><?php echo $subject; ?></td>
                                                                <td><?php echo $mesage; ?></td>
                                                                <td><?php echo $date; ?></td>
                                                                <td><a href="msgdetails.php?msgid=<?php echo $msgid; ?>" class="leftlink">Details</a></td>

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



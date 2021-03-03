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
            <title>Emailing - Chatting</title>
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
                                <form action="sourcecode/chatting.php" method="post">
                                    <table cellpadding="5" cellspacing="5" border="0" width="100%">
                                        <tr>
                                            <td class="heading">Chat With Friends</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table align="left" border="0" cellpadding="2" cellspacing="2">
                                                    <?php
                                                    $result = mysql_query("select r.name,r.img_path,r.id from regestration r join contacts f where f.email = r.email and f.user_id='$user_id' and r.status='4'");
                                                    while ($row = mysql_fetch_array($result)) {
                                                    ?>
                                                        <tr align="center" bgcolor="#F9F9F9">
                                                            <td>
                                                                <img src="uploadedimages/<?php echo $row ['img_path']; ?>" height="60" width="80"/>
                                                            </td>
                                                            <td>
                                                                <table cellpadding="5" cellspacing="5">
                                                                    <tr>
                                                                        <td class="leftlink" style="color: darkgreen;" colspan="2"><?php echo $row ['name']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="radio" name="rdodoctid" id="rdodoctid" value="<?php echo $row ['id']; ?>"/></td>
                                                                        <td>Select : </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td colspan="2">
                                                            <textarea style="height: 60px;width: 250px;" name="textmessage" id="textmessage"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" colspan="2"><input type="submit" name="btnsubmit" id="btnsubmit" value="Send" class="button"/></td>
                                                    </tr>
                                                    <?php
                                                    $result = mysql_query("select sname,message from message where sender_id='$user_id' and date= curdate() or receiver_id= '$user_id' and date = curdate() order by msg_id desc");
                                                    while ($row = mysql_fetch_array($result)) {
                                                        //select message from message where sender_id='4' and date= curdate() or receiver_id= '4' and date = curdate() order by msg_id desc
                                                    ?>
                                                        <tr>
                                                            <td align="left" bgcolor="#f2f2f2" style="color: darkgreen"><?php echo $row ['sname']; ?></td>
                                                            <td align="left" bgcolor="#f2f2f2"><?php echo $row ['message']; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
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



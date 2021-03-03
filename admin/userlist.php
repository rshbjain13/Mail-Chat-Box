<?php
error_reporting(0);
ob_start();
session_start();
header("Pragma: no-cache");
header("Cache: no-cahce");
$user_id = "";
$user_id = $_SESSION['USERID'];
if ($user_id != '') {
    include_once "../connection/dbconfig.php"; //Connection */
     //delete user
    if (isset($_GET['uid'])) {
        $uid = $_GET['uid'];
        echo $uid;
        $query2 = "delete from regestration where id ='$uid'";
        mysql_query($query2);
        header("location:userlist.php");
    }
?>
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link href="../css/headerbar.css" rel="Stylesheet" type="text/css">
            <title>Emailing</title>
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
                            <td  height="500" valign="top" style="padding-left: 10px;">
                                <div style="height: 500px;width: 780px;overflow: auto;">
                                    <table width="900"  align="center" border="0" >
                                        <tr align="center" style="background-color: lightblue;" class="bold_matter">
                                            <td class="heading_lable">Name </td>
                                            <td class="heading_lable">DOB</td>
                                            <td class="heading_lable">Gender</td>
                                            <td class="heading_lable">Phone</td>
                                            <td class="heading_lable">Address</td>
                                            <td class="heading_lable">Contact As</td>
                                            <td class="heading_lable">Email</td>
                                            <td class="heading_lable">Delete</td>
                                        </tr>
                                        <?php
                                        $result = mysql_query("select * from regestration");
                                        while ($row = mysql_fetch_array($result)) {
                                        ?>
                                            <tr align="center" bgcolor="#F9F9F9">
                                                <td><?php echo $row ['name']; ?></td>
                                                <td><?php echo $row ['dob']; ?></td>
                                                <td><?php echo $row ['gender']; ?></td>
                                                <td><?php echo $row ['phone']; ?></td>
                                                <td><?php echo $row ['address']; ?></td>
                                                <td><?php echo $row ['contact_as']; ?></td>
                                                <td><?php echo $row ['email']; ?></td>
                                                <td><a href="userlist.php?uid=<?php echo $row ['id']; ?>" class="leftlink">Delete</a></td>
                                            </tr>
    
                                        <?php
                                        }
                                        ?>
                                    </table>
                                </div>
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
                                        header("location:../index.php");
                                    }
?>



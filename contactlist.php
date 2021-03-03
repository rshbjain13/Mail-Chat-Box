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
    if (isset($_GET['contid'])) {
        $contid = $_GET['contid'];
        $query2 = "delete from contacts where id ='$contid'";
        mysql_query($query2);
        header("location:contactlist.php");
    }
?>
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link href="css/headerbar.css" rel="Stylesheet" type="text/css">
            <title>Emailing - Contact List</title>
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
                                <table width="100%">
                                    <tr>
                                        <td class="heading">Contact List</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div style="height: 450px;width: 100%;overflow: auto;">
                                                <table cellpadding="2" cellspacing="5" border="0" width="100%">
                                                    <tr>
                                                        <td class="heading_lable">&nbsp;&nbsp;Name&nbsp;&nbsp;</td>
                                                        <td class="heading_lable">&nbsp;&nbsp;Email&nbsp;&nbsp;</td>
                                                        <td class="heading_lable">&nbsp;&nbsp;Phone&nbsp;&nbsp;</td>
                                                        <td class="heading_lable">&nbsp;&nbsp;Delete&nbsp;&nbsp;</td>
                                                        <td class="heading_lable">&nbsp;&nbsp;Update&nbsp;&nbsp;</td>
                                                    </tr>
                                                    <?php
                                                    $query = "select * from contacts where user_id = '$user_id' order by name asc";

                                                    $result = mysql_query($query);
                                                    while ($row = mysql_fetch_array($result)) {
                                                    ?>
                                                        <tr bgcolor="#f2f2f2">
                                                            <td><?php echo $row ['name']; ?></td>
                                                            <td><?php echo $row ['email']; ?></td>
                                                            <td><?php echo $row ['phone']; ?></td>
                                                            <td>
                                                                <a class="leftlink" href="contactlist.php?contid=<?php echo $row ['id']; ?>">Delete</a>
                                                            </td>
                                                            <td align="center"><a href="update_contacts.php?contid=<?php echo $row ['id']; ?>" class="leftlink">Update</a></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

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



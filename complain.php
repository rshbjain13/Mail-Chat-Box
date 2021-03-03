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
            <title>Emailing - Add Complaint</title>
            <script type="text/javascript">
                //function for balnk field
                function validate(){
                    var  txtnme = document.getElementById('txtnme');
                    if(txtnme.value.trim() == ""){
                        alert('Name field cannot be left blank.!!');
                        txtnme.focus();
                        return false;
                    }
                    var txteml = document.getElementById('txteml');
                    if(txteml.value.trim() == ""){
                        alert('Email ID field cannot be left blank.!!');
                        txteml.focus();
                        return false;
                    }
                    var  txtpne = document.getElementById('txtpne');
                    if(txtpne.value.trim() == ""){
                        alert('Contact no. field cannot be left blank.!!');
                        txtpne.focus();
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
                                <form id="cntfrm" action="sourcecode/complain.php" method="post" onsubmit="return validate();">
                                    <table cellpadding="2" cellspacing="2" width="100%">
                                        <tr>
                                            <td class="heading">Add Complaint Form</td>
                                        </tr>
                                        <tr>
                                            <td width="100%">
                                                <table align="left" cellpadding="2" cellspacing="2" width="50%">
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
                                                        <td>Name:</td>
                                                        <td align="right"><input type="text" id="txtnme" name="txtnme" class="login"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Complaint&nbsp;User&nbsp;ID:</td>
                                                        <td align="right"><input type="text" id="txteml" name="txteml"class="login"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Subject:</td>
                                                        <td align="right"><input type="text" id="txtpne" name="txtpne" class="login"></td>
                                                    </tr>
													<tr>
                                                        <td>Description:</td>
                                                        <td align="right"><input type="text" id="txtdes" name="txtdes" class="login" style="height:100px;" maxlength="1000" placeholder="Write you message here..."/></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" align="right"><input type="submit" class="button" value="Save"></td>
                                                    </tr>
                                                </table>
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



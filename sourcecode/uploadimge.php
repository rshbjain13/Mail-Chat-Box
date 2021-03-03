<?php

ob_start();
session_start();
header("Pragma: no-cache");
header("Cache: no-cahce");
$user_id = $_SESSION['USERID'];

include_once "../connection/dbconfig.php"; //Connection */

$ComImagePath = "";
$ImagePath = "";
if (isset($_POST['uploadimage'])) {

    $current_image = $_FILES['fileimage']['name'];
    $extension = substr(strrchr($current_image, '.'), 1);
    $time = date("fYhis");
    $ImagePath = "profile_" . $time . "." . $extension;

    $ComImagePath = "../uploadedimages/" . $ImagePath;

    $action = copy($_FILES['fileimage']['tmp_name'], $ComImagePath);

    if (!$action) {
        $_SESSION['MSG'] = "Profile image has not been changed.!!";
    } else {
        //echo "File copy successful";

        $query = "update regestration set img_path='$ImagePath' where id='$user_id'";
        $r = mysql_query($query);
        $num = (int) $r;
        if ($num > 0) {
            $_SESSION['MSG'] = "Profile image has been successfully changed.!!";
        } else {
            $_SESSION['MSG'] = "Profile image has not been changed.!!";
        }
    }

    header("location:../uploadimage.php");
}
?>

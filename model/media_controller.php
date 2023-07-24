<?php
include_once('../db_connect.php');

$action = test_input($_POST['action']);

if($action === "delete_media") {
    $photo = test_input($_POST['photo']);
    if($photo==='1234.png'){
        echo "YOU CAN'T DELETE THIS FILE";
        exit;
    }
    $delete_photos = mysqli_query($connect, "DELETE FROM images WHERE ppt_image='$photo'");
    
    if(mysqli_affected_rows($connect) > 0) {
        if(unlink("../uploads/$photo")) {
            echo "success";
        }
    }
    else {
        echo mysqli_error($connect);
    }
}
?>
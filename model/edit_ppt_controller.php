<?php
include_once('../db_connect.php');

$action = test_input($_POST['action']);

if($action === "update_ppt_data"){
    $main_photo = test_input($_POST['main_photo']);
    $id = test_input($_POST['id']);
    $photos = test_input($_POST['photos']);
    $title = test_input($_POST['title']);
    $price = test_input($_POST['price']);
    $descripion = test_input($_POST['descripion']);
    $street = test_input($_POST['street']);
    $city = test_input($_POST['city']);
    $state = test_input($_POST['state']);
    $country = test_input($_POST['country']);
    $toilet = test_input($_POST['toilet']);
    $bathroom = test_input($_POST['bathroom']);
    $bedroom = test_input($_POST['bedroom']);
    $room = test_input($_POST['room']);
    $size = test_input($_POST['size']);
    $type = test_input($_POST['type']);
    $status = test_input($_POST['status']);
    
    $update_ppt = mysqli_query($connect, "UPDATE property SET 
    main_photo='$main_photo', other_photos='$photos',title='$title',price='$price',description='$descripion',
    street='$street',city='$city',state='$state',country='$country',toilet='$toilet',bathroom='$bathroom',bedroom='$bedroom',
    room='$room',size='$size',type_id='$type',status_id='$status', date_updated=NOW() WHERE id='$id'");
    if($update_ppt) {
        echo "success";
    }
    else {
        echo mysqli_error($connect);
    }
}


if($action === "delete_partly") {
    $id = test_input($_POST['id']);
    $delete_ppt = mysqli_query($connect, "DELETE FROM property WHERE id='$id'");
    if($delete_ppt) {
        echo "success";
    }
    else {
        echo mysqli_error($connect);
    }
}

if($action === "delete_totally") {
    $id = test_input($_POST['id']);
    $main_photo = test_input($_POST['main_photo']);
    $other_photos = test_input($_POST['other_photos']);
    $other_photos_array = explode("*",$other_photos);
    
    $delete_ppt = mysqli_query($connect, "DELETE FROM property WHERE id='$id'");
    $delete_photos = mysqli_query($connect, "DELETE FROM images WHERE ppt_image='$main_photo'");
    $del = mysqli_query($connect, "DELETE FROM images WHERE ppt_image='$other_photos'");
    if($del) {
        echo "success";
        foreach($other_photos_array as $photo) {
            unlink("../uploads/$photo");
        }
    }
    else {
        echo mysqli_error($connect);
    }
}
?>
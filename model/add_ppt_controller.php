<?php
include_once('../db_connect.php');

$action = test_input($_POST['action']);
if($action === "add_ppt_data"){
    $main_photo = test_input($_POST['main_photo']);
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
    $add_ppt = mysqli_query($connect, "INSERT INTO property(main_photo,other_photos,title,price,description,street,city,state,country,toilet,bathroom,bedroom,room,size,type_id,status_id,date_created)
     VALUES('$main_photo','$photos','$title','$price','$descripion','$street','$city','$state','$country','$toilet','$bathroom','$bedroom','$room','$size','$type','$status',NOW())");
    if($add_ppt) {
        echo "success";
    }
    else {
        echo mysqli_error($connect);
    }
}

?>
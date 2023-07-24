<?php
include_once('../db_connect.php');

$action = test_input($_POST['action']);
if($action === "login"){
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $user = mysqli_query($connect, "SELECT firstname,id FROM user WHERE password='$password' AND email='$email'");
    if($row = mysqli_fetch_array($user)) {
        $_SESSION["login"] = true;
        $_SESSION['userid'] = $row['id'];
        $_SESSION['firstname'] = $row['firstname'];
        echo "success";
    }
    else {
        echo mysqli_error($connect);
    }
}

if($action === "add_user"){
    $firstname = test_input($_POST['firstname']);
    $lastname = test_input($_POST['lastname']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $operation = test_input($_POST['operation']);
    if($operation === 'add') {
    $user = mysqli_query($connect, "INSERT INTO user(firstname,lastname,email,password,date_created)
     VALUES('$firstname','$lastname','$email','$password',NOW())");
    }
    elseif ($operation === 'update') {
        $id = test_input($_POST['id']);
        $user = mysqli_query($connect, "UPDATE user SET firstname='$firstname', lastname='$lastname', email='$email', password='$password', date_updated=NOW() WHERE id='$id'");
    }
    if($user) {
        echo "success";
    }
    else {
        echo mysqli_error($connect);
    }
}

if($action === "delete_user") {
    $id = test_input($_POST['id']);
    $delete_ppt = mysqli_query($connect, "DELETE FROM user WHERE id='$id'");
    if($delete_ppt) {
        echo "success";
    }
    else {
        echo mysqli_error($connect);
    }
}
?>
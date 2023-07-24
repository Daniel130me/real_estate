<?php
session_start();
$connect  = mysqli_connect('localhost', 'root', '', 'paphet');
if(mysqli_connect_error()) {
    echo "Failed to connect with error number ".mysqli_connect_errno();
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function get_title_by_id($id) {
    global $connect;
    $title = mysqli_query($connect, "SELECT title FROM property WHERE id='$id'");
    $row = mysqli_fetch_array($title);
    return $row['title'];
}
?>
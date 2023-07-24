<?php
include_once("db_connect.php");

function redirectTohttps() {
    if($_SERVER['HTTPS']!="on") {
    $redirect = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    header("Location:$redirect");
     }
    }
    // redirectTohttps();
    $url = $_SERVER["REQUEST_URI"];


$parameter = explode("/", $url);
// if($url[strlen($url)-1] == "/"){
//     header("Location:".rtrim($url,"/"));
// }

// echo $parameter[2];
// exit;

// var_dump($parameter);
// echo count($parameter);

$pages = array("login","admin_property","properties","contact","about","media","user","edit_property","add_property","home", "dashboard");
if(!empty($parameter[3]) and $parameter[2] == 'property') {
    include("ppt/ppt_title.php");
    exit;
}
// if(!empty($parameter[3]) and $parameter[2] == 'model') {
//     include("model/processmail.php");
//     exit;
// }
if(in_array($parameter[2],$pages)) {
    // echo "kk";
    include($parameter[2].".php");
    exit;
}
if($parameter[2] == "") {

    include("home.php");

    exit;

}

// include("404.html");
exit;
?>
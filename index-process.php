<?php 
  session_start();
  error_reporting(0);
  include_once("function.php");
  
  $myfullname = $_POST['fullname'];
  $myphone = $_POST['phone'];
  $myemail = $_POST['email'];
  $mylevel = $_POST['level'];
  $mydob = $_POST['dob'];
  $mydepartment = $_POST['department'];
  $myeducation = $_POST['education'];
  $myaddress = $_POST['address'];
  $myguarantor = $_POST['guarantor'];
  $mynextofkin = $_POST['nextofkin'];
  $myid = $_POST['id'];
  $action = $_POST['action'];  // $reg_date = date('Y-m-d : h:i:sa');

  // ADD
  if($action == "add")  {
    $add_query = " INSERT INTO employee(loginsession,fullname, phone, email, level, dob, department, education, address, guarantor, nextofkin)
    VALUES('".$_SESSION['loginsession']."', '$myfullname', '$myphone', '$myemail', '$mylevel', ' $mydob', '$mydepartment', '$myeducation', '$myaddress', '$myguarantor', '$mynextofkin' ) ";

    $result = mysqli_query($conn, $add_query);
    if( $result) {
      echo "success";
    } else {
      echo "Error: " . $add_query . "<br>" . mysqli_error($conn);
    }
 }

  // Edit
  elseif($action == "edit")  {
    $edit_query = " SELECT * FROM employee WHERE id = '$myid'";
    $response = mysqli_query($conn, $edit_query);
    $rows = mysqli_fetch_array($response);
   
    echo $rows['fullname']."||".$rows['phone']."||".$rows['email']."||".$rows['level']."||".$rows['dob']."||".$rows['department']."||".$rows['education']."||".$rows['address']."||".$rows['guarantor']."||".$rows['nextofkin'];
    exit;
  }
   
  elseif($action == "update")  {
    $update_query = " UPDATE employee SET fullname='$myfullname', phone='$myphone', email='$myemail', level='$mylevel', dob='$mydob', department='$mydepartment', education='$myeducation', address='$myaddress', guarantor='$myguarantor', nextofkin='$mynextofkin'
    WHERE id = '$myid' ";

    $result = mysqli_query($conn,$update_query); 
    if ($result) {
      echo "success";
    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
 }

 elseif($action == "delete") {
    $delete_query = " DELETE FROM employee WHERE id = '$myid' ";

    $result = mysqli_query($conn,$delete_query); 
    if ($result) {
      echo "success";
    } else {
      echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);

 }

?>
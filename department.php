<?php
error_reporting(0);
include_once('function.php');

$myid = $_POST['id']; 

$query = "SELECT * FROM employee";
$response = mysqli_query($conn, $query);
?>

<select class="form-control">
  <option value="">Select Department</option>
 <?php
  while ($rows = mysqli_fetch_array($response)) {
    $department = $rows['department'];
    $id = $rows['id'];
    
    if($myid == $department){
  ?>
      <option selected value="<?= $id ?>"> <?= $department ?> </option>
  <?php
    }
    else{
?>
  <option value="<?= $id ?>"> <?= $department ?> </option>
 
<?php

    }
  }
  ?>
</select>
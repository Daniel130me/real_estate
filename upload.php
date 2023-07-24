
<?php 
if(!empty($_FILES)){ 
    // Include the database configuration file 
    include_once('db_connect.php'); 
     
    // File path configuration 
    $uploadDir = "uploads/"; 
    $fileName = basename($_FILES['file']['name']); 
    $filename_array = explode(".",$fileName);
    $fileName = rand(1,1000000000). '.' . end($filename_array);
    // exit;
    // $fileName = 123456
    $uploadFilePath = $uploadDir.$fileName; 
     
    // Upload file to server 
    if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath)){ 
        // Insert file information in the database 
        $sql = "INSERT INTO images (ppt_image, date_time) VALUES ('".$fileName."', NOW())"; 
        $result = mysqli_query($connect, $sql);
        if($result) {
            echo "success";
        }
    }
} 
?>

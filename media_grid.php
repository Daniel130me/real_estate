<?php
include("db_connect.php");
?>

<?php
$get_photos = mysqli_query($connect, "SELECT id, ppt_image FROM images ORDER BY date_time DESC");
while($rows = mysqli_fetch_array($get_photos)) {
    ?>
    <!-- <div class="col-12 col-sm-4"> -->
    <img src="uploads/<?=$rows['ppt_image']?>" class="m-2" style="max-width:300px;" height="200" style="object-fit:cover;" data-toggle="modal" data-target="#delete_media_modal" onclick="get_this_photo('<?=$rows['ppt_image']?>')">
    <!-- </div> -->
    <?php
}
?>

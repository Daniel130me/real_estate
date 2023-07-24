<?php
include_once('db_connect.php');
?>
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Title</th>
            <th>Price</th>
            <th>Address</th>
            <th>Description</th>
            <th>Property Type</th>
            <th>Property Status</th>
            <th>Size</th>
            <th>Rooms</th>
            <th>Bedroom</th>
            <th>Toilet</th>
            <th>Bathroom</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
    $ppt_tbl_query = mysqli_query($connect, "SELECT p.*,t.type,s.status FROM property p, property_type t, property_status s WHERE p.type_id=t.id AND p.status_id=s.id ORDER BY p.date_created");
    while($rows = mysqli_fetch_array($ppt_tbl_query)) {
        $adress = $rows['street'].' '.$rows['city'].' '.$rows['state'].' '.$rows['country']
        ?>
        <tr>
            <td class="title_class"><?=$rows['title']?></td>
            <td class="price_class"><?=$rows['price']?></td>
            <td class="address_class"><?=$adress?></td>
            <td class="description_class"><?=$rows['description']?></td>
            <td class="type_class"><?=$rows['type']?></td>
            <td class="status_class"><?=$rows['status']?></td>
            <td class="size_class"><?=$rows['size']?></td>
            <td class="room_class"><?=$rows['room']?></td>
            <td class="bedroom_class"><?=$rows['bedroom']?></td>
            <td class="toilet_class"><?=$rows['toilet']?></td>
            <td class="bathroom_class"><?=$rows['bathroom']?></td>
            <td style="width: 200px;">
                <a href="property/<?=$rows['title']?>" class="ppt_view_btn m-1 btn btn-bl rounded"><i class="fa fa-eye"></i></a>
                <button class="ppt_edit_btn btn btn-bl rounded m-1" data-id='<?=$rows['id']?>'><i class="fas fa-edit"></i></button>
                <button class="ppt_delete_btn btn btn-da rounded m-1" data-other_photos='<?=$rows['other_photos']?>' data-main_photo='<?=$rows['main_photo']?>' data-id='<?=$rows['id']?>' onclick="get_id(this.dataset.id,this.dataset.other_photos,this.dataset.main_photo)" data-toggle="modal"
                    data-target="#pptdelete_modal"><i class="fa fa-times"></i></button>
            </td>
        </tr>

        <?php
    }
    ?>
    </tbody>
</table>



<script>
$(".ppt_edit_btn").click(function(e) {
    window.location = "edit_property.php?id=" + $(this).attr("data-id")
})
// $(".ppt_delete_btn").click(function(e) {
//     $(this)
// }
function get_id(id,other_photos,main_photo) {
    $("#part_delete_btn").attr("data-ppt_id",id)
    $("#total_delete_btn").attr("data-ppt_id",id)
    $("#total_delete_btn").attr("data-other_photos",other_photos)
    $("#total_delete_btn").attr("data-main_photo",main_photo)
}
// $(".ppt_view_btn").click(function(e) {
//     $("#photos_placeholder").empty()
//     var photos = $(this).siblings(".ppt_photos").val().split("*")
//     for (var i = 0; i < photos.length; i++) {
//         $('<img src="./dist/img/' + photos[i] + '"width="100" height="100">').appendTo(
//             "#photos_placeholder")
//     }
//     $("#title_placeholder").html($(this).parent("td").siblings(".title_class").html())
//     $("#price_placeholder").html($(this).parent("td").siblings(".price_class").html())
//     $("#address_placeholder").html($(this).parent("td").siblings(".address_class").html())
//     $("#type_placeholder").html($(this).parent("td").siblings(".type_class").html())
//     $("#status_placeholder").html($(this).parent("td").siblings(".status_class").html())
//     $("#room_placeholder").html($(this).parent("td").siblings(".room_class").html())
//     $("#bedroom_placeholder").html($(this).parent("td").siblings(".bedroom_class").html())
//     $("#toilet_placeholder").html($(this).parent("td").siblings(".toilet_class").html())
//     $("#bathroom_placeholder").html($(this).parent("td").siblings(".bathroom_class").html())
//     $("#description_placeholder").html($(this).parent("td").siblings(".description_class").html())
//     $("#size_placeholder").html($(this).parent("td").siblings(".size_class").html())
// })
</script>
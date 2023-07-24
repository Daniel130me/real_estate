<?php
include_once('db_connect.php');
$id=$_POST['id'];
?>
<div class="container-fluid">
    <?php
                    $ppt_data = mysqli_query($connect, "SELECT p.*, s.status,t.type FROM property p, property_status s, property_type t WHERE p.type_id=t.id AND p.status_id=s.id AND p.id=$id");
                    $row = mysqli_fetch_array($ppt_data);

                ?>
    <div class="card">
        <div class="card-header">
            <p class="card-title">Property Info</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-8 col-12">
                    <label>Title<span class="required">*</span></label>
                    <input type="text" class="form-control" id="edit_title" value="<?=$row['title']?>">
                </div>
                <div class="form-group col-sm-4 col-12">
                    <label>Price<span class="required">*</span></label>
                    <input type="text" class="form-control" id="edit_price" value="<?=$row['price']?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label>Description</label>
                    <textarea class="form-control" placeholder="Write a full description about the property"
                        id="edit_desc"><?=$row['description']?></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <p class="card-title">Property Location</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-6 col-12">
                    <label>Street</label>
                    <input type="text" placeholder="street name" id="edit_street" value="<?=$row['street']?>"
                        class="form-control">
                </div>
                <div class="form-group col-sm-6 col-12">
                    <label>City<span class="required">*</span></label>
                    <input type="text" placeholder="e.g Ikorodu" id="edit_city" value="<?=$row['city']?>"
                        class="form-control">
                </div>
                <div class="form-group col-sm-6 col-12">
                    <label>State</label>
                    <input type="text" placeholder="e.g Lagos" id="edit_state" value="<?=$row['state']?>"
                        class="form-control">
                </div>
                <div class="form-group col-sm-6 col-12">
                    <label>Country</label>
                    <input type="text" placeholder="e.g Nigeria" id="edit_country" value="<?=$row['country']?>"
                        class="form-control">
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <p class="card-title">Property Status & Type</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-8 col-12">
                    <label>Property Status<span class="required">*</span></label>
                    <select class="form-control" id="edit_status">
                        <option value="">Select option</option>
                        <?php
                                        $get_status = mysqli_query($connect, "SELECT id,status FROM property_status");
                                        while ($s_rows = mysqli_fetch_array($get_status)) {
                                            if($s_rows['status'] === $row['status']){
                                                ?>
                        <option selected value="<?=$s_rows['id']?>"><?=$s_rows['status']?></option>
                        <?php
                                            }
                                            else{
                                            ?>
                        <option value="<?=$s_rows['id']?>"><?=$s_rows['status']?></option>
                        <?php
                                            }    
                                    }
                                        ?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-12">
                    <label>Property Type<span class="required">*</span></label>
                    <select class="form-control" id="edit_type">
                        <option value="">Select option</option>
                        <?php
                                        $get_type = mysqli_query($connect, "SELECT id,type FROM property_type");
                                        while ($s_rows = mysqli_fetch_array($get_type)) {
                                            if($s_rows['id'] === $row['type_id']){
                                                ?>
                        <option selected value="<?=$s_rows['id']?>"><?=$s_rows['type']?></option>
                        <?php
                                            }
                                            else{
                                            ?>
                        <option value="<?=$s_rows['id']?>"><?=$s_rows['type']?></option>
                        <?php
                                            }    
                                    }
                                        ?>
                    </select>
                </div>
                <div class="form-group col-sm-6 col-12">
                    <label>Size (in sqm)</label>
                    <input type="number" min="0" placeholder="e.g 200" id="edit_size" value="<?=$row['size']?>"
                        class="form-control">
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <p class="card-title">Property Features</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-6 col-12">
                    <label>No of Rooms</label>
                    <input type="number" min="0" placeholder="e.g 2" id="edit_room" value="<?=$row['room']?>"
                        class="form-control">
                </div>
                <div class="form-group col-sm-6 col-12">
                    <label>No of Bedrooms</label>
                    <input type="number" min="0" placeholder="e.g 1" id="edit_bedroom" value="<?=$row['bedroom']?>"
                        class="form-control">
                </div>
                <div class="form-group col-sm-6 col-12">
                    <label>No of Toilets</label>
                    <input type="number" min="0" placeholder="e.g 2" id="edit_toilet" value="<?=$row['toilet']?>"
                        class="toi form-control">
                </div>
                <div class="form-group col-sm-6 col-12">
                    <label>No of Bathrooms</label>
                    <input type="number" min="0" placeholder="e.g 1" id="edit_bathroom" value="<?=$row['bathroom']?>"
                        class="form-control">
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <p class="card-title">Manage Photos</p>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="row col-12">
                    <div class="col-md-4 col-12 mb-5 mb-md-0">
                        <p class="font-weight-bold">Main Photo<span class="required text-danger">*</span></p>
                        <img id='main_photo' src="uploads/<?=$row["main_photo"]?>" style="object-fit: cover"
                            height="150px" width="200px">
                        <button type="button" class="mt-2 d-block btn btn-da rounded select_main_photo_btn"
                            data-toggle="modal" data-target="#pptedit_photos_modal">Select
                            Photo</button>
                    </div>
                    <div class="col-md-8 col-12" id="more_photos">
                        <p class="font-weight-bold">Other Photo</p>
                        <div class="row">
                            <?php
                        if($row['other_photos'] !==""){
                                            $other_photos_array = explode("*",$row['other_photos']);
                                            foreach($other_photos_array as $other_photo) {
                                        ?>
                            <!-- <span> -->
                            <div class="photo_box m-2 col-12 col-sm-6 col-md-4 p-0"
                                style="position:relative; display:inline-block;"><button
                                    class="btn btn-danger remove_photo" onclick="remove(this)"
                                    style="position:absolute; top:5px; left: 5px;">x</button><img
                                    class="selected_photo w-100" style="object-fit: cover"
                                    src="uploads/<?=$other_photo?>" height="150px"></div>
                            <!-- </span> -->
                            <?php
                                        }
                                    }
                                        ?>
                            <img class="m-2 add_more_photo_btn" data-toggle="modal" data-target="#pptedit_photos_modal"
                                src="uploads/placeholder.png" height="150px">
                        </div>

                    </div>
                </div>
            </div>
            <div id="error_msg_edit_ppt" class="p-3 text-danger"></div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<div class="modal" id="pptedit_photos_modal" style="height: 70%; transform: translateY(20%);">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-blu text-white">
                <p class="modal-title">Select any photo by clicking on it</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <div class="row"> -->
                <?php
                        $fetch_photo = mysqli_query($connect,"SELECT ppt_image FROM images ORDER BY date_time");
                        if(mysqli_num_rows($fetch_photo) < 1) {
                            echo "No Photo yet";
                        }
                        else {
                            while($rows = mysqli_fetch_array($fetch_photo)) {
                                ?>

                <img class='m-1 all_photos_modal' src="uploads/<?=$rows['ppt_image']?>" style="object-fit: cover;"
                    height="150px" width="150px">

                <?php
                            }
                        }
                    ?>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
<script>
var btn_type = "select_main_photo_btn"
$(".select_main_photo_btn").click(function() {
    btn_type = "select_main_photo_btn"
})
$(".add_more_photo_btn").click(function() {
    btn_type = "add_more_photo_btn"
})
$(".all_photos_modal").click(function(e) {
    if (btn_type === "select_main_photo_btn") {
        $("#main_photo").attr("src", $(this).attr("src"))
    } else if (btn_type === "add_more_photo_btn") {
        $('<div class="photo_box m-2 col-sm-6 col-12 col-md-4 p-0" style="position:relative; display:inline-block;"><button class="btn btn-danger remove_photo" onclick="remove(this)" style="position:absolute; top:5px; left:5px;">x</button><img style="object-fit: cover;" class="w-100 selected_photo" src="' +
            $(this).attr("src") + '" height="150px"></div>').insertBefore(
            "#more_photos .add_more_photo_btn");
    }
})

function remove(e) {
    e.closest("div.photo_box").remove()
}
</script>
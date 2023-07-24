<?php
include_once("db_connect.php");
$city =  $_POST['city'];
$status = $_POST['status'];
$price = $_POST['price'] === 'High to Low'? 'ORDER BY p.price DESC' : 'ORDER BY p.price ASC';
$type = $_POST['type'];
$city = $city == 'All' ? '' : 'AND p.city='."'$city'";
$status = $status == 'All' ? '' : 'AND s.status='."'$status'";
$type = $type == 'All' ? '' : 'AND t.type='."'$type'";

$sql = "SELECT p.*,t.type,s.status FROM property p, property_type t, property_status s WHERE p.type_id=t.id AND p.status_id=s.id $city $status $type $price";
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result)<1) {
    echo "We are sorry! <br>We don't have a property for this yet";
}
while($rows = mysqli_fetch_array($result)) {
?>

 <div class="col-lg-4 mx-sm-3 my-sm-5 mx-3 my-4 mb-4 col-12 ppt_card" data-aos="fade-up" data-aos-duration="1500">
                    <a href="property/<?=$rows['title']?>" class="ppt_link">
                        <div style="position:relative; width: 90%; top: -20px; left: 5%; box-shadow: 0 3px 12px rgba(0,0,0,.16); border-radius: 10px; margin-bottom: -20px;">
                            <div class="ppt_label" style="display: flex; position:absolute; right:10px; top:10px;">
                                <p class="card_ppt_status">
                                    <?=$rows['type']?>
                                </p>
                                <p class="card_ppt_type"><?=$rows['status']?></p>
                            </div>

                            <img src="uploads/<?=$rows['main_photo']?>" class="card_ppt_image">
                            
                        </div>
                        <div class="p-3">
                            <p class="card_ppt_title"><?=$rows['title']?></p>
                            
                            <p class="card_ppt_desc"><?=$rows['description']?></p>
                            <hr>
                            <!-- <p class="card_ppt_features">Rooms: <span><=$rows['room']?></span> Toilets:
                                <span><=$rows['toilet']?></span> Size: <span><=$rows['size']?> Sqm</span>
                            </p> -->
                            <div class="d-flex justify-content-between">
                            <p class="card_ppt_price">&#8358; <?=number_format($rows['price'],0,',')?></p>
                            <p class="card_ppt_location"><img src="dist/img/location-black.png" style="margin-bottom: 5px; opacity: .5;">
                                <?=$rows['city']?>, <?=$rows['state']?>
                            </p>
                            </div>
                        </div>
                    </a>
                </div>
<?php
    
}
?>
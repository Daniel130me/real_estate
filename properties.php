<?php
include_once('db_connect.php');
$url = rtrim($_SERVER["REQUEST_URI"],"/");

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paphet Enterprise | Contact</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="dist/css/style.css?v=1">
</head>
<body>

    <div class="topnav" id="myTopnav">
        <div class="container">
            <a href="home" class="logo"><img src="dist/img/logo.png" width="50" height="50"></a>
            <div class="menu">
                <a href="home">Home</a>
                <a href="about">About Us</a>
                <a href="properties" class="active">Properties</a>
                <a href="contact">Contact</a>
            </div>

            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>

    <section style="max-width: 1530px !important; margin-top: 100px;" class="container">
        <div>
            <div class="row mx-auto d-flex d-lg-none justify-content-center" style="max-width: 350px">
                <div class="col-6 mb-3">
                    <select class="form-control" id="type_xs" onchange="get_ppts('xs',this)">
                        <option value="All">All Types</option>
                        <?php
                    $type = mysqli_query($connect, "SELECT * FROM property_type");
                    while($t_rows = mysqli_fetch_array($type)) {
                ?>
                        <option value="<?=$t_rows['type']?>"><?=$t_rows['type']?></option>
                        <?php
                    }
                    ?>
                    </select>
                </div>
                <div class="col-6 mb-3">
                    <select class="form-control" id="status_xs" onchange="get_ppts('xs',this)">
                        <option value="All">All Statuses</option>
                        <?php
                    $status = mysqli_query($connect, "SELECT * FROM property_status");
                    while($s_rows = mysqli_fetch_array($status)) {
                ?>
                        <option value="<?=$s_rows['status']?>"><?=$s_rows['status']?></option>
                        <?php
                    }
                    ?>
                    </select>
                </div>
                <div class="col-6 mb-3">
                    <select class="form-control" id="city_xs" onchange="get_ppts('xs',this)">
                        <option value="All">All Cities</option>
                        <?php
                    $get_city = mysqli_query($connect, "SELECT COUNT(id) AS id, city FROM property GROUP BY city");
                    while($row = mysqli_fetch_array($get_city)) {
                ?>
                        <option value="<?=$row['city']?>"><?=$row['city']?></option>
                        <?php
                    }
                    ?>
                    </select>
                </div>
                <div class="col-6 mb-3">
                    <select class="form-control" id="price_xs" onchange="get_ppts('xs',this)">
                        <option value="High to Low">Price High to Low</option>
                        <option value="Low to High">Price Low to High</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="">
            <div class="row justify-content-center">
                <div class="col-2 filter_lg d-none d-lg-block">
                    <div class="">
                        <p class="font-weight-normal">Type</p>
                        <hr class="filter_title_underline">
                        <p class="type_lg active_side" onclick="get_ppts('lg',this)">All</p>
                        <?php
                        $type = mysqli_query($connect, "SELECT * FROM property_type");
                        while($t_rows = mysqli_fetch_array($type)) {
                            ?>
                        <p class="type_lg" onclick="get_ppts('lg',this)"><?=$t_rows['type']?></p>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="mt-5">
                        <p class="font-weight-normal">Status</p>
                        <hr class="filter_title_underline">
                        <p class="status_lg active_side" onclick="get_ppts('lg',this)">All</p>
                        <?php
                        $status = mysqli_query($connect, "SELECT * FROM property_status");
                        while($s_rows = mysqli_fetch_array($status)) {
                            ?>
                        <p class="status_lg" onclick="get_ppts('lg',this)"><?=$s_rows['status']?></p>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="mt-5">
                        <p class="font-weight-normal">Price</p>
                        <hr class="filter_title_underline">
                        <p class="price_lg active_side" onclick="get_ppts('lg',this)">High to Low</p>
                        <p class="price_lg" onclick="get_ppts('lg',this)">Low to High</p>
                    </div>
                    <div class="mt-5">
                        <p class="font-weight-normal">City</p>
                        <select class="form-control" id="city_lg" onchange="get_ppts('lg',this)">
                            <option value="All">All</option>
                            <?php
                            $get_city = mysqli_query($connect, "SELECT COUNT(id) AS id, city FROM property GROUP BY city");
                            while($row = mysqli_fetch_array($get_city)) {
                        ?>
                            <option value="<?=$row['city']?>"><?=$row['city']?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-10 row justify-content-center align-items-start" id="ppt_grid"></div>
            </div>
        </div>
    </section>
</body>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
window.addEventListener('scroll', function() {
    const header = document.querySelector(".topnav");
    header.classList.toggle("sticky", window.scrollY > 0)
});

function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive sticky";
    } else if (x.className === "topnav sticky") {
        x.className = "topnav sticky responsive";
    } else if (x.className === "topnav responsive") {
        x.className = "topnav";
    } else if (x.className === "topnav sticky responsive" || x.className === "topnav responsive sticky") {
        x.className = "topnav sticky";
    }
}

get_ppts("default")

function get_ppts(item, evt = null) {
    var data, type, status, city;

    if (item === "lg") {
        city = $("#city_lg").val()
        if (evt !== null) {
            $("." + evt.className).removeClass("active_side")
            evt.classList.add("active_side")
            $("#city_lg").removeClass("active_side")
            type = $(".type_lg.active_side").html()
            status = $(".status_lg.active_side").html()
            price = $(".price_lg.active_side").html()
            // console.log(price)
            // window.location = 'properties.php?city=12'
            data = {
                city: city,
                status: status,
                price: price,
                type: type
            }
        }
    } else if (item === "default") {
        data = {
            city: 'All',
            status: 'All',
            price: 'High to Low',
            type: 'All'
        }
    } else {
        city = $("#city_xs").val()
        status = $("#status_xs").val()
        price = $("#price_xs").val()
        type = $("#type_xs").val()
        data = {
            city: city,
            status: status,
            price: price,
            type: type
        }
    }

    $.ajax({
        url: "display_ppt_grid.php",
        data: data,
        type: "post",
        success: function(data) {

            $("#ppt_grid").html(data)
        }
    })
}
</script>
</body>
</html>
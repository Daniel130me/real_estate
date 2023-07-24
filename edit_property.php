<?php
include_once('db_connect.php');
$id = $_GET["id"];
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paphet Enterprise | Edit property</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="dist/css/admin_css.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand bg-blu ml-0">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" onclick="history.back()" role="button">Back</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <p class="nav-link mb-0 text-white">Welcome, <span
                            class="font-weight-bold"><?=$_SESSION['firstname']?></span></p>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper ml-0 bg-faint">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2 justify-content-center">
                        <div class="col-sm-6 col-6">
                            <h2 class="m-0 font_times">Edit property</h2>
                        </div><!-- /.col -->
                        <div class="col-sm-6 col-6 text-right">
                            <a href="add_property" class="btn btn-bl">Add Property</a>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content pb-3">
                <div id="property_edit_form"></div>
                <button class="btn btn-bl" id="update_ppt_btn" onclick="update()">Save Changes</button>
                <a  href="property/<?=get_title_by_id($id)?>" class="btn btn-bl">View Property</a>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->


    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer ml-0">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Designed by <strong><a href="https://nieldigital.com" target="_blank">nieldigital.com</a></strong>
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; <?=date("Y")?></strong> All rights
        reserved.
    </footer>
    </div>
    <!-- Photo Upload html -->
    <!-- <div class="col-12">
        <img class='user_image_profile_page' src="./dist/img/placeholder.png" height=150px>
        <input type="file" name="user_image" accept="image/*" class="form-control user_image" />
        <button type="button" class="btn btn-danger">Remove</button>
    </div> -->
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script>
    // photo uploads javascript
    // $(".user_image").change(function(e) {
    //     var file = $(this)[0].files[0]
    //     if (file) {
    //         $(this).siblings(".user_image_profile_page").attr("src", URL.createObjectURL(file))
    //     }
    // })
    load_edit_form()

    function load_edit_form() {
        $.ajax({
            url: "display_edit_ppt.php",
            data: {
                id: <?=$id?>
            },
            type: "post",
            beforeSend: function() {
                $("#property_edit_form").html("Loading...")
            },
            success: function(data) {
                data = data.trim()
                $("#property_edit_form").html(data)
            }

        })
    }


    function update() {
        var main_photo = $("#main_photo").attr("src");
        var main_photo_array = main_photo.split("/")
        var main_photo = main_photo_array[main_photo_array.length - 1]

        var photos_array = []
        var selected_photo = document.getElementsByClassName("selected_photo")
        for (i = 0; selected_photo[i]; i++) {
            var link = selected_photo[i].src.split("/")
            photos_array.push(link[link.length - 1])
        }
        var photos = photos_array.join("*")
        var title = $("#edit_title").val()
        var price = $("#edit_price").val()
        var descripion = $("#edit_desc").val()
        var street = $("#edit_street").val()
        var city = $("#edit_city").val()
        var state = $("#edit_state").val()
        var country = $("#edit_country").val()
        var toilet = $("#edit_toilet").val()
        var bathroom = $("#edit_bathroom").val()
        var bedroom = $("#edit_bedroom").val()
        var room = $("#edit_room").val()
        var size = $("#edit_size").val()
        var type = $("#edit_type").val()
        var status = $("#edit_status").val()
        if(!title || !price || !main_photo || !type || !status || !city) {
            $("#error_msg_edit_ppt").html("Title, Price, City, Status, Type and Main photo are required!")
            return false
        }
        var data = {
            id: <?=$id?>,
            main_photo: main_photo,
            photos: photos,
            title: title,
            price: price,
            descripion: descripion,
            street: street,
            city: city,
            state: state,
            country: country,
            toilet: toilet,
            bathroom: bathroom,
            bedroom: bedroom,
            room: room,
            size: size,
            type: type,
            status: status,
            action: "update_ppt_data"
        }
        $.ajax({
            url: "model/edit_ppt_controller.php",
            data: data,
            type: "post",
            beforeSend: function() {
                $("#update_ppt_btn").html("Loading...")
            },
            success: function(data) {
                data = data.trim()
                if (data === "success") {
                    load_edit_form()
                    $("#update_ppt_btn").html("Save Changes")
                }
            }

        })
    }
    </script>
</body>

</html>
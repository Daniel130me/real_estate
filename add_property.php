<?php
include_once('db_connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paphet Enterprise | Add Property</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="dist/css/admin_css.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand bg-blu">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i
                                    class="fas fa-bars"></i></a>
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
        <aside class="main-sidebar sidebar-light-primary elevation-4 bg-faint" style="position: fixed;">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Paphet</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block"><?=$_SESSION['firstname']?></a>
                    </div>
                </div>
                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="admin_property" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Property
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="add_property" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Add property
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="media" class="nav-link active">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Media
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="user" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper bg-faint">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 font_times">Add Property</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <!-- <div class="content"> -->
            <div class="content pb-3">
                <div id="property_add_form"></div>

                <button class="btn btn-bl" id="add_ppt_btn" onclick="add()">Publish</button>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
            <!-- </div> -->
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    <div class="modal" id="pptdelete_modal">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 350px;">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body text-center">
                    <div class="mb-4">
                        <p>Delete this property data excluding photos</p>
                        <button class="btn btn-warning" id="part_delete_btn" data-ppt_id=""
                            onclick="delete_partly(this.dataset.ppt_id)">Delete property data only</button>
                    </div>
                    <div>
                        <p>Delete this property data with all photos attached to it</p>
                        <button class="btn btn-danger" id="total_delete_btn" data-ppt_id="" data-other_photos=""
                            data-main_photo=""
                            onclick="delete_totally(this.dataset.ppt_id,this.dataset.other_photos,this.dataset.main_photo)">Delete
                            totally</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Designed by <strong><a href="https://nieldigital.com" target="_blank">nieldigital.com</a></strong>
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; <?=date("Y")?></strong> All rights
        reserved.
    </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
    load_add_form()

    function load_add_form() {
        $.ajax({
            url: "display_add_property.php",
            type: "post",
            beforeSend: function() {
                $("#property_add_form").html("Loading...")
            },
            success: function(data) {
                data = data.trim()
                $("#property_add_form").html(data)
            }

        })
    }


    function add() {
        var main_photo = $("#main_photo_").attr("src");
        var main_photo_array = main_photo.split("/")
        var main_photo = main_photo_array[main_photo_array.length - 1]

        var photos_array = []
        var selected_photo = document.getElementsByClassName("selected_photo")
        for (i = 0; selected_photo[i]; i++) {
            var link = selected_photo[i].src.split("/")
            photos_array.push(link[link.length - 1])
        }
        var photos = photos_array.join("*")
        var title = $("#edit_title_").val()
        var price = $("#edit_price_").val()
        var descripion = $("#edit_desc_").val()
        var street = $("#edit_street_").val()
        var city = $("#edit_city_").val()
        var state = $("#edit_state_").val()
        var country = $("#edit_country_").val()
        var toilet = $("#edit_toilet_").val()
        var bathroom = $("#edit_bathroom_").val()
        var bedroom = $("#edit_bedroom_").val()
        var room = $("#edit_room_").val()
        var size = $("#edit_size_").val()
        var type = $("#edit_type_").val()
        var status = $("#edit_status_").val()
        if (!title || !price || !main_photo || !type || !status || !city) {
            $("#error_msg_add_ppt").html("Title, Price, City, Status, Type and Main photo are required!")
            return false
        }

        var data = {
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
            action: "add_ppt_data"
        }
        $.ajax({
            url: "model/add_ppt_controller.php",
            data: data,
            type: "post",
            beforeSend: function() {
                $("#add_ppt_btn").html("Loading...")
            },
            success: function(data) {
                data = data.trim()
                if (data === "success") {
                    load_add_form()
                    $("#add_ppt_btn").html("Save Changes")
                    $("#error_msg_add_ppt").html("")
                    $('<a  href="property/' + title + '" class=" ml-3 btn btn-bl">View Property</a>')
                        .insertAfter("#add_ppt_btn")
                }
            }

        })
    }
    </script>
</body>

</html>
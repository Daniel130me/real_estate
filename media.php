<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paphet Enterprise | Media</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="dist/css/admin_css.css">
    <link rel="stylesheet" type="text/css" href="plugins/dropzone/min/dropzone.min.css" />
    <script type="text/javascript" src="plugins/dropzone/min/dropzone.min.js"></script>
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
                            <a href="media" class="nav-link">
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
                            <h1 class="m-0">Media</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Upload Photos</div>
                        </div>
                        <div class="card-body">
                            <div class="panel">
                                <div class="image_upload_div">
                                    <form action="upload.php" enctype="multipart/form-data" class="dropzone"
                                        id="my-dropzone">
                                        <div class="dz-message">
                                            Drop files here or click to upload.<br>
                                        </div>
                                    </form>
                                    <button id="startUpload" class="mt-3 btn btn-bl rounded">UPLOAD</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <p class="card-title">Manage Photos&nbsp; &nbsp; <i class="small">Click any photo to
                                    delete</i></p>
                  <i class="fas fa fa-sync-alt float-right text-blue" onclick="fetch_media_photos()"></i>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body row" id="media_grid"></div>
                        <!-- /.card-body -->
                    </div>

                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    <div class="modal" id="delete_media_modal">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 350px;">
            <div class="modal-content">
                <div class="modal-header bg-blu text-white">
                    <p class="modal-title">Delete Photo</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">×</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="modal-body text-center">
                    <div class="mb-4">
                        <p>Delete this photo permanently</p>
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-da" id="delete_media_btn" data-photo=""
                                    onclick="delete_media_photo(this.dataset.photo)">Delete Photo</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-outline-primary" data-dismiss="modal"
                                    aria-label="Close">Cancel</button>
                            </div>
                        </div>
                        <p id="warning" class="text-warning"></p>
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
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- bs-custom-file-input -->
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script>
    fetch_media_photos()

    function fetch_media_photos() {
        $.ajax({
            url: "media_grid.php",
            type: "post",
            success: function(data) {
                $("#media_grid").html(data)
            }
        })
    }
    //Disabling autoDiscover
    Dropzone.autoDiscover = false;
    //setup dropzone
    Dropzone.options.myDropzone = {
        init: function() {
            this.on("addedfile", function(file) {
                var removeButton = Dropzone.createElement(
                    "<button class='btn btn-danger'>Remove</button>");

                var _this = this;

                removeButton.addEventListener("click", function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    _this.removeFile(file);
                })
                file.previewElement.appendChild(removeButton);
            })
            // this.on("success", function(file, response) {
            //     response = response.trim()
            //     if (response == 'success') {
            //         fetch_media_photos()
            //     }
            //     // file.previewTemplate.appendChild(document.createTextNode(responseText))
            // })
        }
    }

    $(function() {
        //Dropzone class
        var myDropzone = new Dropzone(".dropzone", {
            url: "upload.php",
            paramName: "file",
            maxFilesize: 2,
            maxFiles: 100,
            acceptedFiles: "image/*,application/pdf",
            autoProcessQueue: false
        });

        $('#startUpload').click(function() {
            myDropzone.processQueue();
        });
    });

    function get_this_photo(photo) {
        $("#warning").html("")
        $("#delete_media_btn").attr("data-photo", photo)
    }

    function delete_media_photo(photo) {

        $.ajax({
            url: "model/media_controller.php",
            type: "post",
            data: {
                photo: photo,
                action: "delete_media"
            },
            beforeSend: function() {
                $("#delete_media_btn").html("Deleting...")
            },
            success: function(data) {
                if (data === "success") {
                    $("#delete_media_btn").html("Delete")
                    $("#delete_media_modal").modal("hide")
                    fetch_media_photos()
                } else {
                    $("#warning").html(data)
                    $("#delete_media_btn").html("Delete")
                }
            }
        })
    }
    </script>

</body>

</html>
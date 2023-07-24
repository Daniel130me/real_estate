<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paphet Enterprise | Property Management</title>

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
        <div class="content-wrapper" style="background-color: #F4F7FC">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2 justify-content-center">
                        <div class="col-sm-6 col-6">
                            <h2 class="m-0 font_times">Properties</h2>
                        </div><!-- /.col -->
                        <div class="col-sm-6 col-6 text-right">
                            <a href="add_property" class="btn btn-bl">Add Property</a>
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
                            <h3 class="card-title">Properties Record Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" id="ppt_table"></div>
                        <!-- /.card-body -->
                    </div>

                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    <div class="modal" id="pptdelete_modal">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 350px;">
            <div class="modal-content">
                <div class="modal-header bg-blu text-white">
                    <p class="modal-title">Delete Record</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">×</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="modal-body text-center">
                    <div class="mb-4">
                        <p>Delete this property data excluding photos</p>
                        <button class="btn btn-warning col-12" id="part_delete_btn" data-ppt_id=""
                            onclick="delete_partly(this.dataset.ppt_id)">Delete property data only</button>
                    </div>
                    <div>
                        <p>Delete this property data with all photos attached to it</p>
                        <button class="btn btn-da rounded mb-3 col-12" id="total_delete_btn" data-ppt_id="" data-other_photos=""
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
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
    fetch_ppt_tbl()

    function fetch_ppt_tbl() {
        $.ajax({
            url: "property_table.php",
            type: "post",
            success: function(data) {
                $("#ppt_table").html(data)
            }
        })
    }

    //upload photo
    // $(".user_image").change(function(e) {
    //     var file = $(this)[0].files[0]
    //     if(file) {
    //         $(this).siblings(".user_image_profile_page").attr("src",URL.createObjectURL(file))
    //     }
    // })

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
            $('<span><div style="position:relative; display:inline;"><button class="btn btn-danger remove_photo" onclick="remove(this)" style="position:absolute">x</button><img class="m-1 selected_photo" src="' +
                $(this).attr("src") + '" height="150px"></div></span>').insertBefore(
                "#more_photos .add_more_photo_btn");
        }
    })

    function delete_partly(id) {
        $.ajax({
            url: "model/edit_ppt_controller.php",
            type: "post",
            data: {
                id: id,
                action: "delete_partly"
            },
            beforeSend: function() {
                $("#part_delete_btn").html("Deleting...")
            },
            success: function(data) {
                if (data === "success") {
                    $("#part_delete_btn").html("Delete property data only")
                    $("#pptdelete_modal").modal("hide")
                    fetch_ppt_tbl()
                }
            }
        })
    }

    function delete_totally(id, other_photos, main_photo) {
        $.ajax({
            url: "model/edit_ppt_controller.php",
            type: "post",
            data: {
                id: id,
                other_photos: other_photos,
                main_photo: main_photo,
                action: "delete_totally"
            },
            beforeSend: function() {
                $("#total_delete_btn").html("Deleting...")
            },
            success: function(data) {
                if(data.indexOf('success') !== -1) {
                    $("#total_delete_btn").html("Delete totally")
                    $("#pptdelete_modal").modal("hide")
                    fetch_ppt_tbl()
                }
            }
        })
    }
    </script>
    <script>
    $(function() {

        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paphet Enterprise | User Management</title>

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
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2 justify-content-center">
                        <div class="col-sm-6 col-6">
                            <h2 class="m-0 font_times">Properties</h2>
                        </div><!-- /.col -->
                        <div class="col-sm-6 col-6 text-right">
                            <button class="btn btn-bl rounded" onclick='update_form_data()' data-toggle="modal"
                                data-target="#add_user_modal">Add
                                User</button>
                                <button class="btn btn-bl rounded" onclick='upda()'>ll
                                User</button>
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
                            <h3 class="card-title">User Information</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" id="user_table"></div>
                        <!-- /.card-body -->
                    </div>

                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    <div class="modal" id="add_user_modal">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 350px;">
            <div class="modal-content">
                <div class="modal-header bg-blu">
                    <p class="modal-title text-white">Add User</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">×</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form id="user_form" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="userfirstname">First Name</label>
                            <input type="text" class="form-control" id="user_first_name" placeholder="Your First name">
                        </div>
                        <div class="form-group">
                            <label for="userlastname">Last Name(surname)</label>
                            <input type="text" class="form-control" id="user_last_name" placeholder="Your last name">
                        </div>
                        <div class="form-group">
                            <label for="userEmail1">Email address</label>
                            <input type="email" class="form-control" id="user_email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="userPassword">Password</label>
                            <input type="password" class="form-control" id="user_password" placeholder="Password">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-bl rounded" data-id="" data-action=""
                        id="add_user_btn">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal" id="userdelete_modal">
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
                        <p>Delete this user permanently</p>
                        <button class="btn btn-da" id="user_delete_btn" data-user_id=""
                            onclick="delete_user(this.dataset.user_id)">Delete</button>
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
    $("#user_form").submit(function(event) {
        var formData = {
            id: $("#add_user_btn").attr("data-id"),
            firstname: $("#user_first_name").val(),
            lastname: $("#user_last_name").val(),
            email: $("#user_email").val(),
            password: $("#user_password").val(),
            operation: $("#add_user_btn").attr("data-action"),
            action: "add_user"
        };
        $.ajax({
            type: "POST",
            url: "model/user_controller.php",
            data: formData,
            beforeSend: function() {
                $("#add_user_btn").html("Processing")
            },
            success: function(data) {
                if (data === 'success') {
                    $("#add_user_btn").html("Submit")
                    $("#add_user_modal").modal("hide")
                    fetch_user_tbl()
                }
            }
        })
        event.preventDefault();
    });
    fetch_user_tbl()

    function fetch_user_tbl() {
        $.ajax({
            url: "user_table.php",
            type: "post",
            success: function(data) {
                $("#user_table").html(data)
            }
        })
    }

    function update_form_data() {
        $("#add_user_btn").attr("data-action", "add")
        $("#add_user_btn").html("Submit")
    }

    function delete_user(id) {
        $.ajax({
            url: "model/user_controller.php",
            type: "post",
            data: {
                id: id,
                action: "delete_user"
            },
            beforeSend: function() {
                $("#user_delete_btn").html("Deleting...")
            },
            success: function(data) {
                if (data === "success") {
                    $("#user_delete_btn").html("Delete")
                    $("#userdelete_modal").modal("hide")
                    fetch_user_tbl()
                }
            }
        })
    }
    </script>
    <script>
   
    </script>
</body>

</html>
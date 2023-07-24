<?php
// session_start();
// include_once("db_connect.php");
// error_reporting(0);

// include_once('function.php');
// // include_once('department.php');

// if (!isset($_SESSION["fullname"])) {
//   header("location:login.php");
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Employee Management</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">


</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php
    error_reporting(0);
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class=" col-12">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 style="color: #3ab9dd;"><b>Employee Management </b></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"><a href="#" style='color:gray'>Home</a></li>
                <li class="breadcrumb-item "><a href="login.php?action=logout">Logout</a></li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              
              <!-- /.card -->
              <!-- add modal opening -->
              <div class="card">
                <div class="card-header">
                  <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-modal">
                    Add Employee
                  </button>
                  <!-- <button type="button" class="btn btn-default" onclick='clearAll(".$id.")'>
                  Clear All
                </button> -->
                  <div class="modal fade" id="add-modal" style="width:1400px;">
                    <div class="modal-dialog">
                      <div class="modal-content" style="width:650px;">
                        <div class="modal-header">
                          <h4 class="modal-title"> Add New Employee </h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class="card-body">
                              <div class="row">
                                <div class="form-group col-6">
                                  <label>Full Name</label>
                                  <input type="text" class="form-control" id="fullname" placeholder="Full Name">
                                  <input type="hidden" class="form-control" id="addId">
                                </div>
                                <div class="form-group col-6">
                                  <label>Email</label>
                                  <input type="email" class="form-control" id="email" placeholder="Email">
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-6">
                                  <label>Phone</label>
                                  <input type="text" class="form-control" id="phone" placeholder="Phone">
                                </div>
                                <div class="form-group col-6">
                                  <label>Level</label>
                                  <input type="text" class="form-control" id="level" placeholder="Level">
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-6">
                                  <label>D.O.B</label>
                                  <input type="date" class="form-control" id="dob" placeholder="D.O.B">
                                </div>
                                <div class="form-group col-6">

                                  <?php
                                  // $query = " SELECT * FROM department ";
                                  // // $query = " SELECT * FROM department ";
                                  // $response = mysqli_query($conn, $query);
                                  ?>
                                  <label>Department</label>
                                  <select class="form-control" id="department">
                                    <option value="">Select Department</option>
                                    <?php
                                    // while ($rows = mysqli_fetch_array($response)) {
                                    //   $department = $rows['departmentname'];
                                    //   $id = $rows['id'];
                                    ?>
                                      <!-- <option value="<= $id ?>"> <= $department ?> </option> -->

                                    <?php
                                    //}
                                    ?>
                                  </select>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-6">
                                  <label>Education.</label>
                                  <input type="text" class="form-control" id="education" placeholder="Education">
                                </div>
                                <div class="form-group col-6">
                                  <label>Address</label>
                                  <input type="text" class="form-control" id="address" placeholder="Address">
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-6">
                                  <label>Guarantor</label>
                                  <input type="text" class="form-control" id="guarantor" placeholder="Guarantor">
                                </div>
                                <div class="form-group col-6">
                                  <label>Next of Kin</label>
                                  <input type="text" class="form-control" id="nextofkin" placeholder="Next of Kin">
                                </div>
                              </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                              <button type="button" class="btn btn-primary add" onclick="addData()">Submit</button>
                              <button type="button" class="btn float-right btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </form>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <div class="modal fade" id="delete_emp_modal" style="width:1400px;">
                    <div class="modal-dialog">
                      <div class="modal-content" style="width:650px;">
                        <div class="modal-header">
                          <h4 class="modal-title"> Delete Employee </h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <p>Are you sure you want to permamnently delete this eployee data?</p>
                        </div>
                        <div class="modal-footer">
                              <button type="button" id="delete_employee_btn" class="btn btn-primary add" data-id="" onclick="delete_employee_data(this.dataset.id)">Submit</button>
                              <button type="button" class="btn float-right btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal edit -->
                </div>

                <div class="modal fade" id="modal-edit" style="width: 1400px;">
                  <div class="modal-dialog">
                    <div class="modal-content" style="width: 650px;">
                      <div class="modal-header">
                        <h4 class="modal-title">Update Employee Information</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" id="edit_employee_modal">
                      
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <!-- /.card-header -->
                <!-- //new code -->
                <div id="displayemployee"></div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
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
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- Page specific script -->
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
  <script src="./dist/js/index-functions.js"></script>
  <script>
    loademployee();
    function loademployee() {
      $.ajax({
        type: "POST",
        url: "display_employee.php",
        // url: "display/display_employee.php",
        success: function(data) {
          //  console.log(data)
           data = data.trim();
          $("#displayemployee").html(data);
        },

      });
    }

    function get_emp_id_for_edit(id) {
      $.ajax({
        type: "POST",
        url: "controller.php",
        data: {id:id,"action":"edit_employee_modal"},
        // url: "display/display_employee.php",
        success: function(data) {
          //  console.log(data)
           data = data.trim();
          $("#edit_employee_modal").html(data);
        }

      });
    }
  </script>
</body>
</html>


<!-- 
fullname NEED TO HAVE Address
$query = " SELECT s.fullname, s.email, s.phone, s.class, s.dateofbirth, f.department, s.matricnumber, s.admissionnumber, s.guarantor, s.guarantorphone 
FROM fullnames s, department f WHERE f.id = s.department"; -->
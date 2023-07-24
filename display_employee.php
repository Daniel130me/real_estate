<?php
// include_once("db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Management</title>
</head>
<body>
<?php
// session_start();
// error_reporting(0);

// if (!isset($_SESSION["fullname"])) {
//   header("location:login.php");
// }

?>

<div class="card-body">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Level</th>
        <th>Birth Date</th>
        <th>Department</th>
        <th>Highest Education</th>
        <th>Address</th>
        <th>Guarantor</th>
        <th>Next of Kin</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $server = "localhost:3305";
      $dbname = "employee_management";
      $username = "root";
      $password = "";

      // Create connection
      // $conn = mysqli_connect($server, $username, $password, $dbname);
      // //exit;
      // // Check connection
      // if (!$conn) {
      //   die("Connection failed: " . mysqli_connect_error());
      // }


      // $query = " SELECT e.fullname,e.email,e.phone,e.level,e.dob,e.education,e.address,e.guarantor,e.nextofkin,e.id,d.departmentname FROM employee e, department d  WHERE e.department=d.id and  e.loginsession = '" . $_SESSION['loginsession'] . "' ";
      //$response = mysqli_query($conn, $q); 
      // $response = mysqli_query($conn, $query);
        $query = mysqli_query($connect, "SELECT id, department FROM department");
      while ($rows = mysqli_fetch_array($query)) {
        $fullname = $rows['department'];
        // $fullname = $rows['fullname'];
        $email = ""; //$rows['email'];
        $phone = "";//$rows['phone'];
        $level = "";//$rows['level'];
        $dob = "";//$rows['dob'];
        $department ="";// $rows['departmentname'];
        $education = "";//$rows['education'];
        $address = "";//$rows['address'];
        $guarantor = "";//$rows['guarantor'];
        $nextofkin = "";//$rows['nextofkin'];
        $id = $rows['id'];
        echo "<tr>
                    <td>$fullname</td>
                    <td>$email</td>
                    <td>$phone</td>    
                    <td>$level </td>
                    <td>$dob</td>
                    <td>$department</td>
                    <td>$education</td>
                    <td>$address</td>
                    <td>$guarantor</td>
                    <td>$nextofkin</td>
                    <td>
                      <button id='editbtn' type='button' class='btn btn-primary' onclick='get_emp_id_for_edit(" . $id . ")' data-toggle='modal' data-target='#modal-edit'>Edit</button> |
                      <button type='button' class='btn btn-danger'  onclick='get_info_id_for_delete(" . $id . ")' data-toggle='modal' data-target='#delete_emp_modal'>Delete</button>
                    </td>
             </tr>";
      }

      ?>
    </tbody>
  </table>
</div>

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
  <script src="index-functions.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="dist/js/demo.js"></script> -->
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

</body>
</html>















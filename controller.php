<?php
// include_once("db_connect.php");
$action = $_POST['action'];

if($action === "edit_employee_modal") {
    $id = $_POST['id'];
    $get_emp_data = mysqli_query($connect, "SELECT id, department FROM department WHERE id='$id'");
    if($d_row = mysqli_fetch_array($get_emp_data)) {
    ?>
    <form>
    <div class="card-body">
      <div class="row">
        <div class="form-group col-6">
          <label>Fullname</label>
          <input type="text" class="form-control" id="editfullname" placeholder="Full Name">
          <input type="hidden" class="form-control" id="editId" placeholder="Full name">
        </div>
        <div class="form-group col-6">
          <label>Phone</label>
          <input type="text" class="form-control" id="editphone" placeholder="phone">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-6">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" class="form-control" id="editemail" placeholder="Email">
        </div>
        <div class="form-group col-6">
          <label>Level</label>
          <input type="text" class="form-control" id="editlevel" placeholder="Level">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-6">
          <label>D.O.B</label>
          <input type="date" class="form-control" id="editdob" placeholder="D.O.B">
        </div>
      <div class="form-group col-6">
          <?php
            $query = " SELECT * FROM department ";
            $response = mysqli_query($connect, $query);
            // $response = mysqli_query($conn, $query);
          ?>
            <label>Department</label>
            <select class="form-control" id="editdepartment">
              <?php
               while ($rows = mysqli_fetch_array($response)) {
                $department = $rows['department'];
                if($department === $d_row['department']){
              ?>
                <option selected value="<?= $id ?>"> <?= $department ?> </option>
                <?php
                } 
                else {
                    ?>
                    <option value="<?= $id ?>"> <?= $department ?> </option>
                    <?php
                }

              }
              ?>
            </select>
          </div>
      </div>
      <div class="row">
        <div class="form-group col-6">
          <label>Education</label>
          <input type="text" class="form-control" id="editeducation" placeholder="Education">
        </div>
        <div class="form-group col-6">
          <label>Address</label>
          <input type="text" class="form-control" id="editaddress" placeholder="Address">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-6">
          <label>Guarantor</label>
          <input type="text" class="form-control" id="editguarantor" placeholder="Guarantor">
        </div>
        <div class="form-group col-6">
          <label>Next of Kin</label>
          <input type="text" class="form-control" id="editnextofkin" placeholder="Next of Kin">
        </div>
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="button" class="btn btn-primary up-date" onclick="updateData()">Update</button>
      <button type="button" class="btn float-right btn-secondary" data-dismiss="modal">Close</button>
    </div>
  </form>
<?php
    }
}

?>
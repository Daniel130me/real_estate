function addData() {
  let fullname = $("#fullname").val();
  let phone = $("#phone").val();
  let email = $("#email").val();
  let level = $("#level").val();
  let dob = $("#dob").val();
  let department = $("#department").val();
  let education = $("#education").val();
  let address = $("#address").val();
  let guarantor = $("#guarantor").val();
  let nextofkin = $("#nextofkin").val();
  let data = { "fullname": fullname,"phone": phone,"email": email,"level": level,"dob": dob,"department": department,"education": education,
    "address": address,"guarantor": guarantor,"nextofkin": nextofkin,"action": "add" };
  $.ajax({
    url: "index-process.php",
    type: "post",
    data: data,
    success: function(res) {
      if (res == "success") {
        alert("Data successfully inserted");
        self.location = 'index.php';
      } else {
        alert(res);
      }
    },
    beforeSend: function(){
      $('.add').html('Adding');
    }
  });

}

function editData(id) {
  let data = {
    "id": id,
    "action": "edit"
  };

  $.ajax({
    url: "index-process.php",
    type: "post",
    data: data,
    async:false,
    success: function(res) {
       
      let data = res.split("||");
      let date = new Date(data[4]);
      let currentDate = date.toISOString().slice(0,10);

      alert(data[5]);
      $('#editfullname').val(data[0]);
      $('#editphone').val(data[1]);
      $('#editemail').val(data[2]);
      $('#editlevel').val(data[3]);
      $('#editdob').val(currentDate);
      // $('#editdepartment').val(data[5]);
    
      // $('#editdepartment').html(departmentdata);
      $('#editeducation').val(data[6]);
      $('#editaddress').val(data[7]);
      $('#editguarantor').val(data[8]);
      $('#editnextofkin').val(data[9]);
      $('#editId').val(id);

      //let data = JSON.parse(res);
    }
   
  });

}


function updateData() {
  let fullname = $("#editfullname").val();
  let phone = $('#editphone').val();
  let email = $('#editemail').val();
  let level = $('#editlevel').val();
  let dob = $('#editdob').val();
  let department = $('#editdepartment').val();
  let education = $('#editeducation').val();
  let address = $('#editaddress').val();
  let guarantor = $('#editguarantor').val();
  let nextofkin = $('#editnextofkin').val();
  let id = $('#editId').val();

  $.ajax({
    url: "index-process.php",
    type: "post",
    data: {
      "fullname": fullname,
      "phone": phone,
      "email": email,
      "level": level,
      "dob": dob,
      "department": department,
      "education": education,
      "address": address,
      "guarantor": guarantor,
      "nextofkin": nextofkin,
      "id": id,
      "action": "update"
    },
    success: function(res) {
      if (res == "success") {
        alert("Data updated successfully")
        self.location = "index.php"
      } else {
        alert(res)
      }
    },
    beforeSend:function(){
      $('.up-date').html('Updating');
    }
  })
}

function get_info_id_for_delete(id) {
  $("#delete_employee_btn").attr("data-id",id)
}
function delete_employee_data(id) {
  alert(id)
  return false
  $.ajax({
    url: "index-process.php",
    type: "post",
    data: {
      "id": id,
      "action": "delete"
    },
    success: function(res) {
      if (res == "success") {
        alert("One record deleted");
        self.location = 'index.php';
      } else {
        alert(res);
      }
    }
  });

}



// departmentdata = $.ajax({
//   url: 'department.php',
//   data: {
//     id: data[5]
//   },
//   type: 'POST',
//   async: false
// }).responseText;
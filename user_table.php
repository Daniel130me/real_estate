<?php
include_once('db_connect.php');
?>
<table id="example2" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
    $ppt_tbl_query = mysqli_query($connect, "SELECT id,lastname,firstname,email FROM user ORDER BY date_created");
    while($rows = mysqli_fetch_array($ppt_tbl_query)) {
        ?>
        <tr>
            <td class="firstname_class" id="firstname_userform"><?=$rows['firstname']?></td>
            <td class="lastname_class" id="lastname_userform"><?=$rows['lastname']?></td>
            <td class="email_class" id="email_userform"><?=$rows['email']?></td>
            <td>
                <button class="user_edit_btn btn btn-bl" data-id="<?=$rows['id']?>" onclick="update_user_form(this)" data-toggle="modal" data-target="#add_user_modal">Edit</button>
                <button class="ppt_delete_btn btn btn-da" data-id='<?=$rows['id']?>' onclick="get_id(this.dataset.id)" data-toggle="modal"
                    data-target="#userdelete_modal">Delete</button>
            </td>
        </tr>

        <?php
    }
    ?>
    </tbody>
</table>
       
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
function update_user_form(e) {
    $("#user_first_name").val(document.getElementById("firstname_userform").innerHTML)
    $("#user_last_name").val(document.getElementById("lastname_userform").innerHTML)
    $("#user_email").val(document.getElementById("email_userform").innerHTML)
    $("#add_user_btn").html("Update")
    $("#add_user_btn").attr("data-action","update")
    $("#add_user_btn").attr("data-id",e.dataset.id)
}
function get_id(id) {
    $("#user_delete_btn").attr("data-user_id",id)
}
// $(".user_edit_btn").click(function(e) {
//     $("#user_first_name").val($(this).parent("td").siblings(".firstname_class").html())
//     $("#user_last_name").val($(this).parent("td").siblings(".lastname_class").html())
//     $("#user_email").val($(this).parent("td").siblings(".email_class").html())
//     $("#add_user_btn").html("Update")
//     $("#add_user_btn").attr("data-action","update")
//     $("#add_user_btn").attr("data-id",$(this).attr("data-id"))
// })
</script>
$(document).ready(function() {
$(".form").submit(function(e) {
    var fname = $("#firstname").val()
    var lname = $("#lastname").val()
    var email = $("#email").val()
    var phone = $("#phone").val()
    var message = $("#message").val()
    $.ajax({
        url: "model/process_mail.php",
        type: "post",
        data: {fname:fname,lname:lname,email:email,phone:phone,message:message,"action":"sendmail"},
        beforeSend: function() {
            $("#submit_form").html("Sending...")
        },
        success: function(data){
            alert(data)
            $("#submit_form").html("Send Message")
        }
    })
    e.preventDefault()
})
})
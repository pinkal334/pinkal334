$(document).ready(function () {

    //


    //password toggle
    $("#checkbox").click(function () {
        let a = $("#password").attr("type");
        if (a == 'password') {
            $("#password").attr("type", "text");
        }
        else {
            $("#password").attr("type", "password");
        }
    });
        $("#submit").click(function () {
            let username = $("#username").val();
            let password = $("#password").val();
            if (inputemail.length != 0 && inputvalues.length != 0) {
            $.ajax({
                
                url: "../admin/login.php",
                type: "POST",
                data: {
                    submit: "submit",
                    username: username,
                    password: password,
                },
                
                success: function (data) {
                    if (data == 'success') {
                        // alert(data.server);
                        $("#alert").html("Login successfully");
                        
                    }
                    else {
                        $("#alert").html(data);
                    }
                },
                error: function (data) {
                    alert(data);

                }
            
            });
            }
        });
});
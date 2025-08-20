$(document).ready(function () {
    $('#loginform').submit(function (e) {
    //    e.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();

        $.ajax(
            {
                type: 'POST',
                url: 'backend/loginBack.php',
                data: {
                    email: email,
                    password: password
                      },
                success: function (response) {
                    if (response.trim() === "success") 
                    {
                        window.alert("Welcome " + email);
                        window.location.href = "/todo/todo.php";
                    }
                    else {
                        $('#result').text(response);
                    }

                },
                error: function () {
                    $('#result').text("invalid email or password");
                }
            });
    });
});


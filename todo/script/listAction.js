
$(document).ready(function () {

    
$.ajax({
    url: "./backend/todoList.php",
    method: "POST",
    data: { action: "fetch" },
    success: function (todoHtml) {
        $('#todo-table').html(todoHtml);
    },
    error: function () {
        console.log("Failed to fetch todos.");
    }
});


    $('#loginform').submit(function (e) 
    {
        e.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();

        $.ajax(
            {
                url: "./backend/todoList.php",
                method: 'POST',
                data: {
                    email: email,
                    password: password,
                    action: 'login',
                },
                success: function (response) {

                    if (response.trim() === "success") {
                        window.alert("Welcome " + email);
                        window.location.href = "/todo/todo.php";
                    }
                    else
                    {
                        console.log("Error occured");
                        
                    }
                },
                error: function () {
                    $('#result').text("invalid email or password");
                }
            });
           
    });


    $('#todo-form').submit(function (event) 
    {
        event.preventDefault();
        const formdata = $(this).serialize() + '&action=create';
        console.log("This is formdata",formdata);
        
        $('#todo-form')[0].reset();
        $.ajax(
            {
                type: "POST",
                url: "./backend/todoList.php",
                data: formdata,
                success: function (response) {

                    $('#todo-table').html(response);
                },
                error: function () {
                    
                    $('#create-result').text(response);
                }
            });
    });



    $('#todo-table').on('click', '.delete-btn', function () 
    {
        const index = $(this).data('index');
        $.ajax(
            {
                type: "POST",
                url: "./backend/todoList.php",
                data: { index: index, action: 'delete' },

                success: function (response) {
                    $('#' + index).remove();

                },
                error: function () {
                    $('#delete-result').text("Error deleting record");
                }
            })
    });


    $('#logout-form').submit(function () 
    {
        $.ajax({
            url: "./backend/todoList.php",
            method: "POST",
            data: { action: 'logout' },
            success: function () {
                window.location.href = "login.php";
            },
            error: function (response) {
                console.log(response);
                
                alert("Logout failed");
            }
        });

    });

});

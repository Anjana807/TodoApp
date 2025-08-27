<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
</head>
<body>
    
<form id="todo-form">
        Title:<input type="text" name="title" required><br><br>
        Description:<input type="text" name="description" required><br><br>
        Date:<input type="date" name="date" required><br><br>
        <input type="submit" name="submit" value="submit">
</form>
    <h3>Your Todo List</h3>
    <div>
        
        <table border="1" cellpadding="5">
            <tr><th>Title</th><th>Description</th><th>Date</th><th>Delete</th></tr>
            <tbody id="todo-table">
            
            </tbody>
            
        </table>
        
    </div>
    <p id="create-result"></p>
    <p id="delete-result"></p>
    <br>
    <div><form id="logout-form">
        <input type="submit" name="submit" value="Log out">
    </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./script/listAction.js" defer></script>
</body>
</html>
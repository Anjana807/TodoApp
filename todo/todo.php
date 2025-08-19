<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo</title>
</head>
<body>
    
<form onsubmit="addList(event)">
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
                <tr id=<?php 'echo $rowid;'?>> </tr>
                <button hidden type='button' name='delete' onclick=deleteItem($key)>Delete</button>
            <tbody>

        </table>
        
    </div>
    <p id="delete-result"></p>
    <br>
    <div><form action="./backend/logout.php"><input type="submit" name="submit" value="log Out"></form></div>
    <script src="./script/listAction.js"></script>
</body>
</html>
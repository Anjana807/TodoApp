<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
</head>
<body>
    <form method="POST" id="loginform">
        Email:<input type="text" name="email" id= "email" required>
        <br>
        <br>
        Password:<input type="password" name="password" id="password" required>
        <br>
        <br>
        <input type="submit" name="submit" value="submit" id="submt">
    </form>
    <div id="result"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./script/login.js" defer></script>
</body>
</html>


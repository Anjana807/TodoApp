<?php
session_start();
$email="anjana@gmail.com";
$password="anjana";

if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];

    if(($em==$email) && ($pass=$password))
    {
        $_SESSION['email']=$email;
        $_SESSION['password']=$password;

        header("location:todo.php");
    }
    else
    {
        echo "invalid email or password";
    }
}
?>
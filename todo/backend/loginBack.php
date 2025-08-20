<?php

session_start();
$email="anjana@gmail.com";
$password="anjana";

if(isset($_POST['email']) && isset($_POST['password']))
{
    $em=$_POST['email'];
    $pass=$_POST['password'];

    if(($email===$em) && ($password===$pass))
    {
        $_SESSION['email']=$em;
        $_SESSION['password']=$pass;

        echo "success";
    }
    else
    {
        echo "invalid email or password";
    }
}

?>
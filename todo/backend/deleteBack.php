<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['index']))
{
    $index = $_POST['index'];
    if (isset($_SESSION['todo'][$index]))
    {
        unset($_SESSION['todo'][$index]);
        echo "Deleted";
    }
    else
    {
        echo "item not found";
    } 
}
?>

<?php


$host='localhost';
$username='root';
$pass='';
$db='sampletodo';

$conn = new mysqli($host,$username,$pass,$db);
if(!$conn)
{
    die("connection failed,".mysqli_connect_error());
}

return $conn;

?>


<?php
$host='localhost';
$username='root';
$pass='';
$db='tododb';


$conn = mysqli_connect($host,$username,$pass,$db);
if(!$conn)
{
    die("Conection failed ".mysqli_connect_error());
}

mysqli_query($conn,"create database if not exists tododb");
mysqli_select_db($conn,$db);


mysqli_query($conn,"create table if not exists users(id int auto_increment primary key, email varchar(200) unique not null, password varchar(200) not null)");
mysqli_query($conn,"create table if not exists todo(id auto_increment primary key, user_id int not null,title varchar(200) not null, description text not null,date date not null, foreign key(user_id) references users(id)");

?>

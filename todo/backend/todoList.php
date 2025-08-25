<?php

session_start();

class Actions
{

 public function login($email,$password)
 {
    
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
 }
 public function create()
 {

if($_SERVER["REQUEST_METHOD"]=="POST")
{
   
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    if(!isset($_SESSION['todo']))
    {
        $_SESSION['todo']=[];

    }
        $_SESSION['todo'][]=[
        'title'=>$title,
        'description'=>$description,
        'date'=>$date
        ];

   foreach($_SESSION['todo'] as $key=>$item)
   {
    echo "<tr id='$key'>";
    echo "<td>".$item['title']."</td>";
    echo "<td>".$item['description']."</td>";
    echo "<td>".$item['date']."</td>";
    echo "<td>";
    echo "<button type='button' class='delete-btn' name='delete' data-index='$key'>Delete</button>";
    echo "</tr>";
   }
}
}

public function delete()
{
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['index']))
{
    $index = $_POST['index'];
    if (isset($_SESSION['todo'][$index]))
    {
        unset($_SESSION['todo'][$index]);
        echo "Success";
    }
    else
    {
        echo "item not found";
    } 
}
}

public function logout()
{
    session_destroy();
    header("location:/todo/login.php");
    exit;
}

}

$actions = new Actions();
if(isset($_POST['action']))
{
    if($_POST['action'] === 'create')
    {
        $actions->create();
    }
    elseif($_POST['action'] ==='delete')
    {
        $actions->delete();
    }
    elseif($_POST['action'] === 'login') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $actions->login($email, $password);
}


}


?>


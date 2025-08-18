<?php
session_start();

 if(isset($_POST['delete']) && isset($_POST['index']))
    {
        unset($_SESSION['todo']['index']);
    }

if($_SERVER["REQUEST_METHOD"]=="POST")
{
   
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    if(!isset($_SESSION['todo']))
    {
        $_SESSION['todo']=[];
        $_SESSION['todo'][]=[
        'title'=>$title,
        'description'=>$description,
        'date'=>$date
        ];

    }
    

   foreach($_SESSION['todo'] as $key=>$item)
   {
    echo "<tr>";
    echo "<td>".$item['title']."</td>";
    echo "<td>".$item['description']."</td>";
    echo "<td>".$item['date']."</td>";
    echo "<td>";
    echo "<form>";
    echo "<button type='button' name='delete' onclick=deleteItem($key)>Delete</button>";
    echo "</form>";
    echo "</tr>";
    
   }
}
?>

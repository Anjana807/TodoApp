<?php
session_start();
$conn=include 'db.php';

class Actions
{

public static function login($conn)
{
    $em = $_POST['email'];
    $pass = $_POST['password'];
    
    $stmt = $conn->prepare("select id,email, password from users where email=?");
    $stmt->bind_param("s",$em);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows>0)
    {
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $password = $row['password'];
        $userid = $row['id'];

        if($pass === $password && $em === $email)
        {
            $_SESSION['id'] = $userid;
            
            return "success";
        }
        else
        {
            return "invalid email or password";
        }
    }
}


public static function create($conn)
{
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $userid = $_SESSION['id'];

    $stmt = $conn->prepare("insert into todo(userid, title, description, date) values (?, ?, ?, ?)");
   
    $stmt->bind_param("isss", $userid, $title, $description, $date);

    if($stmt->execute())
    {
       $html= self :: fetchTodo($conn);
       return $html;
        
    }
    else
    {
        return "Error Occured";
    }
}


public static function delete($conn)
{
    $index = $_POST['index'];
    $userid = $_SESSION['id'];

    $stmt = $conn->prepare("delete from todo where todoid=? and userid=?");
    $stmt->bind_param("ii",$index,$userid);
    $stmt->execute();
}

public static function logout()
{
    session_destroy();
}

public static function fetchTodo($conn)
{
    $userid = $_SESSION['id'];
    $result = $conn->prepare("select todoid,title,description,date from todo where userid=?");
    $result->bind_param("i",$userid);
    $result->execute();
    $res = $result->get_result();
    $html="";

    while($row = $res->fetch_assoc())
    {
        $html.= "<tr id='{$row['todoid']}'>";
        $html.= "<td>{$row['title']}</td>";
        $html.="<td>{$row['description']}</td>";
        $html.= "<td>{$row['date']}</td>";
        $html.="<td><button class='delete-btn' data-index='{$row['todoid']}'>Delete</button></td>";
        $html.= "</tr>";          
    }
    return $html;
}

}

if(isset( $_POST['action']))
{
    if($_POST['action']=="login")
    {
        $login = Actions :: login($conn);
        echo $login;
    }
    if($_POST['action']=="create")
    {
        $create = Actions :: create($conn);
        echo $create;
    }
    if($_POST['action']=="delete")
    {
        Actions :: delete($conn);
    }
    if($_POST['action']=="logout")
    {
        Actions :: logout();
    }
    if($_POST['action']=="fetch")
    {
        $fetch = Actions :: fetchTodo($conn);
        echo $fetch;
    }

}

?>

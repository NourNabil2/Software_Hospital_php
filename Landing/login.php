<?php
session_start();

if (isset($_POST['email']) && isset($_POST['password']))
{
    $conn = new mysqli("localhost","root","","soft");
    $user=$conn->query("select id,user_type,department,name,password from user where email ='{$_POST['email']}'")->fetch_row();
    $conn->close();
     if (!$user){
        header("location:index.php");;
}

if ($user[4]!=$_POST['password'])
{

    header("location:index.php");;
}
$_SESSION["user"]=array($user[0],$user[1],$user[2],$user[3]);
header("location:index.php");
}
?>
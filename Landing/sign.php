<?php
$conn = new mysqli("localhost","root","","soft");

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST["phone"]) && isset($_POST["national"]) && isset($_POST["birth_date"]))
{
    $user=$conn->query("insert into user (email, password,name,phone,national_number,birth_date) values('{$_POST["email"]}','{$_POST["password"]}','{$_POST["name"]}','{$_POST["national"]}','{$_POST["phone"]}','{$_POST["birth_date"]}')");
    $conn->close();
    header("location:index.php");
}


?>
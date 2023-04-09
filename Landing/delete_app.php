<?php
session_start();
if(!isset($_GET["id"]) || !isset($_SESSION["user"])){
    return header("location:table.php");
}
$id = $_GET["id"];
$conn = new mysqli("localhost","root","","soft");
$conn->query("DELETE FROM appointment WHERE id=$id AND doctor_id={$_SESSION['user'][0]}");
$conn->close();
header("location:table.php");
?>
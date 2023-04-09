<?php
session_start();

if($_POST && isset($_POST["date"]) && isset($_POST["doctor"])){
    $user = $_SESSION["user"];
    $conn = new mysqli("localhost","root","","soft");
    $old_app = $conn->query("SELECT date FROM `appointment` WHERE ABS(TIMESTAMPDIFF(MINUTE,date,'{$_POST['date']}'))<30 AND doctor_id={$_POST['doctor']};")->fetch_all();
    
    if(count($old_app)>0){
        return header("location:index.php?appointment=false#appointment");
    }
    $conn->query("INSERT INTO appointment(date,doctor_id,message,patient_id) VALUES('{$_POST['date']}',{$_POST['doctor']},'{$_POST['message']}','{$user[0]}')");
    $conn->close();
    header("location:index.php?appointment=true#appointment");

}
?>
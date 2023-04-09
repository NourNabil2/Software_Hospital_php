<?php
$conn = new mysqli("localhost","root","","soft");
    $dep = $_GET["department"];
    $docs = $conn->query("SELECT id,name FROM user WHERE user_type='Doctor' AND department='$dep'")->fetch_all();
    // echo print_r($docs);
    $conn->close();
    echo json_encode($docs)

?>
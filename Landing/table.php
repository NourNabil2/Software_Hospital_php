<?php
session_start();
$user= $_SESSION["user"];
if(isset($user) && $user[1]!="Doctor"){
    return header("location:index.php");
}
$conn = new mysqli("localhost","root","","soft");
$apps = $conn->query("SELECT ap.*,d.name AS doctor_name,p.* FROM appointment ap JOIN user p ON ap.patient_id=p.id
JOIN user d ON d.id=ap.doctor_id  WHERE doctor_id='{$user[0]}'")->fetch_all();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="table.css"  />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika+Negative:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./header.css" />
    <title>Departments</title>
</head>
<body>
<div class="hero">
        <nav>
            <img src="../Landing/img/logo.png" alt="Italian Trulli" width="60">
            <h2 class="logo"><a href="./index.php">HealVibe</a></h2>
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./index.php#about">About</a></li>
                <li><a href="./index.php#services">Services</a></li>
                <li><a href="./departments.php">Department</a></li>
                <li><a href="./index.php#contact">Contact</a></li>
                <li><a href="./index.php#appointment">make an appointment</a></li>
            </ul>
            
        </nav>
    </div>


    <br />
    <br />
    <br />
    <br />
    <br />

    <table class="list" id="storeList">


        <tr>

            <th>#</th>

            <th>Number phone</th>

            <th>patiente Name</th>
            <th>Age</th>
            <th>date</th>
            <th>Message</th>
            <th>method</th>
        </tr>

        <?php
        foreach ($apps as $key=>$app) {
            ?>
                <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><?php echo $app[10] ?></td>
                    <td><?php echo $app[7] ?></td>
                    <td><?php echo $app[12] ?></td>
                    <td><?php echo $app[1] ?></td>
                    <td><?php echo $app[2] ?></td>
                    <td>
                    <form action="delete_app.php?id=<?php echo $app[0]?>" method="post">
                        <!-- <button onClick="onDelete(this)">Delete</button> -->
                        <button>Delete</button>
                    </form>    
                    </td>
                </tr>
            <?php
        }
        ?>
    </table>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>
<?php
$dep=$_GET["dep"]; 
if(!isset($dep)){
  return header("loaction:index.php");
}

$conn = new mysqli("localhost","root","","soft");
$docs = $conn->query("SELECT * FROM user WHERE department='$dep' AND user_type='Doctor'")->fetch_all();
$conn->close();

?>
<!DOCTYPE html>
<html >
  <head>
    <title>Surgery</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dep_docs.css"/>
     <link rel="stylesheet" href="./header.css"/>
  </head>

  <body>
    <header>
    <div class="hero">
        <nav>
            <img src="../Landing/img/logo.png" alt="Italian Trulli" width="60">
            <h2 class="logo"><a href="./index.php">HealVibe</a></h2>
            <ul>
            <li><a class="nav-link scrollto active" href="./index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="./index.php#about">About</a></li>
          <li><a class="nav-link scrollto" href="./index.php">Services</a></li>
                <li><a class="nav-link scrollto" href="./index.php#appointment">Make an Appointment</a></li>
            </ul>
            
        </nav>
    </div>  
    
    
    <h2><?php echo $dep ?> Section</h2>
      <p>
        The BEST CONSULTANTS IN <?php echo $dep ?>
          TREATMENT IN EGYPT
      </p>
    </header>
    <section>
      <div class="paragraph">
        <p>
           Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga eveniet quo consequuntur quia voluptatum! Voluptatum, cum aliquid reprehenderit, necessitatibus nam quod animi, fugiat quisquam labore et exercitationem nostrum perferendis doloremque.
      </div>
      <div class="container">
        <div class="heading">
          <h2>Doctors in <?php echo $dep ?> Center</h2>
        </div>
        <div class="row">
            <?php
            foreach($docs as $doc){
                ?>
                <div class="card">
                <a href="profile_page.php?id=<?php echo $doc[0] ?>" class="btn">
                    <div class="card-header"></div>
                    <div class="card-body">
                    <h2><?php echo $doc[1] ?></h2>
                    </div>
                </a>
                </div>


<?php
            }

?>
      </div>
      </div>
    </section>
  </body>
</html>
<?php
session_start();

$conn = new mysqli("localhost","root","","soft");
$docs = $conn->query("SELECT id,name FROM user WHERE user_type='Doctor'");
$user = $_SESSION["user"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HealVibe Hospital</title>
  

  <!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Signika+Negative:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <!-- ======= Top Bar ======= -->

  
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">HealVibeHospital@gmail.com</a>
            <i class="bi bi-phone"></i> 
            +20 112 6598 234
        </div>
      <div class="d-none d-lg-flex social-links align-items-center">
      </div>
    </div>
  </div>
  
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <img src="img\logo.png" alt="Italian Trulli" width="60">
      <h1 class="logo me-auto"><a href="./index.php">HealVibe</a></h1>
    
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#home">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="departments.php">Departments</a>
        </li>   
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <?php
          if(isset($user) && $user[1]=='Patient'){
            ?>
              <li><a class="nav-link scrollto" href="#appointment">Make an Appointment</a></li>
            <?php
          }
          ?>
         <?php
          if(isset($user) && $user[1]=='Doctor'){
            ?>
              <li><a class="nav-link" href="table.php">My Appointments</a></li>
            <?php
          }
          ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <?php
      if($user){
        ?>
          <a href="logout.php" class="appointment-btn scrollto">Logout</a>
        <?php
      }
      ?>

    </div>
  </header><!-- End Header -->

  <!-- ======= Home Section ======= -->
  <section id="home" class="d-flex align-items-center">
      <div class="container">
          <h1>Welcome <?php if($user){?><strong style="text-decoration:underline;"><?php echo $user[3]?></strong><?php }?> to HealVibe<br> Healthcare</h1>
          <h2>We are team of Specialized Doctors.<br>"Your devotion and care bring healing, comfort and hope."</h2>
          <?php
          if(!$user){
            ?> 
            <div>
                <input type="checkbox" id="show">
                <label for="show" class="btn-get-started scrollto">login</label>
                <div class="cont">
                    <label for="show" class="close-btn fas fa-times" title="close"></label>
                    <div class="text">
                        Login Form
                    </div>
                    <form method="POST" action="login.php">
                        <div class="data">
                            <label>Email</label>
                            <input name="email" type="text" required>
                        </div>
                        
                        <div class="data">
                            <label>Password</label>
                            <input name="password" type="password" required>
                        </div>
                        <div class="forgot-pass">
                            <a href="#">Forgot Password?</a>
                        </div>
                        <div class="btn">
                            <div class="inner"></div>
                            <button name="login" type="submit">login</button>
                        </div>
                        <div class="signup-link">
                            Not a member? <a href="#">Sign up now</a>
                        </div>
                    </form>
                </div>
            </div>
            <div>
                <input type="checkbox" id="show2">
                <label for="show2" class="btn-get-started scrollto">sign up</label>
                <div class="cont">
                    <label for="show2" class="close-btn fas fa-times" title="close"></label>
                    <div class="text">
                        Sign in Form
                    </div>
                    <form  method="POST" action="sign.php">
                    <div class="data">
                            <label>Name</label>
                            <input name="name" type="text" required>
                        </div>    
                    <div class="data">
                            <label>Email</label>
                            <input name="email" type="email" required>
                        </div>
                        <div class="data">
                            <label>national number</label>
                            <input name="national" type="text" required>
                        </div>
                        <div class="data">
                            <label>Birth date</label>
                            <input name="birth_date" type="date" required>
                        </div>
                        <div class="data">
                            <label>phone</label>
                            <input name="phone" type="text" required>
                        </div>
                        <div class="data">
                            <label>Password</label>
                            <input name="password" type="password" required>
                        </div>
  
                        <div class="btn">
                            <div class="inner"></div>
                            <button name="sign" type="submit">sign in</button>
                        </div>
  
                    </form>
                </div>
            </div>
            <?php
          }
          ?>
      </div>
  </section><!-- End Home -->
<br><br><br><br><br><br><br><br>
  <main id="main">
    
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="fas fa-heartbeat"></i></div>
              <h4 class="title"><a href=""> Normal checkup</a></h4>
              <p class="description">HealVibe OnDemand makes it easier than ever for you to get the answers you need to manage your health.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class="fas fa-dna"></i></div>
              <h4 class="title"><a href="">Blood Test</a></h4>
              <p class="description">Cancer survival rates are often tied to a person's access to care. Innovations like our liquid biopsy blood test make personalized cancer care a reality for more people.</p>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="fas fa-virus"></i></div>
              <h4 class="title"><a href="">COVID-19</a></h4>
              <p class="description">Learn if you've been exposed to the virus or if you've built up antibodies from a vaccine or previous infection.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="fas fa-hand-holding-medical"></i></div>
              <h4 class="title"><a href="">Medicines</a></h4>
              <p class="description">From diagnostics to drug development, we'll never stop working to move health forward—every day for everyone.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>About Us</h2>
          <p>HealVibe is constantly working towards giving you the experience you want and expect from the leading hospital in Egypt. Enhancing our operations consistently by keeping our facilities in the best condition, providing the latest in medical equipment as well as the most experienced doctors and highest caliber consultants.</p>
        </div>

    <div class="row">
    <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center
    align-items-stretch position-relative">
    <a href="" class="glightbox play-btn mb-4"></a>
          </div>

    <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch
    justify-content-center py-5 px-lg-5">
            
            <div class="icon-box">
              <div class="icon"><i class="bx bx-heart"></i></div>
              <h4 class="title"><a href="">HEALTH IS WEALTH</a></h4>
              <p class="description">Every day, we're helping healthcare providers treat millions of patients as individuals. From specialty diagnostics to the cutting-edge science behind COVID-19, oncology, chronic diseases and more—we’ll never stop delivering better, smarter resources.</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-health"></i></div>
              <h4 class="title"><a href="">EMERGENCY</a></h4>
              <p class="description">Every day, we're helping healthcare providers treat millions of patients as individuals. From specialty diagnostics to the cutting-edge science behind COVID-19, oncology, chronic diseases and more—we’ll never stop delivering better, smarter resources.At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-help-circle"></i></div>
              <h4 class="title"><a href="">SERVICES </a></h4>
              <p class="description">With more cost-effective services stretching beyond diagnostics, our tools and solutions scale with your business to meet your analytical, clinical and operational needs.</p>
            </div>
            
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts">
    <div class="container" data-aos="fade-up">

      <div class="row no-gutters">

        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <i class="fas fa-user-md"></i>
            <span data-purecounter-start="0" data-purecounter-end="75" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Doctors</strong></p>
            <a href="#">Find out more &raquo;</a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <i class="far fa-hospital"></i>
            <span data-purecounter-start="0" data-purecounter-end="30" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Departments</strong></p>
            <a href="#">Find out more &raquo;</a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <i class="fas fa-flask"></i>
            <span data-purecounter-start="0" data-purecounter-end="22" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Research Lab</strong></p>
            <a href="#">Find out more &raquo;</a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <i class="fas fa-procedures"></i>
            <span data-purecounter-start="0" data-purecounter-end="1750" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Surgery</strong></p>
            <a href="#">Find out more &raquo;</a>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->

      <!-- ======= Services Section ======= -->
      <section id="services" class="services">
        <div class="container">
  
          <div class="section-title">
            <h2>Services</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>
  
          <div class="row">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="icon-box">
                <div class="icon"><i class="fas fa-heartbeat"></i></div>
                <h4><a href="">Regular Checkup</a></h4>
                <p>We provide you with all types of exams with the latest medical equipment to ensure the doctor's help in diagnosing and assessing the condition</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
              <div class="icon-box">
                <div class="icon"><i class="fas fa-pills"></i></div>
                <h4><a href="">Pharmacy</a></h4>
                <p>HealVibe Hospital provides its patients and staff with a huge and fully equipped pharmacy to serve all their medical needs, and the pharmacy is also distinguished by providing all imported and local medicines.</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
              <div class="icon-box">
                <div class="icon"><i class="fas fa-hospital-user"></i></div>
                <h4><a href="">Outpatient Center</a></h4>
                <p>Our Outpatient centre is composed of well-trained professional staff and eminent consultants.</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
              <div class="icon-box">
                <div class="icon"><i class="fas fa-dna"></i></div>
                <h4><a href="">Home Visits Service</a></h4>
                <p>A medical team equipped with all specialities to diagnose and take care of you while you are at the comfort of your home, which lessens the chances of transmitting the infection to your family and community.</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
              <div class="icon-box">
                <div class="icon"><i class="fas fa-ambulance"></i></div>
                <h4><a href="">Emergency</a></h4>
                <p>The emergency unit operates 24 hours a day and is staffed  by highly qualified doctors  and nurses and backed up by a team of specialists and senior consultants in all specialties.
                  The unit is equipped to handle all types of multi-trauma, surgical, neurological, and cardiac and gastro-enterology emergency.</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
              <div class="icon-box">
                <div class="icon"><i class="fas fa-notes-medical"></i></div>
                <h4><a href="">Admission & In-patient Services</a></h4>
                <p>Our patient-experienced team members are meant to help our patients and their families with their appropriate arrangements, All efforts are made to make sure that our patient’s journey in the hospital is easy and beneficial to them.</p>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Services Section -->

    <!-- ======= Appointment Section ======= -->
    <?php
      if($user){
        ?>

          <section id="appointment" class="appointment section-bg">
            <div class="container">

              <div class="section-title">
                <h2>Make an Appointment</h2>

                <?php
                  if(isset($_GET["appointment"]) && $_GET["appointment"]=="false"){
                    ?>
                      <p style="background-color: red; text-align:center;color:white;padding:4px">Couldn't save appointment because doctor have appointment during this time!</p>
                    <?php
                  }elseif(isset($_GET["appointment"]) && $_GET["appointment"]=="true"){
                    ?>
                      <p style="background-color: green; text-align:center;color:white;padding:4px">Appointment Created Successfully</p>
                    <?php
                  }
                  
                ?>
                
              <form method="POST" action="appointment.php" role="form" class="php-email-form">
                
                <div class="row">
                  <div class="col-md-4 form-group mt-3">
                    <input required type="datetime-local" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" >
                  </div>
                  <div class="col-md-4 form-group mt-3">
                    <select required name="doctor" id="doctor" class="form-select">
                      <option value="">Select Doctor</option>
                      <?php
                        if($docs){
                          foreach($docs as $doc){
                            ?>
                            <option value="<?php echo $doc["id"] ?>"><?php echo $doc["name"] ?></option>
                            <?php
                          }
                        }
                      ?>
                    </select>  
                  </div>
                  <div class="col-md-4 form-group mt-3">
                    <select name="department" id="department" class="form-select">
                      <option value="">Select Department</option>
                      <option value="Cardiology">Cardiology</option>
                      <option value="Dental">Dental</option>
                      <option value="Neurology">Neurology</option>
                      <option value="Surgery">Surgery</option>
                      <option value="Pediatrics">Pediatrics</option>
                      <option value="Chest Diseases">Chest Diseases</option>
                      <option value="Ophthalmology">Ophthalmology</option>
                      <option value="Obstetrics And Gynecology">Obstetrics And Gynecology</option>
                    </select>  
                  </div>
                </div>

                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
                  
                </div>
                <div class="text-center"><button type="submit">Make an Appointment</button></div>
              </form>

            </div>
          </section><!-- End Appointment Section -->
        <?php
      }
    ?>

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
          
          <!--Google map-->
          
         <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2587.3429644164858!2d31.24311845231746!3d30.045793817508446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2seg!4v1668839936142!5m2!1sen!2seg"></iframe><a href="">FNF Mods</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:363px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:363px;}.gmap_iframe {height:363px!important;}</style></div>
         \
        </section><!- End Contact Section -->
    
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>HealVibe</h3>
              <p>
                Mohammed Naguib<br>
                Cairo, Egypt<br><br>
                <strong>Phone:</strong>+20 112 6598 234<br>
                <strong>Email:</strong>HealVibeHospital@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../Department/departments.html">Departments</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Appointments & Access</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Financial Assistance</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Pay Your Bill Online</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>HealVibe</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="vendor/jquery.js"></script>
  <script src="vendor/purecounter/purecounter.js"></script>
  <script src="vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="js/main.js"></script>
  <script>
    var x;
    document.getElementById("department").addEventListener("change",e=>{
      let val = e.currentTarget.value
      if(val){
        showDoctors(val)
      }
    })
    function showDoctors(dep){
      $.ajax({
        method:"GET",
        url:`get_doctor.php?department=${dep}`,
        success:(data)=>{
          let docs = document.getElementById("doctor")
          let i, len = docs.options.length - 1;
          for(let i=len;i>=1;i--){
           docs.remove(i)
          }
          data = $.parseJSON(data)
          data.forEach(doc=>{
            docs.innerHTML+=`<option value="${doc[0]}">${doc[1]}</option>`
          })
        }
      })
    }
  </script>
</body>

</html>
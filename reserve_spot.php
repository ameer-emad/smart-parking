<?php
require_once "reserve.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartPark </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <!-- Google Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@200;300;400;500;700&family=Reem+Kufi+Fun:wght@700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.min.css">
    <!-- css template -->
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/header.css">



  <style>
   .custom-shadow {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 6px 20px rgba(0, 0, 0, 0.1);
   }
  </style>
 </head> 
 <body class="bg-light  min-vh-100">
     <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
          <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="images/parking_logo3.png" alt="Logo" width="50" height="50" class="d-inline-block me-2" />
            NEXTGEN PARKING
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center gap-3">
              <li class="nav-item">
                <a class="nav-link" href="homepage.html">Home</a>
              </li>
    
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="featuresDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Features
                </a>
                <ul class="dropdown-menu features-dropdown" aria-labelledby="featuresDropdown">
                  <li>
                   <a class="dropdown-item" href="find_parking.html">
                      <i class="fas fa-map-marker-alt"></i> Find Parking
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="reserve_spot.php">
                      <i class="fas fa-calendar-check"></i> Reserve Spot
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="payment.html">
                      <i class="fas fa-wallet"></i> Easy Payment
                    </a>
                  </li>
                </ul>
              </li>
    
              <li class="nav-item">
                <a class="nav-link" href="choose_us.html">Why Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ab-us/ab.html">About US</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="choose_us.html">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="questions.html">FAQ </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="sign/Sign-up&Sign-in/sign.php">Sign In </a>
              </li>
              <!-- User Icon -->
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="profile2.php" title="User Profile" aria-label="User Profile">
                  <i class="fas fa-user-circle user-icon"></i>
                </a>
              </li>
    
              <!-- <li class="nav-item">
                <a class="nav-link btn btn-primary text-white ms-3 px-4" href="#book">Book Now</a>
              </li> -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- end nav -->

      <!-- start reserve spot -->
<form action="" method="post">
    <section class="d-flex justify-content-center align-items-center my-5 py-5">
    <div class="card p-4 rounded-4 custom-shadow" style="max-width: 400px; width: 100%;">
      <h2 class="text-center mb-4 fw-bold">Book Your Spot</h2>
      <div class="text-center mb-4">
        <div class="bg-info bg-opacity-25 rounded-circle d-flex justify-content-center align-items-center mx-auto" style="width: 100px; height: 100px;">
          <i class="fas fa-map-marker-alt fa-2x text-info"></i>
        </div>
      </div>
      <form>
        <div class="mb-3">
          <div class="input-group" style="height: 38px;">
            <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
         <select name="location" required style="border: 1px solid #dee2e6; width:308px; border-radius: 0px 6px 6px 0px;">
           <option value="" disabled selected>Choose Parking</option>
           <option value=" Mall Of Egypt">Mall Of Egypt </option>
           <option value=" Mall Of Arabia">Mall Of Arabia</option>
           <option value=" Cairo Festival">Cairo Festival</option>
           <option value="City Stars ">City Stars </option>
        </select>
            
          </div>
        </div>
        <div class="mb-3">
          <div class="input-group">
            <span class="input-group-text bg-white"><i class="fas fa-calendar-alt"></i></span>
            <input type="date" class="form-control" name="date">
          </div>
        </div>
        <div class="mb-3">
          <div class="input-group">
            <span class="input-group-text bg-white"><i class="fas fa-clock"></i></span>
            <input type="time" class="form-control" name="time">
          </div>
        </div>
        <div class="mb-4">
          <div class="input-group">
            <span class="input-group-text bg-white"><i class="fas fa-car"></i></span>
            <input type="text" class="form-control" placeholder="License Plate" name="License">
          </div>
        </div>
        <a href="payment.html"><input type="submit" class="btn btn-primary w-100" value="Reserve Now" name="reverse"></input></a>
      </form>
    </div>
  </section>
</form>
  <!-- end  reserve spot-->
  


   <!-- Footer -->
<footer class="bg-dark text-white py-4 footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4 mb-md-0 d-flex align-items-center">
                <img src="images/parking_logo6.png" alt="Company Logo" width="70" height="70" class="mb-3 mr-3">
                <p class="small">Empowering cities to manage parking and provide the best parking experience for drivers, merchants and solution providers.</p>
            </div>
            <div class="col-md-2 mb-4 mb-md-0">
                <h6>Quick Links</h6>
                <ul class="list-unstyled">
                    <li><a href="homepage.html" class="text-white-50">Home</a></li>
                    <li><a href="payment.html" class="text-white-50"> Pricing</a></li>
                    <li><a href="choose_us.html" class="text-white-50">Why Us</a></li>
                </ul>
            </div>
            <div class="col-md-2 mb-4 mb-md-0">
                <h6>Support</h6>
                <ul class="list-unstyled">
                    <li><a href="questions.html" class="text-white-50">Help Center</a></li>
                    <li><a href="homepage.html#map" class="text-white-50">Map</a></li>
                    <li><a href="#" class="text-white-50">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h6>Connect With Us</h6>
                <div class="d-flex gap-3">
                    <a href="#" class="text-white"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <hr class="my-4">
        <div class="text-center">
            <p class="small mb-0">&copy; 2025 SmartPark. All rights reserved.</p>
        </div>
    </div>
</footer>

  <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
  
 </body>
</html>

   
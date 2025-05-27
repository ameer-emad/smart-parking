<?php
session_start();
$conn = new mysqli("localhost", "root", "", "parking");

if (!isset($_SESSION['user_id'])) {
    exit("Not logged in.");
}

$user_id = $_SESSION['user_id'];
// echo "Session user_id: " . ($_SESSION['user_id'] ?? 'Not Set');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $stmt = $conn->prepare("UPDATE sign SET fname=?, lname=?, email=?, phone=? WHERE id=?");
    $stmt->bind_param("ssssi", $fname, $lname, $email, $phone, $user_id);
    $stmt->execute();

    header("Location: profile2.php");
    exit();
}

$result = $conn->query("SELECT fname, lname, email, phone FROM sign WHERE id = $user_id");
$user = $result->fetch_assoc();
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartPark - Intelligent Parking Solutions</title>
    <!-- Bootstrap CSS -->
    <!-- <link href="bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet"> -->
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
    <link rel="stylesheet" href="css/profile.css">
    
 </head> 
 <body >
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
      <!-- Profile Header -->
  <div class="profile-header position-relative ">
    <div class="profile-img-wrapper mx-auto ">
      <img src="images/hero.jpg" alt="Profile Picture" class="profile-img" />
      <span class="online-badge my-3"></span>
    </div>
  </div>

  <!-- Main Content -->
  <div class="container">
    <!-- Profile Info -->
    <div class="text-center profile-info mb-5">
    <h2><?php echo $user['fname'] . ' ' . $user['lname'] ; ?></h2>

    
      <p class="text-primary mb-3">Gold Member</p>
      <div class="d-flex justify-content-center gap-4 flex-wrap icon-text mb-3">
        <div><i class="fas fa-car-side"></i> BHD 1234</div>
        <div><i class="fas fa-map-marker-alt"></i>Seef Mall</div>
      </div>
      <!-- < class="d-flex justify-content-center gap-3 flex-wrap"> -->


      <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a class=" btn btn-primary text-white btn-lg px-4 gap-3" href="profile.php">
                <i class="fas fa-edit"></i> Edit Profile</a>
        
        <!-- </button> -->
       <a href="reserve_spot.php" style="text-decoration: none;"> <button class="btn btn-outline-primary d-flex align-items-center gap-2">
          <i class="fas fa-car"></i> Book Spot
        </button></a>
      </div>
      </div>
    </div>

    <div class="row g-4">
      <!-- Stats Cards -->
      <div class="col-12 mb-4">
        <div class="row g-3 text-center">
          <div class="col-md-4">
            <div class="card stat-card p-4">
              <h3 class="text-primary">47</h3>
              <p>Total Bookings</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card stat-card p-4">
              <h3 class="text-success">350</h3>
              <p>Points Earned</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card stat-card p-4">
              <h3 class="text-warning">4.8 <i class="fas fa-star small"></i></h3>
              <p>Rating</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Left Column -->
      <div class="col-lg-4">
        <!-- Vehicle Information -->
        <div class="card mb-4 p-4">
          <h5 class="card-title mb-4 fw-semibold">Vehicle Information</h5>
          <ul class="list-unstyled mb-0">
            <li class="d-flex align-items-center mb-3">
              <i class="fas fa-car-side text-primary me-3 fs-5"></i>
              <span>Toyota Camry</span>
            </li>
            <li class="d-flex align-items-center mb-3">
              <i class="fas fa-palette text-primary me-3 fs-5"></i>
              <span>White</span>
            </li>
            <li class="d-flex align-items-center mb-3">
              <i class="fas fa-calendar-alt text-primary me-3 fs-5"></i>
              <span>2022</span>
            </li>
            <li class="d-flex align-items-center">
              <i class="fas fa-id-card text-primary me-3 fs-5"></i>
              <span>BHD 1234</span>
            </li>
          </ul>
        </div>

        <!-- Membership Details -->
        <div class="card p-4">
          <h5 class="card-title mb-4 fw-semibold">Membership Details</h5>
          <div class="d-flex justify-content-between mb-3">
            <span class="text-muted">Membership Type</span>
            <span class="badge bg-warning text-dark">Gold</span>
          </div>
          <div class="d-flex justify-content-between mb-3">
            <span class="text-muted">Join Date</span>
            <span>Jan 15, 2023</span>
          </div>
          <div class="d-flex justify-content-between">
            <span class="text-muted">Status</span>
            <span class="text-success fw-semibold">Active</span>
          </div>
        </div>
      </div>

      <!-- Right Column -->
      <div class="col-lg-8">
        <!-- Recent Parking History -->
        <div class="card mb-4 p-4">
          <h5 class="card-title mb-4 fw-semibold">Recent Parking History</h5>

          <div class="parking-history-item" tabindex="0" role="region" aria-label="Parking ">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <h6 class="mb-1 fw-semibold">Seef Mall</h6>
                <p class="text-muted mb-1">Spot B12 - Second Floor</p>
                <div class="small text-muted">Duration: 2 hours • Cost: $ 2</div>
              </div>
              <span class="text-muted small">Today - 10:30 AM</span>
            </div>
          </div>

          <div class="parking-history-item" tabindex="0" role="region" aria-label="Parking record ">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <h6 class="mb-1 fw-semibold">City Centre </h6>
                <p class="text-muted mb-1">Spot A45 - Ground Floor</p>
                <div class="small text-muted">Duration: 3 hours • Cost: $ 3</div>
              </div>
              <span class="text-muted small">Yesterday - 4:15 PM</span>
            </div>
          </div>

          <div class="parking-history-item" tabindex="0" role="region" aria-label="Parking at City Stars Mall">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <h6 class="mb-1 fw-semibold">City Stars Mall</h6>
                <p class="text-muted mb-1">Spot C23 - Third Floor</p>
                <div class="small text-muted">Duration: 1.5 hours • Cost: $ 1.5</div>
              </div>
              <span class="text-muted small">Jun 2 - 2:00 PM</span>
            </div>
          </div>

          <div class="text-center mt-4">
            <button
              class="btn btn-link text-dark fw-bold d-flex align-items-center justify-content-center gap-2"
              id="viewAllRecordsBtn"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#allRecords"
              aria-expanded="false"
              aria-controls="allRecords">
              View All Records <i class="fas fa-arrow-right"></i>
            </button>
          </div>
          
          <div id="allRecords" class="mt-3 collapse">
            
            <div class="parking-history-item" tabindex="0" role="region" aria-label="Parking 1">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h6 class="mb-1 fw-semibold">Arkan Plaza</h6>
                  <p class="text-muted mb-1">Spot D10 - Ground Floor</p>
                  <div class="small text-muted">Duration: 2.5 hours • Cost: $ 5</div>
                </div>
                <span class="text-muted small">May 28 - 11:00 AM</span>
              </div>
            </div>
            <div class="parking-history-item" tabindex="0" role="region" aria-label="Parking 2">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h6 class="mb-1 fw-semibold">Moda Mall</h6>
                  <p class="text-muted mb-1">Spot F15 - First Floor</p>
                  <div class="small text-muted">Duration: 1 hour • Cost: $ 2</div>
                </div>
                <span class="text-muted small">May 20 - 3:30 PM</span>
              </div>
            </div>
          </div>

        <!-- Favorite Locations -->
        <div class="card p-4">
          <h5 class="card-title mb-4 fw-semibold">Favorite Locations</h5>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="favorite-location" tabindex="0" role="button" aria-pressed="false" aria-label="Favorite location ">
                <i class="fas fa-heart"></i>
                <div>
                  <h6 class="mb-1">Seef Mall</h6>
                  <small class="text-muted">
                    Arkan Plaza- B Section</small>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="favorite-location" tabindex="0" role="button" aria-pressed="false" aria-label="Favorite location">
                <i class="fas fa-heart"></i>
                <div>
                  <h6 class="mb-1">City Centre</h6>
                  <small class="text-muted">Manama - A Section</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
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
  <script src="js/profile.js"></script>
  <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
 </body>
</html>

   

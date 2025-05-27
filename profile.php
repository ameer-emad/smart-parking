<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'parking';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: sign.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE sign SET fname='$fname',fname='$fname',email='$email', phone='$phone' WHERE id=$user_id";
    if ($conn->query($sql)) {
        header("Location: profile.php");
        exit();
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

$sql = "SELECT fname,lname, email, phone FROM sign WHERE id = $user_id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartPark</title>
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
<body class="bg-light min-vh-100">
    <!-- Navigation (Same as before) -->
    
    <!-- Profile Section -->
    <div class="py-4 w-100 d-flex justify-content-center align-items-center">
        <div class="bg-white p-4 rounded-lg custom-shadow" style="max-width: 600px;">
            <h1 class="h4 font-weight-bold mb-4">My Profile</h1>
            <div class="border rounded-lg p-3 mb-4 d-flex align-items-center justify-content-between custom-shadow rounded">
                <div class="d-flex align-items-center">
                    <img alt="picture" class="rounded-circle mx-3" src="images/hero.jpg" style="width: 70px; height: 70px;"/>
                    <div>
                        <h3><?php echo $user['fname'] . ' ' . $user['lname'] ; ?></h3>
                        <p class="text-muted mb-0">Business manager</p>
                    </div>
                </div>
                <button class="btn btn-sm">
                    <i class="fas fa-edit mr-1"></i>Edit
                </button>
            </div>

            <div class="border rounded-lg p-3 custom-shadow rounded">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="h5 font-weight-bold mb-0">Personal information</h2>
                    <button class="btn btn-sm">
                        <i class="fas fa-edit mr-1"></i>Edit
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <p class="text-muted mb-1">First Name</p>
                        <h2 class="h5 font-weight-bold mb-0"><?php echo $user['fname']; ?></h2>
                    </div>
                    <div class="col-md-6 mb-3">
                        <p class="text-muted mb-1">Last Name</p>
                        <h2 class="h5 font-weight-bold mb-0"><?php echo $user['lname']; ?></h2>
                    </div>
                    <div class="col-md-6 mb-3">
                        <p class="text-muted mb-1">Email Address</p>
                        <h2 class="h5 font-weight-bold mb-0"><?php echo $user['email']; ?></h2>
                    </div>
                    <div class="col-md-6 mb-3">
                        <p class="text-muted mb-1">Phone</p>
                        <h2 class="h5 font-weight-bold mb-0"><?php echo $user['phone']; ?></h2>
                    </div>
                    <div class="col-12">
                        <p class="text-muted mb-1">Bio</p>
                        <h4 class="font-weight-bold mb-0">Business manager</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer (Same as previous) -->

    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

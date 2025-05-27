<?php
    require_once "validation.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awsem -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--css-style-->
    <link rel="stylesheet" href="msg.css">
    <title>Get In Touch</title>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/logo.jpg" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                NEXTGEN PARKING</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            </div>
            <div class="links">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Why Us</a>
                    </li>
                </ul>
            </div>
        
        </div>
    </nav>
        <!--End  Navbar -->

</head>
<body>
    <!-- حاوية الصفحة -->
    <div class="contact-container">
        <!-- قسم النموذج -->
        <div class="form-box">
            <h2>GET IN TOUCH</h2>
            <br>
            <form method="post">
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Name" name="Name" required>
                    <span style="color:red"><?php echo $Errname?></span>

                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="Email" >
                    <span style="color:red"><?php echo $Erremail?></span>

                </div>
                <div class="mb-3">
                    <textarea class="form-control" rows="4" placeholder="Your Message" name="Message" ></textarea>
                     <span style="color:red"><?php echo $Errmessage?></span>

                </div>
                <input type="submit" name="submit" value="send message" class="btn-submit">
            </form>
        </div>
        
        <!-- قسم معلومات التواصل -->
        <div class="contact-info">
            <h6>CONTACT WITH AUTHOR</h6>
            <h2>HAVE QUESTIONS? <br> READY TO HELP!</h2>
            <br>
            <div class="info-item">
                <i class="fa-solid fa-phone fa-2xl" style="color: #180446;"></i>
                <p>Feel free to get in touch <br> <strong>123 456 789 101</strong></p>
            </div>
            <br>
            <div class="info-item">
                <i class="fa-solid fa-envelope fa-2xl" style="color: #2c98f7;"></i>
                <p>How can we help you? <br> <strong>Help@gmail.com</strong></p>
            </div>
            <br>
            <div class="info-item">
                <i class="fa-solid fa-location-dot fa-2xl" style="color: #180446;"></i>
                <p>Want to get our NFC? <br> <strong>Mall of Egypt</strong></p>
            </div>
        </div>
    </div>































    <!--script code-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!--script code-->


</body>
</html>
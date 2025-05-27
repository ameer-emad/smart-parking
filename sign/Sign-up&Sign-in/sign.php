<?php
require_once "login.php";
require_once "signup.php";
// require_once "change_password_process.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/des.css">
    <title>Sign-in & Sign-up</title>

</head>
<body>

    <!--START OF CONTAINER-->
    <div class="container" id="container">
        <!-- sign-up code START-->
        <div class="form-container sign-up">
            <form method="POST">
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="icon"><i class="fa-regular fa-envelope"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin"></i></a>
                </div>
                <span>or use your email for registeration</span>
                <input type="text" placeholder="First Name" name="fname" required>
                <span style="color:red"><?php echo $Errfname?></span>  
                
                <input type="text" placeholder="Last Name" name="lname" required>
                <span style="color:red"><?php echo $Errlname?></span>

                <input type="email" placeholder="Email" name="email">
                <span style="color:red"><?php echo $Erremail?></sapn>

                <input type="password" placeholder="Password" name="password">
                <span style="color:red"><?php echo $Errpassword?></span>

                <input type="password" placeholder="confirm Password" name="confirm">
                <span style="color:red"><?php echo $Errconfirm?></span>

                <input type="password" placeholder="Phone Number " name="phone">
                <span style="color:red"><?php echo $Errconfirm?></span>
                <!-- <input type="submit" name="SignUp" value="Sign Up" class="b"> -->
                <button name="SignUp" value="Sign Up">Sign In</button>
                     </form>
        </div>
        <!-- sign-up code END-->
        <!-- sign-in code START2-->
        <div class="form-container sign-in">
            <form method="post">
                <h1>Sign In</h1>    
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="icon"><i class="fa-regular fa-envelope"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin"></i></a>
                </div>
                <span>or use your email password</span>
                <input type="email" placeholder="Email" name="email">
                <span style="color:red"><?php echo $Email_err?></span>

                <input type="password" placeholder="Password" name="password">
                <span style="color:red"><?php echo $Password_err?></span>

                <a href="Fg-pass.html">Forget Your Password?</a>
                <!-- <input type="submit" name="login" value="SIGN IN" class="b"> -->

                <button name="login" value="SIGN IN">Sign In</button>
            </form>
        </div>
        <!-- sign-in code END2-->
        <!-- TOGGLE-LEFT START-->
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign Up</button>
                </div>
                <!-- TOGGLE-LEFT END-->
                <!--TOGGLE-RIGHT START-->
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Dear!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register" name="signin">Sign Up</button>
                </div>
                <!-- TOGGLE-RIGHT END-->
            </div>
        </div>
    </div>

    <!--END OF CONTAINER-->


    <script src="script.js"></script>
</body>
</html>

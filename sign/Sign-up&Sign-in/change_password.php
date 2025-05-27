<?php
// include 'change_password_process.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- css style -->
    <link rel="stylesheet" href="css/N-PASS.CSS">
    <title>SET-N-PASS</title>
</head>
<body>


<?php
    if (isset($_GET['code'])) {
        $code = htmlspecialchars($_GET['code']);
    } else {
        die("No code provided in the URL.");
    }
    ?>


<!--CODE-OF-SET-N-PASS-->
<div class="password-container text-center">
    <h2>Set New Password</h2>
    <p class="text-muted">Must be at least 8 characters</p>
    
    <!-- Form Start -->
    <form method="POST" action="<?php echo 'change_password_process.php?code=' . htmlspecialchars($code); ?>">
    <div class="mb-3 position-relative">
        <label for="email" class="d-flex text-muted">E-mail</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email" required>
    </div>

    <div class="mb-3 position-relative">
        <label for="new_password" class="d-flex text-muted">Change Password</label>
        <div class="input-group">
            <input type="password" name="new_password" id="newPassword" class="form-control" placeholder="Change Password" required>
            <span class="input-group-text" onclick="togglePassword('newPassword')">
                <i class="fas fa-eye"></i>
            </span>
        </div>
    </div>
    <input type="submit" class="btn btn-primary" value="Change" name="change">
</form>
    <!-- Form End -->
    
    <a href="sign.php" class="d-block mt-3 text-muted">← Back to login</a>

    <!--dots-->
    <div class="page-indicators">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot active"></span>
    </div>
    <!--dots-->
</div>

<!--SCRIPT-CODE-->
<script src="N-PASS.js"></script>               
<script src="js/bootstrap.bundle.min.js"></script>
<script>
    function togglePassword(id) {
        const passwordInput = document.getElementById(id);
        const icon = passwordInput.nextElementSibling.querySelector('i');

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>

<!--SCRIPT-CODE-->
</body>
</html>

<?php
if (isset($_GET['code'])) {
    $code = htmlspecialchars($_GET['code']);  // Get the code from the URL

    $conn = new mysqli('localhost', 'root', '', 'parking');

    if ($conn->connect_error) {
        die("Could not connect to the database: " . $conn->connect_error);
    }

    // Check if the code exists and is still valid (within 1 day)
    $stmt = $conn->prepare("SELECT * FROM sign WHERE code = ? AND update_time >= NOW() - INTERVAL 1 DAY");
    $stmt->bind_param("s", $code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        if (isset($_POST['change'])) {
            $email = htmlspecialchars($_POST['email']);
            $new_password = htmlspecialchars($_POST['new_password']);

            if (empty($email) || empty($new_password)) {
                echo "Please fill in all the fields.";
                exit();
            }

            // Update password in the database without hashing
            $updateStmt = $conn->prepare("UPDATE sign SET password = ? WHERE email = ? AND code = ? AND update_time >= NOW() - INTERVAL 1 DAY");
            $updateStmt->bind_param("sss", $new_password, $email, $code);

            if ($updateStmt->execute()) {
                echo "Password updated successfully!";
                header("Location: success.html");
                exit();
            } else {
                echo "Failed to update the password. Error: " . $conn->error;
            }
            $updateStmt->close();
        }
    } else {
        echo "Invalid or expired code.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Code not provided in the URL.";
}
?>

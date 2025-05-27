<?php
    $servername  = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'parking';

    //connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['confirm'])) {
        $card_num = $_POST["card_num"];
        $card_name = $_POST["card_name"];

        // Generate code      

       $code = rand(342124, 342144);

        // insert payment data
        $stmt = $conn->prepare("INSERT INTO booking (card_num, card_name, code) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $card_num, $card_name, $code); 
        if ($stmt->execute()) {
            echo "<h2>✅ Payment Done Successfully<h2>";
            echo "<p>Your Code: <strong style='font-size:24px;'>$code</strong></p>";
        } else {
            echo "<script>alert('There was an error while inserting the data.');</script>";
        }

        // close connection
        $stmt->close();
        $conn->close();
    }
?>

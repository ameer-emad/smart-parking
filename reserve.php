<?php

 $servername  = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'parking';

   $conn = new mysqli($servername , $username, $password, $dbname);
   if ($conn->connect_error) 
 {
        die("Connection failed: " . $conn->connect_error);
}



    if(isset($_POST['reverse'])){

         $location = $_POST["location"];
         $date = $_POST["date"];
         $time = $_POST["time"];
         $License = $_POST["License"];


          $query= mysqli_query($conn,"Insert into booking(location,date , time , License ) Values ('$location','$date','$time','$License')");
        if($query){
            echo "<script>alert('data is inserted successfully');</script>";
        }
        else{
            echo "<script>alert('there is an error');</script>";

        }
            header("Location: http://localhost/Graduation/payment.html");

    }



?>

<?php
// require_once "config.php";
     $servername  = 'localhost';
     $username = 'root';
     $password = '';
     $dbname = 'park';

    $conn = new mysqli($servername , $username, $password, $dbname);
    if ($conn->connect_error) 
  {
         die("Connection failed: " . $conn->connect_error);
  }



  function test_input ($data)
  {
      $data = trim($data);//remvo whitespace 
      $data = stripslashes ($data);// 
      $data = htmlspecialchars ($data);//converts spciel characters into html entites
      return $data;
  }

  //الاسم
  $pattern = "/^[a-zA-Z ,.'-]+$/";
  //رقم الهاتف
  $pattern3 = "/^[0-9]{11}$/";
  //الرقم القومى
  $pattern4 = "/^[0-9]{14}$/";

  $Name = $Email = $Message = "";
  $Errname = $Erremail = $Errmessage ="";



  if(isset($_POST['submit']))
  {


      // (,.-)التحقق من ان الاسم يحتوي فقط على أحرف و العلامات 
      if (preg_match($pattern, $_POST["Name"]))
      {
          //الحصول علي الاسم من الفورم وتنظيفه من اى زيادات
          $Name = test_input($_POST["Name"]);
      }else
      {
          $Errname =  "مسموح فقط بالأحرف والمسافات البيضاء *";
      }

    
          if(filter_var($_POST["Email"],FILTER_VALIDATE_EMAIL))
          {
              //الحصول علي البريد الالكترونى من الفورم وتنظيفة من اى زيادات
              $Email = test_input($_POST["Email"]);
          }else
          {
              $Erremail = "تنسيق البريد الإلكتروني غير صالح *";
          }


          if (empty($_POST['Message'])) {
            $Errmessage= 'Please enter a description';
        } 
      
  
    
      $Name=$_POST['Name'];
      $Email=$_POST['Email'];
      $Message=$_POST['Message'];
     

      $query= mysqli_query($conn,"Insert into contact(Name , Email , Message  ) Values ('$Name','$Email','$Message')");
      if($query){
          echo "<script>alert('data is inserted successfully');</script>";
      }
      else{
          echo "<script>alert('there is an error');</script>";

      }
      
}
?>

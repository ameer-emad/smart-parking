<?php
    session_start(); 

   //صفحة الاتصال بقاعدة البيانات
    $servername  = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'parking';

   $conn = new mysqli($servername , $username, $password, $dbname);
   if ($conn->connect_error) 
 {
        die("Connection failed: " . $conn->connect_error);
}
    //لتنظيف البيانات
    function test_input ($data)
    {
        $data = trim($data);//remvo whitespace 
        $data = stripslashes ($data);//remove slashes 
        $data = htmlspecialchars ($data);//converts spciel characters into html entites
        return $data; 
    }

    //الاسم
    $pattern = "/^[a-zA-Z ,.'-]+$/";
    //رقم الهاتف
    $pattern3 = "/^[0-9]{11}$/";
    //الرقم القومى
    $pattern4 = "/^[0-9]{14}$/";

    $Email = $Password  = "";
    $Email_err = $Password_err = "";

    // POST فحص إذا كانت الطلبات من نوع 
    // if($_SERVER["REQUEST_METHOD"] == "POST")
    if(isset($_POST['login']))
    {

        $sql="SELECT * FROM sign WHERE email='". $_POST["email"] ."';";
        $result = $conn->query($sql);

        if (($result->num_rows > 0) )
        {


            if(filter_var($_POST["email"],FILTER_VALIDATE_EMAIL))
            {

                //الحصول علي البريد الالكترونى من الفورم وتنظيفة من اى زيادات
                $Email = test_input($_POST["email"]);
            }else
            {
                $Email_err = "*invalid email format";
            }
        }else
        {
            $Email_err = "This Email is not Exist";
            echo "<script>alert('This Email is not Exist');</script>";
        }
        $Password=$_POST["password"];
        if ($row = $result->fetch_assoc()) 
        {
            if($Password!=$row["password"])
            {
                $Password_err="Wrong Password";
                echo "<script>alert('Password is Wrong ');</script>";
            }
            else {
                $_SESSION['user_id'] = $row['id']; // هذا السطر مهم جدًا
            }
        }
        
        if ($Email_err == "" && $Password_err == "") {
            // تم التحقق بنجاح
            $_SESSION['email'] = $Email;
            $_SESSION['password'] = $Password;
            header("Location: http://localhost/Graduation/homepage.html");

            exit(); // مهم جدًا
        }
        
    }
?>
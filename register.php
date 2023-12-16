<?php

$nameErr = $emailErr = $ageErr = $numberErr = $passErr = $conpassErr = "";

 if($_POST && isset($_POST['submit'])){
         
          $host = "localhost";
          $user = "root";
          $pass = "";
          $db = "facebooke";

         $conn = new mysqli($host , $user, $pass , $db);

       if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['conpass']) && isset($_POST['age']) && isset($_POST['number'])){
          $name = $_POST['name'];
          $email = $_POST['email'];
          $pass = $_POST['pass'];
          $conpass = $_POST['conpass'];
          $age = $_POST['age'];
          $number = $_POST['number'];
          
          if(empty($name)){
              $nameErr = "Name is required";
          }
          else {
              $nameErr = "";
          }
          if(empty($email)){
              $emailErr = "Email is required";
          }
          else if(!filter_var($email)){
              $emailErr = "Only letters and white spaces allowed";
          }
          else {
              $emailErr = "";
          }
          if(empty($age)){
              $ageErr = "Age is requred";
          }
          else {
              $ageErr ="";
          }
          if(empty($pass)){
              $passErr = "password is requred";
          }
          else if(strlen(($pass)) !== strlen($conpass)){
              $passErr = "Password does not match";
          }
          else {
              $passErr ="";
          }
          if(empty($conpass)){
              $conpassErr = "required";
          }
          else {
              $conpassErr = "";
          }
          if(empty($number)){
              $numberErr = "Contact is required";
          }
          else {
              $numberErr = "";
          }
       } // verification ends..
       
       if(empty($nameErr) && empty($emailErr) && empty($ageErr) && empty($passErr) && empty($numberErr)){
           $sql = "INSERT INTO user VALUES (null, '$name','$email','$age','$pass','$number')"; 
           $query = $conn->query($sql);
           header("location:login.php?msg");
        //    if($query){
        //        header("location:login.php?msg");
        //    } 
        //    else {
        //      echo "Sorry an error occured";
        //    }
        } 
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create account</title>
    <link rel="stylesheet" href="registration.css">
</head>
<body>
    <form class="register" action="register.php" method="post">
            <h2>User Registration</h2>

            <div class="controls">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?php if(isset($_POST['submit'])){
                     echo $name;
                } ?>">
                <p class="error"><?= $nameErr ?></p>
            </div>
            <div class="controls">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php if(isset($_POST['submit'])){
                     echo $email;
                } ?>">
                <p class="error"><?= $emailErr ?></p>
            </div>
            <div class="controls">
                <label for="password">Password</label>
                <input type="password" name="pass" id="pass" value="<?php if(isset($_POST['submit'])){
                     echo $pass;
                } ?>">
                <p class="error"><?= $passErr ?></p>
            </div>
            <div class="controls">
                <label for="conpassword">Corfirm Password</label>
                <input type="password" name="conpass" id="conpass" value="<?php if(isset($_POST['submit'])){
                     echo $conpass;
                } ?>">
                <p class="error"><?= $conpassErr ?></p>
            </div>
            <div class="controls">
                <label for="age">Age</label>
                <input type="number" name="age" id="age" value="<?php if(isset($_POST['submit'])){
                     echo $age;
                } ?>">
                <p class="error"><?= $ageErr?></p>
            </div>
            <div class="controls">
                <label for="number">Contact</label>
                <input type="text" name="number" id="number"value="<?php if(isset($_POST['submit'])){
                     echo $number;
                } ?>">
                <p class="error"><?= $numberErr ?></p>
            </div>


            <div class="controls">
                <input type="submit" name="submit" id="submit" value="submit">
            </div>
    </form>
</body>
</html>
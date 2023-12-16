<?php 
 session_start();
  $emailErr = $passErr = "";
  if($_POST && isset($_POST['login'])){
     
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "facebooke";

        $conn = new mysqli($host , $user, $pass , $db);
        
        if(isset($_POST['email']) && isset($_POST['password'])){
            
            $email = $_POST['email'];
            $password = $_POST['password'];
            // echo $email;
            // echo $password;
        }

        if(empty($email)){
            $emailErr = "Required field";
        }
        else {
            $emailErr =  "";
        }
        if(empty($password)){
            $passErr = "Required field";
        }
        else {
            $passErr = "";
        }

    $select = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $query = $conn->query($select);

    if(mysqli_num_rows($query) === 1){
         $row = mysqli_fetch_assoc($query);
         if($row['email'] === $email && $row['password'] === $password){
             echo "Logged In!";
             $_SESSION['name'] = $row['name'];
             $_SESSION['id'] = $row['id'];
             header("location:home.php");
             exit();
         }
        //  else {
        //     header("location:login.php");
        //  }
    }
    // else {
    //     echo "Account not found";
    //     header("location:login.php");
    //     exit();
    // }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="logPage">
        <form action="login.php" method="POST" class="form">
            <small class="login"><?php if(isset($_GET['msg'])) {
                echo "Account created succesfully";
            } ?></small>
            <div class="input-control">
                <label for="email">user email</label>
                <input type="email" name="email" id="email" value="<?php if(isset($_POST['login'])){
                    echo $email;
                } ?>"/>
                <small class="error"><?= $emailErr ?></small>
            </div>
            <div class="input-control">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="<?php if(isset($_POST['login'])){
                    echo $password;
                } ?>" />
                <small class="error"><?= $passErr ?></small>
            </div>
            <div class="input-control">
                <input type="submit" name="login" id="submit" value="submit"/>
            </div>

            <div class="create">
                <span>Don't have an account? <a href="register.php">Create one</a></span>
            </div>
            <br>
        </form>
    </div>
</body>
</html>
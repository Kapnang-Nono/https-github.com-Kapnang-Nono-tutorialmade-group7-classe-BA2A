<?php 
  session_start();

  if(isset($_SESSION['id']) && isset($_SESSION['name'])) {
     ?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
</head>
<body>
    <h1>Welcome <?php echo  $_SESSION['name'];?></h1>
    <a href="logout.php">Logout</a>
    <br>
    <h3>All user name in our database</h3>
    <br>
      <table class="users" border="1">
         <thead>
            <tr>
               <th>User Names</th>
            </tr>
         </thead>

         <tbody>
         <?php 
            $host = "localhost";
            $user = "root";
            $pass = "";
            $db = "facebooke";
  
           $conn = new mysqli($host , $user, $pass , $db);
           $sql = "SELECT * FROM user";
           $stmt = $conn->query($sql);

           if($stmt->num_rows > 0){
               while($row = $stmt->fetch_assoc()){       
    ?>
             <tr>
                <td><?= $row['name'] ?></td>
             </tr>
             <?php }
           }
          ?> 
         </tbody>
      </table>

             <br>
           <a href="innerjoin.php"> <button class="btn">inner join</button></a>
           <a href="crossjoin.php"> <button class="btn">cross join</button></a>
           <a href="leftjoin.php"> <button class="btn">left join</button></a>
           <a href="rightjoin.php"> <button class="btn">right join</button></a>
           <a href="fulljoin.php"> <button class="btn">full join</button></a>
           
</body>
</html>
<?php 
  } else {
     header('location:login.php');
     exit();
  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inner Join</title>
</head>
<body>
   <table border="1">
   <h1>CROSS JOIN</h1>
   <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Content</th>
            
        </thead>
        <tbody>
        <?php
   
            $host = "localhost";
            $user = "root";
            $pass = "";
            $db = "facebooke";

            $conn = new mysqli($host , $user, $pass , $db);

            $sql = "SELECT * FROM user INNER JOIN comments";
            $stmt = $conn->query($sql);

            if($stmt->num_rows > 0){
                while($row = $stmt->fetch_assoc()){
       ?>
         <tr> <td><?= $row['name'] ?></td>
         <td><?= $row['age'] ?></td>
          <td><?= $row['email'] ?></td>
          <td><?= $row['contact'] ?></td>
          <td><?= $row['content'] ?></td>

         </tr>
    
        </tbody>
       <?php }
            }
         ?>   
   </table>
   
    
</body>
</html>
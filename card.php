<?php 
session_start();
if(!$_SESSION['user']){
  header('location:login.php');
  exit();  
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    <meta charset="UTF-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center><h1>MY CARD</h1></center>
<div class ="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Acction</th>
        </tr>
      </thead>
      <tbody>
        <?php
            include('config.php');
            $result = mysqli_query($conn , "SELECT * FROM addcard");
            while($row = mysqli_fetch_array($result)){
                echo "
                <tr>
                <td>$row[name]</td>
                <td>$row[price]</td>
                <td><a href = 'del_card.php' class = 'btn btn-danger'>Delete</a></td>
              </tr>
                ";
            }        
        
        ?>
      
        
      </tbody>
    </table>
    <a href="shop.php" class = "btn btn-primary">Product</a>

</div>
</body>
</html>
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
    <title>All Product is here !</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
     <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="card.php">My Card</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
       
      </ul>
    </div>
  </div>
</nav>
   <br>
    <div class ="container">
    <?php
        include('config.php');
        $result = mysqli_query($conn , "SELECT * FROM prod");
        while($row = mysqli_fetch_array($result)){
            echo "<center>
            <main>
            <div class='card' style='width: 18rem;'>
            <img src='$row[image]' class='card-img-top' alt='...'>
            <div class='card-body'>
              <h5 class='card-title'>$row[name]</h5>
              <p class = 'card-text'>$row[price] </p>
              <a href = 'val.php?id=$row[id]'name ='ms' class = 'btn btn-success'>Add to Card</a>
            </div>
          </div>
            </main>
            
            </center>";
        }       
       
       ?>
    </div>
</body>
</html>
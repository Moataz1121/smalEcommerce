<?php 
session_start();
if(!$_SESSION['user']){
  header('login.php');
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
    <title>Online Shop</title>
</head>
<body>
    <div class="container">
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
          <a class="nav-link" href="product.php">Show All Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
       
      </ul>
    </div>
  </div>
</nav>
<br>
    <form class="px-md-2" method="post" action="insert.php" enctype="multipart/form-data">
    <div class="form-outline mb-4">
    <input type="text" id="form3Example1q1" name="name" class="form-control" />
    <label class="form-label" for="form3Example1q1">Name</label>
    </div>
    <div class="form-outline mb-4">
    <input type="text" id="form3Example1q2" name="price" class="form-control" />
    <label class="form-label" for="form3Example1q2">Price</label>
    </div>
    <div class="form-outline mb-4">
    <input type="file" id="form3Example1q3" name="image" class="form-control" />
    <label class="form-label" for="form3Example1q3">Image</label>
    </div>
    <center>
        <button type="submit" name="upload" class="btn btn-success btn-lg mb-1">Submit</button>
    
    </center> 
   </form>
    </div>
   
</body>
</html>
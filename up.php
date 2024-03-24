<?php
include('config.php');

if(isset($_POST['update'])){
    $ID = $_POST['id'];
    $NAME = $_POST['name'];
    $PRISE = $_POST['price'];
    $IMAGE = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $image_up = "image/". $image_name;
    //for insert in data base 
    $insert = "UPDATE prod SET name ='$NAME' , price ='$PRISE' , image ='$image_up' WHERE id =$ID";
    mysqli_query($conn, $insert) or die(mysqli_error($conn));
    if(move_uploaded_file($image_location , 'image/' . $image_name)){
        echo "<script> alert('Upolad Is Done') </script>";        
    }else{
        echo "<script>alert('Error in Upolad')</script>";
    }
    //for redirct for this page (index)
    header('location:home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
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
          <a class="nav-link" href="product.php">Show All Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
       
      </ul>
    </div>
  </div>
</nav>
</body>
</html>
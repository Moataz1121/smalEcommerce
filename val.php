<?php 
include('config.php');
$ID = $_GET['id'];
$up = mysqli_query($conn , "SELECT * FROM prod WHERE id =$ID");
$data = mysqli_fetch_array($up);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    <meta charset="UTF-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sure OF Buy</title>
</head>
<style>
    input {
        display: none;
    }
    .main{
        width: 30%;
        padding: 20px;
        box-shadow: 1px 1px 10px silver;
    }
</style>
<body>
    <br>
    <center>
   <div class = "main">
         <form action="insert_card.php" method="post">
            <h1>are you sure !</h1>
             <input type="text" name="id" value="<?php echo $data['id']; ?>" ><br>
             <input type="text" name="name" value="<?php echo $data['name']; ?>" ><br>
             <input type="text" name="price" value="<?php echo $data['price']; ?>" ><br>
             <button name= "add" type ="submit" class="btn btn-warning">Add To Card</button>
         </form>
   </div>
    </center>
</body>
</html>
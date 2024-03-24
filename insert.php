<?php
include('config.php');

if(isset($_POST['upload'])){
    $NAME = $_POST['name'];
    $PRISE = $_POST['price'];
    $IMAGE = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $image_up = "image/". $image_name;
    //for insert in data base 
    $insert = "INSERT INTO prod (name , price , image) VALUES('$NAME' , '$PRISE' , '$image_up')";
    mysqli_query($conn, $insert) or die(mysqli_error($conn));
    if(move_uploaded_file($image_location , 'image/' . $image_name)){
        echo "<script> alert('Upolad Is Done') </script>";        
    }else{
        echo "<script>alert('Error in Upolad')</script>";
    }
    //for redirct for this page (index)
    header('location:index.php');
}
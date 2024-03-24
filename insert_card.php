<?php 
include('config.php');
if(isset($_POST['add'])){
$NAME = htmlspecialchars($_POST['name']);
$PRICE = htmlspecialchars($_POST['price']);
$insert = "INSERT INTO addcard (name , price) VALUES('$NAME' , '$PRICE')";
mysqli_query($conn , $insert);
header('location:card.php');
}
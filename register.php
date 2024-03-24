<?php
session_start();
if($_SESSION['user']){
  header('location:shop.php');
  exit();  
}
if(isset($_POST['submit'])){
    include('config.php');
    //validate for data 
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $errors = [];
    if(empty($name)){
        $errors[] = 'empty name';
    }
    if(empty($email) && filter_var($email ,FILTER_VALIDATE_EMAIL) == false){
        $errors[] = 'empty email';
    }
    if(empty($password)){
        $errors[] = 'empty password';
    }
    // for dublicate 
    if(empty($errors)){
    $password = password_hash($password , PASSWORD_DEFAULT);
    $insert = "INSERT INTO users (name , email , password) VALUES ('$name' , '$email' , '$password')";
    mysqli_query($conn ,$insert);
    $_SESSION['user'] =[
        'name'=> $name,
        'email'=> $email
    ];    
    header('location:index.php');
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
<section class="h-100 h-custom" style="background-color: #8fc4b7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card rounded-3">
        
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3>
            <?php
                if(isset($erros)){
                    if(!empty($errors)){
                        foreach($erros as $er){
                            echo $er . "<br>";                        
                        }
                    }
                  
                }
                ?>
            <form class="px-md-2" method="post" action="register.php">

              <div class="form-outline mb-4">
                <input type="text" id="form3Example1q" name="name" class="form-control" />
                <label class="form-label" for="form3Example1q">Name</label>
              </div>
              <div class="form-outline mb-4">
                <input type="text" id="form3Example1q1" name="email" class="form-control" />
                <label class="form-label" for="form3Example1q1">Email</label>
              </div>
              <div class="form-outline mb-4">
                <input type="password" id="form3Example1q2" name="password" class="form-control" />
                <label class="form-label" for="form3Example1q2">Password</label>
              </div>

      

             

              

              <button type="submit" name="submit" class="btn btn-success btn-lg mb-1">Submit</button>
                <a href="login.php" class ="btn btn-success btn-lg mb-1">Login !</a>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
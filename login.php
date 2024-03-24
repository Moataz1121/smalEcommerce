<?php 
session_start();
if($_SESSION['user']){
  header('location:shop.php');
  exit();  
}
if(isset($_POST['submit'])){
    include('config.php');
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $errors = [];

    if(empty($email)){
        $errors[] = 'empty email';
    }
    if(empty($password)){
        $errors[] = 'empty password';
    }
    if(empty($errors)){
        $result = mysqli_query($conn,"SELECT * FROM users WHERE email ='$email'");   
        if(!$result){
            $errors[] = "Invalid Email or Password";
        }
        else{
            $password_hash = $_POST['password'];
            if(!password_verify($password, $password_hash)){
                $errors[] = 'invalid password';
            }
            else{
                $_SESSION['user'] = [
                    'email'=> $_POST[$email],
                    'password'=> $_POST[$password],
                ];
                header('location:index.php');
            }
        }
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
    <title>Login</title>
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
            <form class="px-md-2" method="post" action="login.php">

             
              <div class="form-outline mb-4">
                <input type="text" id="form3Example1q1" name="email" class="form-control" />
                <label class="form-label" for="form3Example1q1">Email</label>
              </div>
              <div class="form-outline mb-4">
                <input type="password" id="form3Example1q2" name="password" class="form-control" />
                <label class="form-label" for="form3Example1q2">Password</label>
              </div>

      

             

              

              <button type="submit" name="submit" class="btn btn-success btn-lg mb-1">Submit</button>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
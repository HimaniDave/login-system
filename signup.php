<?php

$showAlert = false;
$showError = false;


if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "partials/_dbconnect.php";
    $username= $_POST["username"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];

    $sqlExists= "SELECT * FROM `users` WHERE username='$username'";
    $result=mysqli_query($conn,$sqlExists);
    $rowsExisting= mysqli_num_rows($result);


    if($rowsExisting>0){
      $showError="Username is already taken";
    }else{
  
    if(($password== $cpassword) ){
        // insert the data
        $sql= "INSERT INTO `users` (`username`, `password`, `dates`) VALUES ('$username', '$password', current_timestamp())";
        $result= mysqli_query($conn,$sql);

        if($result){
          $showAlert = true;
        }
        }
        else{
          $showError = "Passwords do not match";    }
}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Signup</title>
  </head>
  <body>

  <!-- php -->
  
<?php
    if($showAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success! </strong> You have signed up successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error </strong> '.$showError.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
    ?>
  <!-- end of php -->
<div class="container my-4">
<h3>Signup for our services!</h3>
<form action="/loginsystem/signup.php"method="post" >
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" autocomplete="off"  required class="form-control" id="username" name="username" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" required id="password" name="password">
  </div>
  <div class="mb-3">
    <label for="cpassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" required id="cpassword" name="cpassword">
  </div>

 
  <button type="submit" class="btn btn-primary">Signup</button>
  <br>
  <hr>
    <small class="small">Already have an account please <a href="/loginsystem/login.php">login</a></small>
</form>

</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>
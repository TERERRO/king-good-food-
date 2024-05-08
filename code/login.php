<?php
session_start();
include 'header.php';
require('config.php');

if(isset($_POST["login"])){
    $name = $_POST['name'];
    $password = $_POST['password'];

    $mysqml = "SELECT id, name,registration_no FROM students WHERE name='$name' AND password='$password'";
    $result = mysqli_query($connect, $mysqml);

    if(mysqli_num_rows($result) > 0){
        // Student exists, fetch user data
        $rowData = mysqli_fetch_array($result);

        // Set session variables
        $_SESSION['user_id'] = $rowData['id'];
        $_SESSION['user_name'] = $rowData['name'];
        $_SESSION['user_reg'] = $rowData['registration_no'];

        header('location: dashboard.php');
        exit();
    } else {
        echo '<script>alert("Student does not exist");</script>';
        header('location: index.php');
        exit();
    }
}
?>

<div class="card form shadow-lg col-4 p-4 " style="margin-top:33px;">
<h3 class=" text-success text-center">Login Here</h3>
<form action="#" method="POST">
<div class="mb-3 w-2 mt-4">
  <input type="text" class="form-control"
   name="name" placeholder="Enter your name here">
</div>
<div class="mb-3 w-2">
  <input type="text" class="form-control"
   name="password" placeholder="Enter your password">
</div>
<div class="mb-3 w-2">
  <input type="submit" class="form-control btn btn-primary"
   name="login" value="Log in">
</div>
</form>
<div class="  mb-3 w-2">
<span>If you don't have an account ?</span>    
<span><a href="register.php">Register</a></span>    
<div>
</div>
<?php
require 'header.php';
require_once 'config.php';
//Registration logic area for the student who is not in the database 
if(isset($_POST["register"])){
    $name=$_POST['rname'];
    $reg=$_POST['reg'];
    $password=$_POST['password'];
    
     $mysqml="INSERT INTO students(name,registration_no,password) VALUES(
        '$name','$reg','$password'
     ) ";
   
     $result=mysqli_query($connect,$mysqml);
     if($result){
        echo '<script>alert("student added successfully");</script>';
     }
    else{
        echo '<script>alert("student doesnt exist");</script>';
        
    }
}
?>
<div class="card form shadow-lg col-4 p-4" style="margin-top:125px;">
    <h3 class=" text-success text-center">Register Here</h3>
    <form action ="#" method="POST">
<div class="mb-3 w-2">
  <input type="text" class="form-control"
   name="rname" placeholder="Enter your name here">
</div>
<div class="mb-3 w-2">
  <input type="text" class="form-control"
   name="reg" placeholder="Enter your registration number here">
</div>
<div class="mb-3 w-2">
  <input type="text" class="form-control"
   id="regNo" placeholder="Enter your password" name="password">
</div>
<div class="mb-3 w-2">
  <input type="submit" class="form-control btn btn-success"
   name="register" value="Register">
</div>
<div class="  mb-3 w-2">
<span>If you don't have an account ?</span>    
<span><a href="index.php">Login</a></span>    
<div>
</form>
</div>

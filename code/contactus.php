<?php
require 'header.php';
require_once 'config.php';
//Registration logic area for the student who is not in the database 
if(isset($_POST["sndMsg"])){
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
    <h3 class=" text-success text-center">Contact us For more information</h3>
    <form action ="#" method="POST">
<div class="mb-3 w-2">
  <input type="text" class="form-control"
   name="rname" placeholder="Enter your name here">
</div>
<div class="mb-3 w-2">
  <textarea type="text" class="form-control"
   name="msg" placeholder="Enter your message here"></textarea>
</div>
<div class="mb-3 w-2">
  <input type="submit" class="form-control btn btn-success p-3"
   name="sndMsg" value="Send Message">
</div>
</form>
</div>

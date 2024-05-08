    <?php
    
session_start();
include 'header.php';

// Check if user is logged in
if(!isset($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_SESSION['user_reg'])) {
    // Redirect to login page if not logged in
    header('location: index.php');
    exit();
}
?>


    <div class="reavin bg-white[50]">
        <img class="logo rounded" src="images/logo.jpg"/>
    <h1 class="text-center text-warning">university library</h1>
        <p class="text-light p-3">are you searching for a book...?<br>
            visit the university library
        </p>
        
     
    </div>
    <div class="card bg-dark mb-4 p-3">
<div class="row d-flex">
<div class="col-3 text-light px-4"><a class="nav text-light" href="index.php">Home</a></div>
<div class="col-3 text-light px-4"><a class="nav text-light" href="#">Books</a></div>
<div class="col-3 text-light px-4"><a class="nav text-light" href="#">Borrowing</a></div>
<div class="col-3 text-light px-4"><a class="nav text-light" href="contactus.php">Contact us</a></div>
</div>
</div>
    </div>
<div class="card shadow-lg bg-white p-4">
     <h1 class="text-center text-info">WELCOME TO THE LIBRARY</h1>
     <p class="d-none">User ID: <?php echo $_SESSION['user_id']; ?></p>
     <p class="bg-primary p-2 col-3 text-light">Student Name: <?php echo $_SESSION['user_name']; ?></p>
     <div class="row  bg-primary">
        <p>Borrow books</p>
<?php
require('config.php');
$sql='select * from books';
$result=mysqli_query($connect,$sql);
if($result){
    while($row=mysqli_fetch_array($result)){
        ?>
       
        <div class="col-3 mt-3 px-3" style="display:flex;gap:10px;">
        <p class="text-danger bg-white"><?php echo $row['id']; ?></p>
        <img class="text-danger bg-white"src="admin/images/<?php echo $row['image']; ?>"/>
        <p class="text-light bg-warning"><?php echo $row['name']; ?></p>
        </div>
        <?php

    }
    
}else{
    ?>
    <p class="text-danger text-center"> No books in the database to borrow from</p>
    <?php
}
?>
</div>
</div>
<div class="card shadow-lg p-4 mt-3 text-center">
    <h1 class="text-primary text-shadow-lg">borrow the available books</h1>




    <?php
require 'header.php';
require_once 'config.php';
//Borrowing the book  logic area for the student who is  in the database 
if(isset($_POST["borrowing"])){
    $name=$_POST['name'];
    $reg=$_POST['reg'];
    $password=$_POST['password'];
    
     $mysqml="INSERT INTO borrowing(name,registration_no,password) VALUES(
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
    <h3 class=" text-success text-center">borrowing from here</h3>
    <form action ="borrow.php" method="POST">
    <div class="mb-3 w-2">
  <input type="text" class="form-control d-none" name="stdId"
   value="<?php echo $_SESSION['user_id']; ?>"/>
</div>
<div class="mb-3 w-4">
  <input type="text" class="form-control d-none" 
   name="name" value="<?php echo $_SESSION['user_name']; ?>">
</div>

<div class="mb-3 w-4">
  <input type="text" class="form-control d-none" 
   name="reg" value="<?php echo $_SESSION['user_reg']; ?>">
</div>
<div class="mb-3 w-2">
<select name="boox">
    <option>Select book to borrow and submit successfully</option>
    <?php
    require 'config.php';
    $sqL ="SELECT * FROM books";
    $result =mysqli_query($connect,$sqL);
    if($result){
 while($row = mysqli_fetch_array($result)){
    ?>
  <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
<?php
 }
    }
    ?>
</select>
</div>
<div class="mb-3 w-2">
  <input type="submit" class="form-control btn btn-success"
   name="borrow" value="borrow">
</div>

</form>
</div>

</div>
<div class=" card jumbotron breadcrumb shadow-lg mt-2 ">
My books Borrowed
<?php
$userId = $_SESSION['user_id'];
$qsl = "SELECT b.name,b.isbn from books b INNER JOIN borrowers br ON b.id = br.bk_id WHERE br.stId ='$userId'";
$QR = mysqli_query($connect,$qsl);
if($QR){
 while($row = mysqli_fetch_array($QR)){
    ?>
    <div class="row mb-3  card shadow-lg bg-light">
        <div class="row">
        <p class="bg-warning col-3"><span class="text-white">Book name: </span><?php echo $row['name'];?></p>
    <p class="bg-success col-3"><span  class="text-white">Book ISBN: </span><?php echo $row['isbn'];?></p>
    
        </div>
   
    </div>
   
    <?php
 }
}


?>
</div>

<div style="margin-top:12px;">
    <footer>
        <p>&copy:<?php echo date("Y");?> Reavin copyright reserved</p>
    </footer>
</div>
</body>
<script src="js/bootstrap.bundle.min.js"></script>
</html>

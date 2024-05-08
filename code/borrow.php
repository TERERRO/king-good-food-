<?php
require 'config.php';
if(isset($_POST['borrow'])){
    $stdId =$_POST['stdId'];
    $name =$_POST['name'];
    $regNumber =$_POST['reg'];
    $boox =$_POST['boox'];

$Ql = " INSERT INTO borrowers(name,studentreg,stId,bk_id) 
VALUES('$name','$regNumber','$stdId','$boox')";
$resqlt = mysqli_query($connect,$Ql);
if($resqlt){
 echo "<script>alert('Book borrowed successfully');</script>";
}


}




?>
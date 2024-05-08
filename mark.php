<?php
$email=$post['email'];
$password=$post['password'];

//Establish a database connection here

$con=new mysqli("localhost","root","","king");

if($con->connect){
    die("failed to connect:" .$con->connect_error);
}else{
    $stmt=$con->prepare("select"*from king where email=?
    $stmt-blind_param("s"$email);
    $tmt->ececute();
    $stmt_result=$stmt->get_result();
    if ($stmt_result->num rows >0){
        $data=$stmt_result->fetch_aside(){
            if($data[password] ### $password){
                echo"You have logged successfully";
            }else{
                echo"please enter valid information";
            }
            
            }
        }
    }
    )
}  
}
?>
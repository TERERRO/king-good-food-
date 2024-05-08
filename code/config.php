<?php
//database connection
//declaring variables we use $ attached onto the variable name
/*$servername= 'localhost';
$username='root';
$password='';
$databasename='must_lib';
$connect = mysqli_connect($servername,$username,$password,$databasename);*/
$connect = mysqli_connect('localhost','root','','must_lib');
if(!$connect){ 
    echo 'connected failed';

}
//php tags <?php-opening tag      /////  / 
/*     ?>- closing tag      */
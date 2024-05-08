<?php
require '../config.php';

    error_reporting(0);
    
    $msg = "";
    
    // If upload button is clicked ...
    if (isset($_POST['savebook'])) {
    $name =$_POST['bookname'];
    $isbn =$_POST['bookisbn'];
        $filename = $_FILES["bookimage"]["name"];
        $tempname = $_FILES["bookimage"]["tmp_name"];
        $folder = "./images/" . $filename;    
        // Get all the submitted data from the form
        $sql = "INSERT INTO books (name,image,isbn) VALUES ('$name','$filename','$isbn')";
    
        // Execute query
        mysqli_query($connect, $sql);
    
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3> Book added successfully!</h3>";
            echo "<button ><a href='index.php'>Go back home</a></button>";
        } else {
            echo "<h3> Failed to upload image!</h3>";
        }
    }

    ?>

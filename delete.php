<?php
        require_once 'includes/conn.php';
 
     //This gets the user_id value that was passed via query string, to the view.php page
     $userid = $_GET['id'];
     //This constructs a query to get all users (should be one) with the user_id value
     $query = "DELETE from user_ftb where `userid`= '$userid' ";
     //This constructs the query and executes it. 
     $command = mysqli_query($conn, $query);
     //If the command fails, then print an error message and kill the execution of the code
     if(!$command){
         echo 'Select Query Failed: '.mysqli_error($conn);
         die();
     }
 
     header('Location: admin.php?del=1');
?>
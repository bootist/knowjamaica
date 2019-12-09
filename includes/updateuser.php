<?php 
        
        //set all variables
        $id=$_POST["id"];
        
    
    require_once('conn.php');
    //Get the posted email address and use for the query
        $query = mysqli_query($conn,"SELECT * FROM user_ftb WHERE userid = '$id'") or die(mysqli_error($conn)); 
                
        $row = mysqli_fetch_array($query);
    

        
        $firstname = mysqli_real_escape_string($conn,htmlspecialchars($_POST['firstname'])); 
        $lastname = mysqli_real_escape_string($conn,htmlspecialchars($_POST['lastname'])); 
        //$username = mysqli_real_escape_string($conn,htmlspecialchars($_POST['username'])); 
        $email = mysqli_real_escape_string($conn,htmlspecialchars($_POST['email'])); 
        
        $password = mysqli_real_escape_string($conn,htmlspecialchars($_POST['password']));
        $new_password = md5($password.$username);
        //$address = mysqli_real_escape_string($conn,htmlspecialchars($_POST['address'])); 
       
        if($row["password"] != $new_password){
            $password = $new_password;
        }
        
        
        //call script to save data to database
        $query = "UPDATE user_ftb SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`password`='$password' WHERE userid='$id'";
         
         mysqli_query($conn,$query) or die(mysqli_error($conn)); 
        
         
?>
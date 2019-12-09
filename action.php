<?php
include_once ('includes/conn.php');
//Check if the page is being loaded and if there is a POST request. 
 
//So if the page loads because it was browsed to, then there is no POST.  
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //Preset errors
    $email_error = "email is required to continue";
    //$password_error = "Please enter Password";
    $firstname_error = "First name is required to continue";
    $lastname_error = "Last name is required to continue";
    $upload_file_error = "Incorrect file type for profile picture";

    //Get all submitted information into variables.
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    
    $address = $_POST['address'];
    $username = $_POST['user_name']; 
    $email = $_POST['email'];
    $password = $_POST['password'];
    //Handle Password
   //Here, we use the username as the salt. //hash the password and salt combination
    $new_password = md5($password . $username);
    
    $gender = $_POST['gender'];
    
    //Handle Profile Picture
    if(!file_exists($_FILES['profile_picture']['tmp_name']) || !is_uploaded_file($_FILES['profile_picture']['tmp_name']))
    {
      $name ='dummy.jpg';
     
    }
    else{      
      $name = $_FILES["profile_picture"]["name"];
    }
      $target_dir = "profile_pic/";
      $target_file = $target_dir.$name;
     //basename($_FILES['profile_picture']['name']
      // Select file type
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
     
      // Valid file extensions
      $extensions_arr = array("jpg","jpeg","png","gif");
     
      // Check extension
      if( in_array($imageFileType,$extensions_arr) ){
        $profile = $target_file;
      }
      else
          {
            echo "<p class='text-danger'>$upload_file_error</p>";
          }
          
        //End image handling  
          //insert a new user into the table
        

        $query = "INSERT INTO `user_ftb`( `firstname`, `lastname`, `address`, `gender`, `email`,`username`, `password`, `profile_picture`) 
        VALUES ('$firstname','$lastname','$address','$gender','$email','$username', '$new_password','$profile')";
 
        //mysqli_query() executes the query against the connection variable and returns a boolean based on the success.
        $command = mysqli_query($conn, $query);

        //Check to see if true or false is returned and take an appropriate action. 
        if (!$command){
            
            echo '<div class="alert alert-danger">' . mysqli_error($conn). '</div>';
            
          }
          
        //It is good practice to close the connection after a transaction.
        mysqli_close($conn);
        // Upload file
        move_uploaded_file($_FILES['profile_picture']['tmp_name'],$target_dir.$name);
        //email
        $to      = $email;
        $subject = 'Welcome to KnowJamaiaca';
        $message = 'Thank you for registering on Know Jamaica';
        $headers = 'From: webmaster@example.com' . "\r\n" .
        'Reply-To: webmaster@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
     


        //Redirect to the login page with a tag of success
        header("Location: login.php?success=1");    
          }        
          
          ?>
     
    

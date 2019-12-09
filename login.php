<?php $title = 'Login';
include_once ('includes/header.php'); 
include_once ('includes/conn.php');
?>
<?php
    //if the success variable exists in the URL, then print a n alert that the user account was created. 
    //Theoretically, this variable should only exist when a new account is created at registration. 
    if(isset($_GET['success'])){
        echo '<div class="alert alert-success"> Thank you for submitting you information. Please login </div>';
    }
 
    //If data was submitted via a form POST request, then...
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Get username as lower case with no spaces
        $username = strtolower(trim($_POST['user_name']));
        $password = $_POST['password'];
        //generate hashed version of enetered password in accordance with how the original registration hash was created
        $new_password = md5($password.$username);
         
        //check the database for the presence of a username and password value match
        $query = "SELECT * from user_ftb where `username`= '$username' and `password` = '$new_password'";
 
        //regular run and check of query run success.
        $command = mysqli_query($conn, $query);
        if(!$command){
            echo 'Select Query Failed: '.mysqli_error($conn);
            die();
        }
        //get result and store in variable. 
        $result = mysqli_fetch_row($command);
         
        //if no result was found, print corresponding error message 
        if(!$result){
            echo '<div class="alert alert-danger">Username or Password is incorrect! Please try again. </div>';
            die();
        }
 
        //if it gets this far, then it means a result was returned and we want to set a session variable with the value of the entered username. 
 
        //Set session value
        if($admin === $new_password)
        {
          $_SESSION['admin'] = 'Administrator';
          $_SESSION['username'] = $username;
        }
        else
        {
          $_SESSION['username'] = $username;
        }
        
        header("Location: profile.php");
    }
 
?>
    
 <legend> Login Form </legend>
         
  
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">

<!-- userName-->
  
  
<div class="form-group">
    <label class="col-md-4 control-label"><span class="req">* </span> Username<small> username must be unique</small></label>
    <div class="col-md-6  inputGroupContainer">
      <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input  name="user_name" placeholder="User name" class="form-control"  type="text" required>
      </div>
    </div>
  </div>
  
  <!-- Password-->
  
  <div class="form-group">
    <label class="col-md-4 control-label" ><span class="req">* </span> Password</label>
    <div class="col-md-6  inputGroupContainer">
      <div class="input-group"> <span class="input-group-addon"><i class="fa fa-key"></i></span>
        <input name="password" placeholder="Password" class="form-control"  type="password" required>
      </div>
    </div>
  </div>  
  </fieldset> 
  <fieldset>
  <div class="form-group">
  <!-- Button--> 
  <div class="row">
  <div class="col-sm-1.5">
  <button type="submit" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Log in</a>
  </div>
  


  
  <div class="col-sm-1.5">
  <button type="submit" class="btn btn-success btn-lg active" role="button" aria-pressed="true"><a id="forgotpassword" href="register.php"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Forgot Password?</a>
  </div>
  </div>
</div>
</fieldset> 
  
</form>


  
  <?php include_once ('includes/footer.php')
?>
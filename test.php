
<?php
if(isset($_GET['admin']))
{
  $title = 'Create New User';
}
else
{
  $title = 'Registration';
}

include_once ('includes/header.php'); 
include_once ('includes/conn.php');?>
<?php
//Check if the page is being loaded and if there is a POST request. 
 
//So if the page loads because it was browsed to, then there is no POST.  
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //Preset errors
    $username_error = "Username is required to continue";
    //$password_error = "Please enter Password";
    $firstname_error = "First name is required to continue";
    $lastname_error = "Last name is required to continue";
    $upload_file_error = "Incorrect file type for profile picture";

    //Get all submitted information into variables.
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $username = $_POST['user_name'];         
    $password = $_POST['password'];
    //Handle Password
   //Here, we use the username as the salt. //hash the password and salt combination
    $new_password = md5($password . $username);
    $address = $_POST['address'];
    $telephone = $_POST['phone'];
    $email = $_POST['email'];
    $cob = $_POST['cob'];
    //Date convert string to date
    
    $timestamp = strtotime($_POST['dob']);
    $dob=date("Y-m-d", $timestamp);
    //End DOB conversion    
    $gender = $_POST['gender'];
    //Handle Profile Picture
    if(!isset($_FILES['profile_picture'])){
      echo '<div class="alert alert-danger">Profile pic not uploaded</div>';
    }
    else{      
      $name = $_FILES["profile_picture"]["name"];
      $target_dir = "profile_pic/";
      $target_file = $target_dir . basename($_FILES['profile_picture']['name']);
     
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
     
    

    //Perform validations to ensure that no empty fields are being submitted.
    if(empty($firstname) || empty($lastname) || empty($username) || empty($password)|| empty($address)|| 
    empty($telephone)|| empty($email)|| empty($cob)|| empty($dob)|| empty($profile)|| empty($gender) )
    {
        echo '<div class="alert alert-danger">Please Complete The Form Properly</div>';
    }
    else{
        
        //insert a new user into the table
        $query = "INSERT INTO `user_tb`( `username`, `password`, `firstname`, `lastname`, `address`, `telephone`, `email`, `country_of_birth`, `date_of_birth`, `gender`, `profile_picture`) 
        VALUES ('$username', '$new_password','$firstname','$lastname','$address','$telephone','$email','$cob','$dob','$gender','$profile')";
 
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


        //Redirect to the login page with a tag of success
        header("Location: login.php?success=1");    
          }        
    }
     

}
?>

<!-- enctype="multipart/form-data"  -->


<form method ="POST" enctype="multipart/form-data" action="<?php echo htmlentities($_SERVER ['PHP_SELF']); ?>">

    <legend> Registration Form </legend>

    
        
<fieldset>    
 
 
  <!-- FirstName-->
  
  
  <div class="form-group">
    <label class="col-md-4 control-label"><span class="req">* </span> First Name<small> first name only!</small></label>
    <div class="col-md-6  inputGroupContainer">
      <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input  id ="first_name" name="first_name" placeholder="First Name" class="form-control"  type="text" value=<?php if(isset($firstname)) {echo $firstname;}?>>
        <?php if (empty($firstname) && isset($firstname_error)) echo "<p class='text-danger'>$firstname_error</p>"; ?>
      </div>
    </div>
  </div>
  
  <!-- LastName-->
  
  <div class="form-group">
    <label class="col-md-4 control-label" ><span class="req">* </span> Last Name</label>
    <div class="col-md-6  inputGroupContainer">
      <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input id="last_name" name="last_name" placeholder="Last Name" class="form-control"  type="text" value=<?php if(isset($lastname)) {echo $lastname;}?>>
        <?php if (empty($lastname) && isset($lastname_error)) echo "<p class='text-danger'>$lastname_error</p>"; ?>
      </div>
    </div>
  </div>
  
  <!-- userName-->
  
  
  <div class="form-group">
    <label class="col-md-4 control-label"><span class="req">* </span> Username<small> username must be unique</small></label>
    <div class="col-md-6  inputGroupContainer">
      <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input  id="user_name" name="user_name" placeholder="User name" class="form-control"  type="text" value=<?php if(isset($username)) {echo $username;}?>>
        <?php if (empty($username) && isset($username_error)) echo "<p class='text-danger'>$username_error</p>"; ?>
      </div>
    </div>
  </div>
  
  <!-- Password-->
  
  <div class="form-group">
    <label class="col-md-4 control-label" ><span class="req">* </span> Password</label>
    <div class="col-md-6  inputGroupContainer">
      <div class="input-group"> <span class="input-group-addon"><i class="fa fa-key"></i></span>
        <input name="password" required class="form-control" id="password" name="password" type="password" placeholder="Enter Password" reqired>
      </div>
    </div>
  </div> 

  <!-- Password-->
  
  <div class="form-group">
    <label class="col-md-4 control-label" ><span class="req">* </span> Confirm Password</label>
    <div class="col-md-6  inputGroupContainer">
      <div class="input-group"> <span class="input-group-addon"><i class="fa fa-key"></i></span>
        <input name="confirmpassword" placeholder="Enter Password Confirmation" type="password" required class="form-control" id="confirmpassword">
      </div>
    </div>
  </div> 
  <!-- Address-->
      
  <div class="form-group">
        <label class="col-md-4 control-label"><span class="req">* </span> Address</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <input idname="address" name="address" placeholder="Address" class="form-control" type="text" value=<?php if(isset($address)) {echo $address;}?>required>
          </div>
        </div>
      </div>
  <!-- Phone and Email-->
      
  <div class="form-group">
        <label class="col-md-4 control-label"><span class="req">* </span> Phone #</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
            <input idname="phone" name="phone" placeholder="(845)555-1212" class="form-control" required type="tel"value=<?php if(isset($telephone)) {echo $telephone;}?>>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label"><span class="req">* </span> E-Mail</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input id="email" name="email" placeholder="E-Mail Address" class="form-control"  required type="email" onchange="email_validate(this.value);"value=<?php if(isset($email)) {echo $email;}?>>
          </div>
        </div>
      </div>

    
        <!-- Country of Birth-->

        <div class="form-group">
        <label class="col-md-4 control-label"><span class="req">* </span> Country of Birth</label>
        <div class="col-md-6 selectContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="fa fa-globe"></i></span>
            <select id="cob" name="cob" class="form-control selectpicker" value=<?php if(isset($cob)) {echo $cob;}?> >
              <option value=" " required>Please select one</option>
              <option>Antigua and Barbuda</option>
              <option>Clerk</option>
              <option >Bahamas</option>
              <option >Barbados</option>
              <option >Belize</option>
              <option >Canada</option>
              <option >Costa Rica</option>
              <option >Cuba</option>
              <option >Dominica</option>
              <option >Dominican Republic</option>
              <option >El Salvador</option>
              <option >England</option>
              <option >Grenada</option>
              <option >Guatemala</option>
              <option >Germany</option>
              <option >Haiti</option>
              <option >Honduras</option>
              <option >Hungury</option>
              <option >Jamaica</option>
              <option >Japan</option>
              <option >Mexico</option>
              <option >Nicaragua</option>
              <option >Panama</option>
              <option >Russia</option>
              <option >Saint Kitts and Nevis</option>
              <option >Saint Lucia</option>
              <option >Saint Vincent and the Grenadines</option>
              <option >Spain</option>
              <option >Trinidad and Tobago</option>
              <option >United States of America (USA)</option>
              <option >United Arab Emirates</option>
              <option >Other</option>
             
            </select>
          </div>
        </div>
      </div>
         <!-- Date of Birth-->
     
     
     <div class="form-group">
        <label class="col-md-4 control-label" for="Date Of Birth"><span class="req">* </span> Date Of Birth</label>  
        <div class="col-md-6  inputGroupContainer">

    <div class="input-group">
       <div class="input-group-addon"><i class="fa fa-birthday-cake"></i>
        
       </div>
       <input id="dob" name="dob" type="text" placeholder="Date Of Birth" class="form-control input-md" required value=<?php if(isset($dob)) {echo $dob;}?>>
      </div> 
    
    </div>
    </div>

    <!-- Profile Picture-->
  
  
  <div class="form-group">
    <label class="col-md-4 control-label"><span class="req">* </span> Profile Picture</label>
    <div class="col-md-6  inputGroupContainer">
      <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input type="file" id ="profile_picture" name="profile_picture" accept ="image/*" placeholder="Add Photo here" class="form-control" >
      </div>
    </div>
  </div>
    <!-- Gender-->
    <div class="form-group">
    
    <label class="col-md-4 control-label" for="Gender"><span class="req">* </span> Gender</label>
    <div class="col-md-6  inputGroupContainer">
    <div class="input-group"> <span class="input-group-addon"><i class="fa fa-venus-mar"></i></span>
    
    
    <div class="col-md-4"> 
    <label class="radio-inline" for="Gender-0">
      <input type="radio" name="gender" id="Gender-0" value="Male" checked="checked">
      Male
    </label> 
    <label class="radio-inline" for="Gender-1">
      <input type="radio" name="gender" id="Gender-1" value="Female">
      Female
    </label> 
    </div>
    </div>
    </div>
    </div>

 </fieldset>
 
 
 <fieldset>
  <div class="form-group">  
    <div class="row">
      <div class="col-sm-1.5">
        <button type="submit" class="btn btn-success btn-lg" role="button" aria-pressed="true">Register</a>
      </div>
      <div  class="col-sm-1">
        <button type="submit" class="btn btn-dark btn-lg" role="button" aria-pressed="true">Clear</a>
      </div>
    </div>  
  </div> 
 
   </fieldset>
<?php
    if($_SERVER['REQUEST_METHOD']== 'POST')
?>
</form>

<?php include_once ('includes/footer.php')
?>
<script>
      $(function() {
        $( "#dob" ).datepicker();
      });
    </script>
    <script>
        var password = document.getElementById("password");
        var confirm_password = document.getElementById("confirmpassword");

        function validatePassword(){
          if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
          } else {
            confirm_password.setCustomValidity('');
          }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
    <script type="text/javascript">
  document.getElementById('first_name').value = "<?php echo $_POST['first_name'];?>";
  document.getElementById('profile_picture').value = "<?php echo $_POST['profile_picture'];?>";
  document.getElementById('last_name').value = "<?php echo $_POST['last_name'];?>";
  document.getElementById('email').value = "<?php echo $_POST['email'];?>";
  document.getElementById('user_name').value = "<?php echo $_POST['iuser_name'];?>";
  document.getElementById('phone').value = "<?php echo $_POST['phone'];?>";
  document.getElementById('address').value = "<?php echo $_POST['addres'];?>";
  document.getElementById('dob').value = "<?php echo $_POST['dob'];?>";
  document.getElementById('cob').value = "<?php echo $_POST['cob'];?>";
</script>
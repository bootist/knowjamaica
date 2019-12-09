
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


<!-- enctype="multipart/form-data"  -->


<form method ="POST" enctype="multipart/form-data" action="action.php">

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
        <label class="col-md-4 control-label"><span class="req">* </span> E-Mail</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input id="email" name="email" placeholder="E-Mail Address" class="form-control"  required type="email" onchange="email_validate(this.value);"value=<?php if(isset($email)) {echo $email;}?>>
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

    

    <!-- Profile Picture-->
  
  
  <div class="form-group">
    <label class="col-md-4 control-label"><span class="req">* </span> Profile Picture</label>
    <div class="col-md-6  inputGroupContainer">
      <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input type="file" id ="profile_picture" name="profile_picture" accept ="image/*" placeholder="Add Photo here" class="form-control" >
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
      <!-- <div  class="col-sm-1">
        <button type="submit" class="btn btn-dark btn-lg" role="button" aria-pressed="true">Clear</a>
      </div> -->
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
  document.getElementById('address').value = "<?php echo $_POST['address'];?>";
 
</script>
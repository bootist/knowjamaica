<?php 
$title = "Modify User";
include_once("includes/header.php");
?>
    

        <h1>Edit A User Details</h1>
        
        <?php           
            
            require_once('includes/conn.php');
        
            if (isset($_POST["id"]) && isset($_POST["submit"])){
                include("includes/updateuser.php");
                echo '<div class="alert alert-success">Record updated</div>';
                header("Location: admin.php"); 
                
            }
            
            $id = $_GET['id'];
            

    $query = mysqli_query($conn,"SELECT * FROM user_ftb WHERE userid = '$id'") or die(mysqli_error($conn)); 
            
    $row = mysqli_fetch_array($query);
            if(mysqli_num_rows($query) < 1){
                echo '<div class="alert alert-danger">Failed</div>';
                echo '<br/>'; 
                echo '<br/>'; 
            }
            else { 
//                
            
            
        ?>
        <div class="alert alert-primary"><a href="admin.php">Returning to Home of Admin</a></div>
        <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" >
            <div class="well">
                
              <input type="hidden" name="id" value="<?php echo $row['userid'] ?>" />
          
            
            <br/>
                
                <div class="form-group">
                <label class="col-sm-3 control-label" for="firstname">First Name</label>
                <div class="col-sm-9">
                    <input value="<?php echo $row['firstname'] ?>" type="text" required="required" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name">
                </div>
            </div>
            
           
            <br/>
            <br/>
            
            <div class="form-group">
                <label class="col-sm-3 control-label" for="lastname">Last Name</label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $row['lastname'] ?>" class="form-control" id="lastname" name="lastname"  placeholder="Enter Last Name">
                </div>
            </div>

                        <br/>
                        <br/>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="email">Email Address *</label>
                <div class="col-sm-9">
                    <input  type="email" value="<?php echo $row['email'] ?>" required class="form-control" id="email" name="email" placeholder="Enter Email Address">
                </div>
            </div>
            
                       
                       
           <br/>
                        <br/>
                
            <div class="form-group">
                <label class="col-sm-3 control-label" for="password">Password * </label>
                <div class="col-sm-9">
                    <input type="password" value="<?php echo $row['password'] ?>" required class="form-control" id="password" name="password" placeholder="Enter Password">
                </div>
            </div>
            
            <br/>
                        <br/>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="confirmpassword">Confirming Password *</label>
                <div class="col-sm-9">
                    <input type="password" value="<?php echo $row['password'] ?>" required class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Enter Password Confirmation">
                </div>
            </div>
        <br/>
            <br/>
    </div>
            
            <input type="submit" name="submit" value="Update Record" class="btn btn-warning btn-lg"/>
    </form>

    
            <?php }
            include_once('includes/footer.php');?>
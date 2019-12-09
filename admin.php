<?php $title = 'Administrator';
include_once ('includes/header.php'); 
include_once ('includes/conn.php');?>
<br>
    <br>
    <div class="container" id="page">
        <h1>Welcome Administrator "<?php echo $_SESSION['username']?>"</h1>
        
    
    <?php 
        if(isset($_GET['del']))
        {
            echo'<div class="alert alert-success">
            <p class="text-success">Record deleted successfully</p>
            </div>';
        }
        
        //run query for all users
        $query = mysqli_query($conn,"SELECT * FROM user_ftb") or die(mysqli_error($conn)); 
        echo '<a href="register.php?admin=1" class="btn btn-primary">Add New User</a>'; 
        echo '<br/>';
        echo '<br/>';
        //if data comes back, echo html for table 
        if(mysqli_num_rows($query) > 0) { 
            echo '<table class="table table-condensed">';
            echo'<tr>
                    <th>Operations</th>
                    <th>Profile Picture</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email Address</th>
                </tr>';
            
            
            while($row = mysqli_fetch_array($query)){ 
                            
            echo'<tr>';
            echo'<td><a href="profile.php?id='.$row['userid'].'" class="btn btn-primary"> View</a>
                <a class="btn btn-warning" href="edit.php?id='.$row['userid'].'"> Edit</a>
                <a class="btn btn-danger" href="delete.php?id='.$row['userid'].'"> Delete</a>
            </td>';
            echo'<td><img src="'.$row['profile_picture'].'" style="width:32px; height:32px" /></td>';
            echo'<td>'.$row['firstname'].'</td>';
            if($admin === $row['password']){
            echo'<td>'.$row['lastname'].'<span class ="text-danger">  *Admin**</span></td>' ;
            }
            else{
                echo'<td>'.$row['lastname'].'</td>' ;
            }
            echo'<td><a href="mailto:'.$row['email'].'">'.$row['email'].'</a></td>';
            echo'</tr>';
        }
        echo '</table>';
    }else { 
        echo'<div class="alert alert-warning">
            <h1>There is no data to display!</h1>
            </div>';
    
        }
        
        echo'<hr class="featurette-divider">';
        
    ?>
        
<?php include_once ('includes/footer.php')?>
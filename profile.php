<?php $title = 'Profile';
include_once ('includes/header.php'); 
 
include_once ('includes/conn.php');?>
<?php
    //Get stored username
    $username = $_SESSION['username'];
    //selcet records for said username
    $query = "SELECT * from user_ftb where `username`= '$username'";
 
    //regular run and check of query run success.
    $command = mysqli_query($conn, $query);
    if(!$command){
        echo 'Select Query Failed: '.mysqli_error($conn);
        die();
    }
    //get result and store in variable. 
    $myresult = mysqli_fetch_assoc($command);
    
    ?>
    <table class="table table-dark">
    <?php include('getImage.php');
          
    echo '<img src= '.$row['profile_picture'].' width ="150" height ="150">';
    echo '<th th-center> Profile for '.$myresult['username'].'</th>';
    $myresult = array_slice($myresult, 1);
    $numItems = count($myresult);
    $i = 1;
    
    foreach ($myresult as $key => $value)
    {
        if(++$i < $numItems)
        {
        echo '<tr> <td> '.$key.' </td><td> '.$value.' </td></tr>'; 
        }
         
        
    }
 
    ?> 
    
    </table>






<?php include_once ('includes/footer.php')
?>
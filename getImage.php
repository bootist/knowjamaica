
<?php

if(isset($_SESSION['username']))
{
$id = $_SESSION['username'];
}
// 


include_once('includes/conn.php');
$sql = "SELECT profile_picture FROM `user_ftb` WHERE username = '$id' ";

$result = mysqli_query($conn,$sql);
if(!$result)
{
    echo "Error ". mysqli_error($conn);
}
else
{
$row = mysqli_fetch_array($result);


}
?>
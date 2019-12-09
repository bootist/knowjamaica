<?php 
//This includes the session file. This file contains code that starts/resumes a session. 
//By having it in the header file, it will be included on every page, allowing session capability to be used on every page across the website.
include_once 'includes/session.php';?>
<div id="container">
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

<?php include_once 'includes/css.php';
      include_once 'includes/time.php';

      
      echo "<title>$title</title>";
?>
</head>
<div id="body">
<body class ="bg-success">
 
<nav class="navbar navbar-expand-lg  navbar-dark bg-dark navbar-fixed-top">
<a class="navbar-brand" href="index.php" ><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
<!-- <img class="img-responsive"  border="0" src="includes/Images/JA-Logo.png " height="60" width="100" alt="Jamaica Sweet" onclick="ShowWaiting();"></a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
  <p class="text-right text-warning" > <?php echo "$date"; 
   if (isset($_SESSION['username'])) { echo'&emsp; &emsp;Welcome ' . $_SESSION['username'] ;}?>
    <ul class="navbar-nav navbar-left">
    
        <li class="nav-item"><a class="nav-item nav-link" href="about.php">About Us</a></li>
        <li class="nav-item"><a class="nav-item nav-link" href="contact.php">Contact Us</a></li>
    </ul>
    <?php 
    //If THe user session variable does not exist, print the menu items for register and log in.
    if(!isset($_SESSION['username'] )&& !isset($_SESSION['admin'] )) { echo ' 
    <ul class="navbar-nav navbar-right">
        <li class="nav-item"><a class="nav-link" title="Click here to register" href="register.php">Register</a></li>
        <li class="nav-item"><a class=" nav-link" id="login" title="Click here to login" href="login.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Log In</a></li>

    </ul>
     '; }
     //If the user session variable exists, then print a welcome username section and a logout link <li class="nav-item "><a class="nav-link" title="Click for profile" href="profile.php">Welcome ' . $_SESSION['username'] . '</a></li>
     else if (isset($_SESSION['admin'])) { echo'
      
        <ul class="navbar-nav navbar-right">
        
               
        <li class="nav-item"><a class="nav-link" title="Admin Menu" href="admin.php">Admin</a></li>
        <li class="nav-item"><a class="nav-link" title="Gallery" href="gallery.php">Gallery</a></li>
        <li class="nav-item"><a class=" nav-link" title="Log out" href="includes/logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>Log Out</a></li>
        
    </ul>
     '; }
     else { echo'
      
        <ul class="navbar-nav navbar-right">

      
        <li class="nav-item"><a class="nav-link" title="View Profile" href="profile.php">View Profile</a></li>    
        <li class="nav-item"><a class="nav-link" title="Gallery" href="gallery.php">Gallery</a></li>             
        <li class="nav-item"><a class=" nav-link" title="Log out" href="includes/logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>Log Out</a></li>
        
    </ul>
     '; }
     
     ?>
  </div>
</nav>

 
<div class="container ">
 
<br/>
<br/>
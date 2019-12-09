<?php
//Clear seesion variables and destroy session
      //unset($_SESSION);
      session_start();
      $_SESSION = array();
      session_destroy(); 
      header("Location: ../index.php");
?>
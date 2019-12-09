

<?php
    //$_POSTDatabase
    // $servername = '127.0.0.1';
    // $username = 'root';
    // $password = '';
    // $dbname = 'knowja_db';
//Database
$servername = 'remotemysql.com';
$username = 'PIpIh99r63';
$password = 'mKY0uEdUxe';
$dbname = 'PIpIh99r63';
    
?>

<?php
    $conn =  mysqli_connect($servername, $username, $password, $dbname);
       if($conn)
    {   
        $dbmessage = "Connection successful!";
        //insertData($conn);
    }
    else{
        die("Connection Failed:". mysqli_connect_error());

    }

    //Admin
    $auser = "admin";
    $apassword ="@administrat0r";
    $admin = md5($apassword.$auser);
  
    ?>
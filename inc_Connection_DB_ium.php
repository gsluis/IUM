<?php
    define("HOSTNAME","localhost");
    define("USERNAME","gertonium");
    define("PASSWORD","Maxislief123");
    define("DB_NAME","IUM");
    
    $conn= new mysqli(HOSTNAME,USERNAME,PASSWORD,DB_NAME);
    
    if ($conn-> connect_errno)
        {
            print("<br/>Failed to connect to MySQL: (" . $conn->connect_errno ." " . $conn->connect_error .")");
            die("<br/>Program terminated");
        }         
?>

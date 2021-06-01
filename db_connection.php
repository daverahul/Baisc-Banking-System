<?php
       $DB_HOST="localhost";
       $DB_USER="root";
       $DB_PASS="";
       $DB="practise";
       
       
       $conn= mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB);

    if(!$conn){
        die("connection failed: ".mysqli_connect_error());
        

    }
    
    
?>

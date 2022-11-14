<?php
       
       //start session
       session_start();

       //create constant to store non repeating values
       define('SITEURL','http://localhost/dbms1/');
       define('LOCALHOST','localhost');
       define('DB_USERNAME','root');
       define('DB_PASSWORD','');
       define('DB_NAME','petstore');


       $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());//database caonnection
       $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());//select database
        
       ?>
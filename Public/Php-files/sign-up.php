<?php

//import functions
require_once("functions.php");

// Create connection
$conn = startConnection("localhost:3308", "root", "", "deneme");
$userEmail = " " ;
$userName = " " ;
$userPassword = " " ;

//chech requset type sent from html 
if ($_SERVER["REQUEST_METHOD"]=="POST"){

// take user info from html form
$userEmail = (test_input($_POST["email"])) ;  
$userName = (test_input($_POST["fullname"])) ;  
$userPassword = (test_input($_POST["password"])) ;  

//adding new record to database
$sql = "INSERT INTO users
            (name, email, password)
            VALUES
            ('$userName',
                        '$userEmail',
            '$userPassword')";
            
$result = $conn->query($sql);
header("Location:../Html-files/login.html");
}

//closing database connection
$conn->close();
  
?>
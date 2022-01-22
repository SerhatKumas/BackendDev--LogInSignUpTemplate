<?php

//import functions
require_once("functions.php");

// Create connection
$conn = startConnection("servername:portnumber", "DBusername", "DBpassword", "DBname");

$userEmail = " " ;
$userName = " " ;
$userPassword = " " ;
$userPasswordAgain = " " ;

//chech requset type sent from html 
if ($_SERVER["REQUEST_METHOD"]=="POST"){

// take user info from html form and hash them all
$userEmail = hashing(test_input($_POST["email"])) ;  
$userName = hashing(test_input($_POST["fullname"])) ;  
$userPassword = hashing(test_input($_POST["password"])) ;  

//adding new record to database
$sql = "INSERT INTO users
            (fullname, email, password)
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
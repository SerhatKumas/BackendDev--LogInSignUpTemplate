<?php

//import functions
require_once("functions.php");

// Create connection
$conn = startConnection("servername:portnumber", "DBusername", "DBpassword", "DBname");

$userEmail = " " ;
$userPassword = " " ;

//chech requset type sent from html 
if ($_SERVER["REQUEST_METHOD"]=="POST"){

// take email from html form and hash it
$userEmail =hashing(test_input($_POST["email"]));
$userPassword =hashing(test_input($_POST["password"])) ;  

//check whether email is existed in database
$sql = "SELECT Password FROM users WHERE email='$userEmail'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

//if password entered correctly direct page to welcome
if($userPassword == $row['Password']){
  header("Location:../Html-files/welcome.html");
}
//if not send to login html and give warning
else{
  header("Location:../Html-files/login.html");
}
}

//closing database connection
$conn->close();

?>
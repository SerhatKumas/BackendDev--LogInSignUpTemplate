<?php

//import functions
require_once("functions.php");

// Create connection
$conn = startConnection("localhost:3308", "root", "", "deneme");

$userEmail = " " ;
$userPassword = " " ;

//chech requset type sent from html 
if ($_SERVER["REQUEST_METHOD"]=="POST"){

// take email from html form 
$userEmail = (test_input($_POST["email"]));
$userPassword = (test_input($_POST["password"])) ;  

//check whether email is existed in database
$sql = "SELECT password FROM users WHERE email='$userEmail'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

//if password entered correctly direct page to welcome
if($userPassword == $row['password']){

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
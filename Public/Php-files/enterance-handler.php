<?php

//import functions
require_once("functions.php");

// Create connection
$conn = startConnection("localhost:3308", "root", "", "deneme");

$userEmail= " ";

//chech requset type sent from html 
if ($_SERVER["REQUEST_METHOD"]=="POST"){

//take email from html form 
$userEmail = (test_input($_POST["email"])) ;  

//check whether email is existed in database
$sql = "SELECT email FROM users WHERE email='".$userEmail."'";
$result = $conn->query($sql);

//if email existed direct to the Log in Page
if ($result->num_rows > 0) {
  header("Location:../Html-files/logIn.html");
}
//if not existed direct to the sign up page
else{
  header("Location:../Html-files/signUp.html");
}

}

//close database conection
$conn->close();

?>
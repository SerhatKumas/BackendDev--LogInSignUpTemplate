<?php

$servername = "localhost:3325";
$username = "root";
$password = "";
$dbname = "loginproject";
$userEmail = " " ;
$userPassword = " " ;


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//chech requset type sent from html 
if ($_SERVER["REQUEST_METHOD"]=="POST"){

// take email from html form
$userEmail = test_input($_POST["email"]) ;
$userPassword = test_input($_POST["password"]) ;  

//check whether email is existed in database
$sql = "SELECT Password FROM users WHERE email='".$userEmail."'";
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

//function that clans string from unwanted chars
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>
<?php

$servername = "serveername:portnumber";// add port number if needed
$username = "username";
$password = "";
$dbname = "databaseName";
$userEmail = " " ;


// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//chech requset typw sent from html 
if ($_SERVER["REQUEST_METHOD"]=="POST"){

// take email from html form
$userEmail = test_input($_POST["email"]) ;  

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

//function that clans string from unwanted chars
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>
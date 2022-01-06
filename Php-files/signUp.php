<?php
$servername = "servername:portnumber";// add port number if needed
$username = "username";
$password = "";
$dbname = "databaseName";
$userEmail = " " ;
$userName = " " ;
$userPassword = " " ;
$userPasswordAgain = " " ;


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
$userName = test_input($_POST["fullname"]) ;  
$userPassword = test_input($_POST["password"]) ;  

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

//function that clans string from unwanted chars
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
?>
<?php

//function that initiates db connections
function startConnection($servername, $username, $password,$dbname){
    
  // Create connection
  $conn = new mysqli($servername, $username, $password,$dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
      }
  
      return $conn;
  }

//function that clans string from unwanted chars
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>
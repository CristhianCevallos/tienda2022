<?php
$servername = "localhost";
$username = "root";
$pwd = "";
$bdd = "tienda";

// Create connection
$conn = new mysqli($servername, $username, $pwd, $bdd);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>
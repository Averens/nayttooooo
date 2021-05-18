 <?php
 
$servername = "localhost";
$username_mysql = "root";
$password_mysql = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username_mysql, $password_mysql, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?> 


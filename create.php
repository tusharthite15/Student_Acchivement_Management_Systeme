<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sakshi";

$usernames = $_GET['username'];
$pass = $_GET['pass'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO users (username, pass, types)
VALUES ('$usernames', '$pass', 'Student')";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;
  header("Location: ./admin.php"); 
  exit();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
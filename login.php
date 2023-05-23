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

$sql = "SELECT * FROM users WHERE username='$usernames' AND pass='$pass' AND types='Student'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    header("Location: ./student.php?user=".$row['id']."&name=".$row['username'].""); 
    exit();
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
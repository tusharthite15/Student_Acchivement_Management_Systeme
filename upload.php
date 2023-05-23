<?php


// Replace with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sakshi";

// Create a new MySQLi instance
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the student ID and name
    $studentID = $_POST["studentID"];
    $studentName = $_POST["filename"];
    $name = $_POST["name"];

    // Process the uploaded file
    $targetDir = "uploads/"; // Replace with your desired folder path
    $targetFile = $targetDir . basename($_FILES["certificate"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is an image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["certificate"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if the file already exists
    if (file_exists($targetFile)) {
        echo "File already exists.";
        $uploadOk = 0;
    }

    // Check file size (optional)
    if ($_FILES["certificate"]["size"] > 500000) {
        echo "File is too large.";
        $uploadOk = 0;
    }

    // Allow only certain file formats (optional)
    if (
        $imageFileType != "jpg" && $imageFileType != "jpeg" &&
        $imageFileType != "png" && $imageFileType != "pdf"
    ) {
        echo "Only JPG, JPEG, PNG, and PDF files are allowed.";
        $uploadOk = 0;
    }

    // If the file passed all the checks, move it to the target directory
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["certificate"]["tmp_name"], $targetFile)) {
            // File upload successful, now insert the record into the database
            $sql = "INSERT INTO uploads (student_id, name, path) VALUES (?, ?, ?)";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("sss", $studentID, $studentName, $targetFile);
            if ($stmt->execute()) {
                echo "Record inserted successfully.";
                header("Location: ./student.php?user=".$studentID."&name=".$name.""); 
            } else {
                echo "Error inserting record: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error moving file.";
        }
    }
}

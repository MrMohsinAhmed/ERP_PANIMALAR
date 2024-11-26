<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assignment_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sender_name = $_POST['sender_name'];
$message = $_POST['message'];
$date = $_POST['date'];
$file_path = '';

if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
    $file_name = basename($_FILES['file']['name']);
    $file_tmp_name = $_FILES['file']['tmp_name'];
    $file_path = 'uploads/' . $file_name;

    if (move_uploaded_file($file_tmp_name, $file_path)) {
        // File uploaded successfully
    } else {
        echo "File upload failed.";
        exit;
    }
}

$sql = "INSERT INTO assignments (sender_name, message, date, file_path) VALUES ('$sender_name', '$message', '$date', '$file_path')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: all-assignments.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

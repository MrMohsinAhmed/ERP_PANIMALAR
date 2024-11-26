<?php
// Database connection
$servername = "localhost"; // Change if necessary
$username = "root"; // Change if necessary
$password = ""; // Change if necessary
$dbname = "notice_board";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$sender_name = $_POST['sender_name'];
$job_description = $_POST['job_description'];
$eligible_criteria = $_POST['eligible_criteria'];
$ctc = $_POST['ctc'];
$date = $_POST['date'];
$apply_link = $_POST['apply_link'];
$file = $_FILES['file']['name'];

// Handle file upload
if ($file) {
    move_uploaded_file($_FILES['file']['tmp_name'], "uploads/" . $file);
}

// Insert into database
$stmt = $conn->prepare("INSERT INTO notices (sender_name, job_description, eligible_criteria, ctc, date, file, apply_link) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $sender_name, $job_description, $eligible_criteria, $ctc, $date, $file, $apply_link);

if ($stmt->execute()) {
    echo "<script>alert('Notice submitted successfully.'); window.location.href='display.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

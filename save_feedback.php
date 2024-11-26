<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_feedback";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$roll_number = $_POST['roll_number'];
$student_name = $_POST['student_name'];
$semester = $_POST['semester'];
$message = $_POST['message'];

// Insert data into the database
$sql = "INSERT INTO feedback (roll_number, student_name, semester, message)
        VALUES ('$roll_number', '$student_name', '$semester', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Feedback submitted successfully!'); window.location.href='feedback_form.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

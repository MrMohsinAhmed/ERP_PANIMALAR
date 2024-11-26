<?php
// Database connection
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "exam_duty";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$staff_name = $_POST['staff_name'];
$degree = $_POST['degree'];
$designation = $_POST['designation'];
$duty_type = $_POST['duty_type'];
$duty_date = $_POST['duty_date'];

// Insert data into the table
$sql = "INSERT INTO duties (staff_name, degree, designation, duty_type, duty_date) 
        VALUES ('$staff_name', '$degree', '$designation', '$duty_type', '$duty_date')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Exam duty assigned successfully!'); window.location.href='exam_duty_form.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

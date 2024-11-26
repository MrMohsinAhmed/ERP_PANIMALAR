<?php
// save_subject.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$subject_code = $_POST['subject_code'];
$subject_name = $_POST['subject_name'];
$subject_type = $_POST['subject_type'];
$subject_faculty = $_POST['subject_faculty'];
$subject_notes = $_POST['subject_notes'];
$semester_number = $_POST['semester_number'];

$sql = "INSERT INTO subjects (subject_code, subject_name, subject_type, subject_faculty, subject_notes, semester_number) 
VALUES ('$subject_code', '$subject_name', '$subject_type', '$subject_faculty', '$subject_notes', $semester_number)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exam_timetable";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => "Connection failed: " . $conn->connect_error]));
}

$exam_type = $_POST['exam_type'];
$subject_code = $_POST['subject_code'];
$subject_name = $_POST['subject_name'];
$subject_type = $_POST['subject_type'];
$semester = $_POST['semester'];
$exam_date = $_POST['exam_date'];

$sql = "INSERT INTO exam_timetable (exam_type, subject_code, subject_name, subject_type, semester, exam_date)
VALUES ('$exam_type', '$subject_code', '$subject_name', '$subject_type', '$semester', '$exam_date')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true, 'message' => "New record created successfully"]);
} else {
    echo json_encode(['success' => false, 'message' => "Error: " . $sql . "<br>" . $conn->error]);
}

$conn->close();
?>

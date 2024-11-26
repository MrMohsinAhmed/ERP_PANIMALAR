<?php
$servername = "localhost"; // Replace with your server details
$username = "root"; // Replace with your username
$password = ""; // Replace with your password
$dbname = "your_database_name"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$semester = $_POST['semester'];

// Prepare and execute the query
$sql = "SELECT subject_code, subject_name, subject_type, subject_faculty, subject_notes FROM class_timetable WHERE semester = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $semester);
$stmt->execute();
$result = $stmt->get_result();

// Fetch results and return as JSON
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);

$stmt->close();
$conn->close();
?>

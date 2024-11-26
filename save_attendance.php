<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_attendance";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$roll_number = $_POST['roll_number'];
$student_name = $_POST['student_name'];
$attendance = [];

for ($i = 1; $i <= 31; $i++) {
    $attendance["day$i"] = $_POST["day$i"];
}

// Insert data into the database
$sql = "INSERT INTO attendance (roll_number, student_name, " . implode(", ", array_keys($attendance)) . ") VALUES (?, ?, " . str_repeat("?, ", 30) . "?)";

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

$params = array_merge([$roll_number, $student_name], array_values($attendance));
$types = str_repeat('s', count($params));
$stmt->bind_param($types, ...$params);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "faculty_duties";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$faculty_name = $_POST['faculty_name'];
$designation = $_POST['designation'];
$duty = $_POST['duty'];
$duty_date = $_POST['duty_date'];

$sql = "INSERT INTO duties (faculty_name, designation, duty, duty_date) VALUES ('$faculty_name', '$designation', '$duty', '$duty_date')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.html?status=success");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

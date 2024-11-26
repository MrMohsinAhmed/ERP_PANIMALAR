<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CollegeTimetable";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$year = isset($_POST['year']) ? $_POST['year'] : '';
$section = isset($_POST['section']) ? $_POST['section'] : '';
$day = isset($_POST['day']) ? $_POST['day'] : '';
$period1 = isset($_POST['period1']) ? $_POST['period1'] : '';
$period2 = isset($_POST['period2']) ? $_POST['period2'] : '';
$period3 = isset($_POST['period3']) ? $_POST['period3'] : '';
$period4 = isset($_POST['period4']) ? $_POST['period4'] : '';
$period5 = isset($_POST['period5']) ? $_POST['period5'] : '';
$period6 = isset($_POST['period6']) ? $_POST['period6'] : '';
$period7 = isset($_POST['period7']) ? $_POST['period7'] : '';
$period8 = isset($_POST['period8']) ? $_POST['period8'] : '';

$sql = "INSERT INTO timetable (year, section, day, period1, period2, period3, period4, period5, period6, period7, period8)
        VALUES ('$year', '$section', '$day', '$period1', '$period2', '$period3', '$period4', '$period5', '$period6', '$period7', '$period8')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

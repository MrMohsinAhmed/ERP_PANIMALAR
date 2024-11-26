<?php
// Database connection
$host = 'localhost';
$dbname = 'college_timetable';
$user = 'root';
$pass = '';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $faculty_name = $_POST['faculty_name'];
    $day = $_POST['day'];
    $time_1 = $_POST['time_1'];
    $time_2 = $_POST['time_2'];
    $time_3 = $_POST['time_3'];
    $time_4 = $_POST['time_4'];
    $time_5 = $_POST['time_5'];
    $time_6 = $_POST['time_6'];
    $time_7 = $_POST['time_7'];
    $time_8 = $_POST['time_8'];

    $sql = "INSERT INTO timetable (faculty_name, day, time_1, time_2, time_3, time_4, time_5, time_6, time_7, time_8) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$faculty_name, $day, $time_1, $time_2, $time_3, $time_4, $time_5, $time_6, $time_7, $time_8]);

    echo 'Timetable inserted successfully';
}
?>

<?php
// Database connection
$host = 'localhost';
$dbname = 'college_timetable';
$user = 'root';
$pass = '';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

$sql = "SELECT * FROM timetable";
$stmt = $conn->query($sql);
$data = '';

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data .= '<tr>
                <td>' . htmlspecialchars($row['faculty_name']) . '</td>
                <td>' . htmlspecialchars($row['day']) . '</td>
                <td>' . htmlspecialchars($row['time_1']) . '</td>
                <td>' . htmlspecialchars($row['time_2']) . '</td>
                <td>' . htmlspecialchars($row['time_3']) . '</td>
                <td>' . htmlspecialchars($row['time_4']) . '</td>
                <td>' . htmlspecialchars($row['time_5']) . '</td>
                <td>' . htmlspecialchars($row['time_6']) . '</td>
                <td>' . htmlspecialchars($row['time_7']) . '</td>
                <td>' . htmlspecialchars($row['time_8']) . '</td>
            </tr>';
}

echo $data;
?>

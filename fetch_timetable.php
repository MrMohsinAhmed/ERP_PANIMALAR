<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CollegeTimetable";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$year = isset($_GET['year']) ? $_GET['year'] : '';
$section = isset($_GET['section']) ? $_GET['section'] : '';

if (!empty($year) && !empty($section)) {
    $sql = "SELECT * FROM timetable WHERE year='$year' AND section='$section'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["day"] . "</td>
                    <td>" . $row["period1"] . "</td>
                    <td>" . $row["period2"] . "</td>
                    <td>" . $row["period3"] . "</td>
                    <td>" . $row["period4"] . "</td>
                    <td>" . $row["period5"] . "</td>
                    <td>" . $row["period6"] . "</td>
                    <td>" . $row["period7"] . "</td>
                    <td>" . $row["period8"] . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='9'>No records found</td></tr>";
    }
} else {
    echo "<tr><td colspan='9'>No records found</td></tr>";
}

$conn->close();
?>

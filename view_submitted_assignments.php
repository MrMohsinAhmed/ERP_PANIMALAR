<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assignment_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ss.id, ss.student_name, ss.roll_number, ss.submission_date, ss.submitted_file, a.assignment_name
        FROM student_submissions ss
        JOIN assignments a ON ss.assignment_id = a.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><br>
    <title>View Student Submissions</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2>Submitted Assignments</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Assignment Name</th>
                <th>Student Name</th>
                <th>Roll Number</th>
                <th>Date of Submission</th>
                <th>Submitted Assignment</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['assignment_name'] . "</td>";
                echo "<td>" . $row['student_name'] . "</td>";
                echo "<td>" . $row['roll_number'] . "</td>";
                echo "<td>" . $row['submission_date'] . "</td>";
                echo "<td><a href='student_submissions/" . $row['submitted_file'] . "' download>Assignment</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No submissions available.</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>

<?php
$conn->close();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assignment_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $assignment_id = $_POST['assignment_id'];
    $student_name = $_POST['student_name'];
    $roll_number = $_POST['roll_number'];
    
    $submitted_file = $_FILES['submitted_file']['name'];
    $target_dir = "student_submissions/";

    // Check if the directory exists; if not, create it.
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["submitted_file"]["name"]);

    if (move_uploaded_file($_FILES["submitted_file"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO student_submissions (assignment_id, student_name, roll_number, submitted_file)
                VALUES ('$assignment_id', '$student_name', '$roll_number', '$submitted_file')";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the same page to avoid resubmission
            header("Location: student_view_assignments.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$sql = "SELECT * FROM assignments";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><br>
    <title>View Assignments</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2>Available Assignments</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Assignment Name</th>
                <th>Sender Name</th>
                <th>Section</th>
                <th>Year</th>
                <th>Last Date of Submission</th>
                <th>Assignment File</th>
                <th>Submit Your Assignment</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['assignment_name'] . "</td>";
                echo "<td>" . $row['sender_name'] . "</td>";
                echo "<td>" . $row['section'] . "</td>";
                echo "<td>" . $row['year'] . "</td>";
                echo "<td>" . $row['submission_deadline'] . "</td>";
                echo "<td><a href='uploads/" . $row['assignment_file'] . "' download>Download</a></td>";
                echo "<td>
                        <form method='post' enctype='multipart/form-data'>
                            <input type='hidden' name='assignment_id' value='" . $row['id'] . "'>
                            <div class='form-group'>
                                <input type='text' class='form-control' name='student_name' placeholder='Your Name' required>
                            </div>
                            <div class='form-group'>
                                <input type='text' class='form-control' name='roll_number' placeholder='Your Roll Number' required>
                            </div>
                            <div class='form-group'>
                                <input type='file' class='form-control-file' name='submitted_file' required>
                            </div>
                            <button type='submit' class='btn btn-success'>Upload Assignment</button>
                        </form>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No assignments available.</td></tr>";
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

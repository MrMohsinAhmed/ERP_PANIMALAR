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
    $assignment_name = $_POST['assignment_name'];
    $sender_name = $_POST['sender_name'];
    $section = $_POST['section'];
    $year = $_POST['year'];
    $submission_deadline = $_POST['submission_deadline'];
    $assignment_file = $_FILES['assignment_file']['name'];
    $target_dir = "uploads/";

    // Check if the directory exists; if not, create it.
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["assignment_file"]["name"]);

    if (move_uploaded_file($_FILES["assignment_file"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO assignments (assignment_name, sender_name, section, year, submission_deadline, assignment_file)
                VALUES ('$assignment_name', '$sender_name', '$section', '$year', '$submission_deadline', '$assignment_file')";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the same page to avoid resubmission
            header("Location: staff_upload_assignment.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Upload Assignment</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2>Upload Assignment</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="assignment_name">Assignment Name</label>
            <input type="text" class="form-control" id="assignment_name" name="assignment_name" required>
        </div>
        <div class="form-group">
            <label for="sender_name">Sender Name</label>
            <input type="text" class="form-control" id="sender_name" name="sender_name" required>
        </div>
        <div class="form-group">
            <label for="section">Section</label>
            <input type="text" class="form-control" id="section" name="section" required>
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="text" class="form-control" id="year" name="year" required>
        </div>
        <div class="form-group">
            <label for="submission_deadline">Submission Deadline</label>
            <input type="date" class="form-control" id="submission_deadline" name="submission_deadline" required>
        </div>
        <div class="form-group">
            <label for="assignment_file">Assignment File</label>
            <input type="file" class="form-control-file" id="assignment_file" name="assignment_file" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload Assignment</button>
    </form>
</div>
</body>
</html>

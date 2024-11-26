<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection
    $conn = new mysqli('localhost', 'username', 'password', 'college_notice_board');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sender_name = $_POST['sender_name'];
    $job_description = $_POST['job_description'];
    $eligibility_criteria = $_POST['eligibility_criteria'];
    $ctc = $_POST['ctc'];
    $notice_date = $_POST['notice_date'];
    $apply_link = $_POST['apply_link'];
    
    // Handle file upload
    if (isset($_FILES['file'])) {
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_path = "uploads/" . basename($file_name);

        if (move_uploaded_file($file_tmp, $file_path)) {
            $stmt = $conn->prepare("INSERT INTO notices (sender_name, job_description, eligibility_criteria, ctc, notice_date, file_path, apply_link) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $sender_name, $job_description, $eligibility_criteria, $ctc, $notice_date, $file_path, $apply_link);
            $stmt->execute();
            $stmt->close();
            echo "<script>alert('Notice created successfully!');</script>";
        } else {
            echo "<script>alert('File upload failed!');</script>";
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/bootstrap.min.css">
    <title>Create Notice</title>
</head>
<body>
    <div class="container">
        <h3>Create a Notice</h3>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Sender Name</label>
                <input type="text" name="sender_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Job Description</label>
                <textarea name="job_description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Eligibility Criteria</label>
                <textarea name="eligibility_criteria" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>CTC</label>
                <input type="text" name="ctc" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Date</label>
                <input type="date" name="notice_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Upload File</label>
                <input type="file" name="file" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Apply Link</label>
                <input type="url" name="apply_link" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
</body>
</html>

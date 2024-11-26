<?php
include 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sender = $_POST['sender'];
    $job_description = $_POST['job_description'];
    $eligibility_criteria = $_POST['eligibility_criteria'];
    $ctc = $_POST['ctc'];
    $date = $_POST['date'];
    $apply_link = $_POST['apply_link'];

    // File upload handling
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size (5MB limit)
    if ($_FILES["file"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only certain file formats
    if ($fileType != "pdf" && $fileType != "doc" && $fileType != "docx") {
        echo "Sorry, only PDF, DOC & DOCX files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // If everything is ok, try to upload file
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            // Insert data into the database
            $sql = "INSERT INTO notices (sender, job_description, eligibility_criteria, ctc, date, file, apply_link) VALUES ('$sender', '$job_description', '$eligibility_criteria', '$ctc', '$date', '$target_file', '$apply_link')";

            if ($conn->query($sql) === TRUE) {
                echo "Notice created successfully.";
                header("Location: notice_board.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>

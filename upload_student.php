<?php
$host = 'localhost';
$dbname = 'student_db';
$username = 'root'; // change this if necessary
$password = ''; // change this if necessary

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$roll_number = $_POST['roll_number'];
$student_name = $_POST['student_name'];
$gender = $_POST['gender'];
$year = $_POST['year'];
$section = $_POST['section'];
$parent_name = $_POST['parent_name'];
$address = $_POST['address'];
$dob = $_POST['dob'];
$contact_number = $_POST['contact_number'];
$parent_contact_number = $_POST['parent_contact_number'];
$student_email_id = $_POST['student_email_id'];

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["student_docs"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file is a valid document
$allowed_types = array('pdf', 'doc', 'docx');
if (!in_array($fileType, $allowed_types)) {
    echo "Sorry, only PDF, DOC & DOCX files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["student_docs"]["tmp_name"], $target_file)) {
        $stmt = $conn->prepare("INSERT INTO students (roll_number, student_name, gender, year, section, parent_name, address, dob, contact_number, parent_contact_number, student_email_id, student_docs) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssss", $roll_number, $student_name, $gender, $year, $section, $parent_name, $address, $dob, $contact_number, $parent_contact_number, $student_email_id, $target_file);

        if ($stmt->execute()) {
            echo "Record added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn->close();
?>

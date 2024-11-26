<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $facultyname = $_POST['facultyname'];
    $degree = $_POST['degree'];
    $design = $_POST['design'];
    $doj = date('Y-m-d', strtotime($_POST['doj']));
    $email = $_POST['email'];
    $number = $_POST['number'];
    $scopus = $_POST['scopus'];
    
    // File upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["docs"]["name"]);
    $uploadOk = 1;
    $docs = ""; // Initialize the $docs variable

    if (isset($_FILES["docs"]) && $_FILES["docs"]["error"] == 0) {
        if (move_uploaded_file($_FILES["docs"]["tmp_name"], $target_file)) {
            $docs = $target_file;
        } else {
            $uploadOk = 0;
            $message = "Sorry, there was an error uploading your file.";
        }
    } else {
        $uploadOk = 0;
        $message = "No file was uploaded or there was an error uploading the file.";
    }

    if ($uploadOk == 1) {
        $sql = "INSERT INTO faculty (facultyname, degree, design, doj, email, number, scopus, docs) VALUES ('$facultyname', '$degree', '$design', '$doj', '$email', '$number', '$scopus', '$docs')";

        if ($conn->query($sql) === TRUE) {
            $message = "New record created successfully";
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();

    // Redirect back to the form with the message
    header("Location: add-teacher.html?message=" . urlencode($message));
    exit();
}
?>

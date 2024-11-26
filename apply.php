<?php
$servername = "localhost"; // Your database server
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "college_placement"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST['student_name'];
    $register_number = $_POST['register_number'];
    $branch = $_POST['branch'];
    $notice_id = $_POST['notice_id']; // Assuming you are passing this from the notice detail
    $job_roll = ''; // Variable to hold job roll

    // Get the job_roll from the notices table based on notice_id
    $job_roll_query = "SELECT job_roll FROM notices WHERE id = ?";
    $stmt = $conn->prepare($job_roll_query);
    $stmt->bind_param("i", $notice_id);
    $stmt->execute();
    $stmt->bind_result($job_roll);
    $stmt->fetch();
    $stmt->close();

    // Now insert into applications table
    $insert_query = "INSERT INTO applications (student_name, register_number, branch, notice_id, job_roll) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("sssis", $student_name, $register_number, $branch, $notice_id, $job_roll);

    if ($stmt->execute()) {
        echo "Application submitted successfully!";
    } else {
        echo "Error submitting application: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>

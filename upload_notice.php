<?php
$servername = "localhost"; // Your database server
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "college_placement"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_role = $_POST['job_role'];
    $ctc = $_POST['ctc'];
    $company_name = $_POST['company_name'];
    $job_description = $_POST['job_description'];
    $branch = $_POST['branch'];
    $deadline = $_POST['deadline'];

    $sql = "INSERT INTO notices (job_role, ctc, company_name, job_description, branch, deadline) VALUES ('$job_role', '$ctc', '$company_name', '$job_description', '$branch', '$deadline')";

    if ($conn->query($sql) === TRUE) {
        echo "Notice uploaded successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

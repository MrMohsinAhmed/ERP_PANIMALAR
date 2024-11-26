<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patents";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patent_number = $_POST['patent_number'];
    $name = $_POST['name'];
    $year = $_POST['year'];
    $contact_number = $_POST['contact_number'];
    $author_email = $_POST['author_email'];
    
    // Handle file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["patent_link"]["name"]);
    move_uploaded_file($_FILES["patent_link"]["tmp_name"], $target_file);

    $patent_link = $target_file;

    $sql = "INSERT INTO patents (patent_number, name, year, contact_number, author_email, patent_link) VALUES ('$patent_number', '$name', '$year', '$contact_number', '$author_email', '$patent_link')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

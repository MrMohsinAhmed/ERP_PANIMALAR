<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college_emails";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if a file is uploaded
    if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] == 0) {
        $file_tmp = $_FILES['csv_file']['tmp_name'];
        $file = fopen($file_tmp, 'r');

        // Skip the first row if it's a header
        fgetcsv($file);

        // Loop through the CSV and insert data into the database
        while (($row = fgetcsv($file, 1000, ",")) !== FALSE) {
            $name = $row[0];
            $email = $row[1];
            $year = $row[2];
            $section = $row[3];
            $passed_out_year = $row[4];

            // Prepare and insert into students table
            $stmt = $conn->prepare("INSERT INTO students (name, email, year, section, passed_out_year) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssiss", $name, $email, $year, $section, $passed_out_year);

            $stmt->execute();
        }

        fclose($file);
        header("Location: index.php"); // Redirect to index.php to show the data
        exit();
    } else {
        echo "Error: Please upload a valid CSV file.";
    }
}

$conn->close();
?>

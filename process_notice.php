<?php
$servername = "localhost"; // Your database server
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "notice_board_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sender = $_POST['sender'];
    $message = $_POST['message'];
    $date = $_POST['date'];
    $description = $_POST['description'];
$eligibility_criteria = $_POST['eligibility_criteria'];
$ctc = $_POST['ctc'];
    
    // Handle file upload
    $file = $_FILES['file'];
    $fileName = basename($file['name']);
    $fileTmpName = $file['tmp_name'];
    $fileDestination = 'uploads/' . $fileName;

    // Move the uploaded file to the 'uploads' directory
    if (move_uploaded_file($fileTmpName, $fileDestination)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO notices (sender, message, date,description, eligibility_criteria, ctc, file) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssss", $sender, $message, $date, $description, $eligibility_criteria, $ctc, $fileName);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Notice added successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        // Close the statement
        $stmt->close();
    } else {
        echo "Error uploading file.";
    }
}

// Close the connection
$conn->close();
?>

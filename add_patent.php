<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "patents");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request is AJAX
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['patent_number'])) {
    $patent_number = $conn->real_escape_string($_POST['patent_number']);
    $name = $conn->real_escape_string($_POST['name']);
    $year = $conn->real_escape_string($_POST['year']);
    $contact_number = $conn->real_escape_string($_POST['contact_number']);
    $author_email = $conn->real_escape_string($_POST['author_email']);
    
    // Handling file upload
    if (isset($_FILES['patent_link'])) {
        $file = $_FILES['patent_link'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExt = strtolower(end(explode('.', $fileName)));
        $allowed = array('jpg', 'jpeg', 'png', 'pdf'); // Example allowed file types

        if (in_array($fileExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) { // Limit file size to 1MB
                    $fileNameNew = uniqid('', true) . "." . $fileExt;
                    $fileDestination = 'uploads/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $patent_link = $fileDestination;
                } else {
                    $response = array('status' => 'error', 'message' => 'File size too big.');
                    echo json_encode($response);
                    exit();
                }
            } else {
                $response = array('status' => 'error', 'message' => 'Error uploading file.');
                echo json_encode($response);
                exit();
            }
        } else {
            $response = array('status' => 'error', 'message' => 'Invalid file type.');
            echo json_encode($response);
            exit();
        }
    } else {
        $patent_link = ''; // Handle cases where no file is uploaded
    }

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO patents (patent_number, name, year, contact_number, author_email, patent_link) 
            VALUES ('$patent_number', '$name', '$year', '$contact_number', '$author_email', '$patent_link')";

    if ($conn->query($sql) === TRUE) {
        $response = array('status' => 'success', 'message' => 'Patent added successfully.');
    } else {
        $response = array('status' => 'error', 'message' => 'Error: ' . $conn->error);
    }

    // Send JSON response
    echo json_encode($response);
    exit(); // Ensure no further HTML is output
}

$conn->close();
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Patent</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h3 class="text-center mb-4">Add Patent</h3>
                <form id="patent-form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="patent_number">Patent Number</label>
                        <input type="text" id="patent_number" name="patent_number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="text" id="year" name="year" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_number">Contact Number</label>
                        <input type="text" id="contact_number" name="contact_number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="author_email">Author E-mail ID</label>
                        <input type="email" id="author_email" name="author_email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="patent_link">Patent Link</label>
                        <input type="file" id="patent_link" name="patent_link" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function() {
            $('#patent-form').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: 'add_patent.php', // Ensure this points to the same page for AJAX submission
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data.status === 'success') {
                            alert(data.message); // Use alert for success message
                        } else {
                            alert(data.message); // Use alert for error message
                        }
                    },
                    error: function() {
                        alert('An error occurred.');
                    }
                });
            });
        });
    </script>
</body>

</html>

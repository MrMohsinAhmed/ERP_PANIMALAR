<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "research_papers";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['paper_file'])) {
    $paperId = $_POST['paper_id'];
    $authorName = $_POST['author_name'];
    $coAuthors = [
        $_POST['co_author1'],
        $_POST['co_author2'],
        $_POST['co_author3'],
        $_POST['co_author4']
    ];
    $year = $_POST['year'];
    $dateOfPublish = $_POST['date_of_publish'];
    $authorEmail = $_POST['author_email'];
    $file = $_FILES['paper_file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    // Validate file
    $allowed = array('pdf' => 'application/pdf', 'doc' => 'application/msword', 'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'ppt' => 'application/vnd.ms-powerpoint', 'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'xls' => 'application/vnd.ms-excel', 'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
    if (!array_key_exists($fileExt, $allowed)) {
        die("Error: Please upload a valid file.");
    }

    if ($fileError === 0) {
        if ($fileSize < 10000000) { // 10 MB
            $fileDestination = 'uploads/' . $fileName;
            move_uploaded_file($fileTmpName, $fileDestination);

            // Insert file info into the database
            $coAuthorsStr = implode(', ', $coAuthors);
            $sql = "INSERT INTO papers (paper_id, author_name, co_authors, year, date_of_publish, author_email, file_path) VALUES ('$paperId', '$authorName', '$coAuthorsStr', '$year', '$dateOfPublish', '$authorEmail', '$fileDestination')";
            if ($conn->query($sql) === TRUE) {
                echo "File uploaded successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error: Your file is too big.";
        }
    } else {
        echo "Error: There was an error uploading your file.";
    }
}

// Display table
$sql = "SELECT * FROM papers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research Papers</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Research Papers</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Co-authors</th>
                <th>Year</th>
                <th>Date of Publish</th>
                <th>Author Email</th>
                <th>Paper Link</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["paper_id"] . "</td>
                            <td>" . $row["author_name"] . "</td>
                            <td>" . $row["co_authors"] . "</td>
                            <td>" . $row["year"] . "</td>
                            <td>" . $row["date_of_publish"] . "</td>
                            <td>" . $row["author_email"] . "</td>
                            <td><a href='" . $row["file_path"] . "' target='_blank'>Paper Link</a></td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No papers found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>

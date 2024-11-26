<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $link = $_POST['link'] ?? null;
    $filePath = null;

    // File upload handling
    if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $fileName = basename($_FILES['file']['name']);
        $filePath = $uploadDir . $fileName;
        
        // Make sure the uploads directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Create directory if it doesn't exist
        }

        move_uploaded_file($_FILES['file']['tmp_name'], $filePath);
    }

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'news_website');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert news into the database
    $stmt = $conn->prepare("INSERT INTO news (title, content, file_path, link) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $content, $filePath, $link);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    
    // Redirect to avoid form resubmission
    header("Location: admin.php?success=1");
    exit(); // Ensure no further code is executed after redirection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Add News</h2>

        <!-- Display success message -->
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success">News added successfully!</div>
        <?php endif; ?>

        <form action="admin.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Link (Optional)</label>
                <input type="url" class="form-control" id="link" name="link">
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">File Upload (Optional)</label>
                <input type="file" class="form-control" id="file" name="file">
            </div>
            <button type="submit" class="btn btn-primary">Add News</button>
        </form>
    </div>
</body>
</html>

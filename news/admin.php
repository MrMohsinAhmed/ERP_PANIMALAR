<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'news_website');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete news if 'delete' is set in the URL
if (isset($_GET['delete'])) {
    $newsId = $_GET['delete'];

    // Optional: Fetch file path to delete the file from the server
    $fileResult = $conn->query("SELECT file_path FROM news WHERE id = $newsId");
    $file = $fileResult->fetch_assoc();
    if ($file && $file['file_path']) {
        unlink($file['file_path']); // Delete the file from the server if it exists
    }

    // Delete the news item from the database
    $conn->query("DELETE FROM news WHERE id = $newsId");

    // Redirect to avoid the repeated GET request issue (just like form submission)
    header("Location: admin.php?deleted=1");
    exit();
}

// Fetch all news items
$result = $conn->query("SELECT * FROM news ORDER BY created_at DESC");
$newsItems = [];
while ($row = $result->fetch_assoc()) {
    $newsItems[] = $row;
}
$conn->close();
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

        <!-- Display success or delete message -->
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success">News added successfully!</div>
        <?php endif; ?>
        <?php if (isset($_GET['deleted'])): ?>
            <div class="alert alert-danger">News deleted successfully!</div>
        <?php endif; ?>

        <!-- Form to add news -->
        <form action="admin.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Enter the notice & news title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" placeholder="Enter the content" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Link (Optional)</label>
                <input type="url" class="form-control" id="link" placeholder="Enter the link here" name="link">
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">File Upload (Optional)</label>
                <input type="file" class="form-control" id="file" name="file">
            </div>
            <button type="submit" class="btn btn-primary">Add News</button>
        </form>

        <!-- Display existing news -->
        <h2 class="mt-5">Existing News</h2>
        <table class="table table-bordered">
            <thead style="text-align:center;">
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($newsItems)): ?>
                    <?php foreach ($newsItems as $news): ?>
                        <tr>
                            <td><?php echo $news['title']; ?></td>
                            <td><?php echo $news['content']; ?></td>
                            <td>
                                <!-- Add delete button -->
                                <a href="admin.php?delete=<?php echo $news['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this news?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">No news available.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

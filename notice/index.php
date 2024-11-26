<?php
include 'db.php'; // Include database connection

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sender_name = $_POST['sender_name'];
    $job_description = $_POST['job_description'];
    $ctc = $_POST['ctc'];
    $company_name = $_POST['company_name'];
    $date = $_POST['date'];
    $apply_link = $_POST['apply_link'];
    $file = '';

    // Handle file upload
    if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];
        
        $uploadFileDir = './uploads/';
        $dest_path = $uploadFileDir . $fileName;

        // Move the file to the uploads directory
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $file = $fileName;
        }
    }

    // Insert notice into the database
    $stmt = $conn->prepare("INSERT INTO notices (sender_name, job_description, ctc, company_name, date, file, apply_link) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $sender_name, $job_description, $ctc, $company_name, $date, $file, $apply_link);
    $stmt->execute();
    $stmt->close();
}

// Fetch notices
$sql = "SELECT * FROM notices ORDER BY date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Notice Board</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <!-- Add Notice Area Start Here -->
            <div class="col-4">
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Create A Notice</h3>
                            </div>
                        </div>
                        <form class="new-added-form" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12 form-group">
                                    <label>Sender</label>
                                    <input type="text" name="sender_name" placeholder="Enter the sender detail" class="form-control" required>
                                </div>
                                <div class="col-12 form-group">
                                    <label>Job Description</label>
                                    <input type="text" name="job_description" placeholder="Type job description" class="form-control" required>
                                </div>
                                <div class="col-12 form-group">
                                    <label>CTC</label>
                                    <input type="text" name="ctc" placeholder="Enter CTC" class="form-control" required>
                                </div>
                                <div class="col-12 form-group">
                                    <label>Company Name</label>
                                    <input type="text" name="company_name" placeholder="Enter company name" class="form-control" required>
                                </div>
                                <div class="col-12 form-group">
                                    <label>Date</label>
                                    <input type="date" name="date" class="form-control" required>
                                </div>
                                <div class="col-12 form-group">
                                    <label>Upload the Document</label>
                                    <input type="file" name="file" class="form-control" required>
                                </div>
                                <div class="col-12 form-group">
                                    <label>Apply Link</label>
                                    <input type="url" name="apply_link" placeholder="Enter apply link" class="form-control" required>
                                </div>
                                <div class="col-12 form-group">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Add Notice Area End Here -->

            <!-- All Notice Area Start Here -->
            <div class="col-8">
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>NOTICE BOARD</h3>
                            </div>
                        </div><br>
                        <div class="notice-board-wrap">
                            <?php if ($result->num_rows > 0): ?>
                                <?php while($row = $result->fetch_assoc()): ?>
                                    <div class="notice-list">
                                        <div class="post-date bg-skyblue"><?php echo date("d M, Y", strtotime($row['date'])); ?></div>
                                        <h6 class="notice-title">
                                            <a href="#"><?php echo htmlspecialchars($row['job_description']); ?></a>
                                            <?php if (!empty($row['file'])): ?>
                                                <a href="uploads/<?php echo htmlspecialchars($row['file']); ?>" target="_blank" style="color: blue; text-decoration:underline;">Click here to view document</a>
                                            <?php endif; ?>
                                        </h6>
                                        <div class="entry-meta">
                                            Sender: <?php echo htmlspecialchars($row['sender_name']); ?> /
                                            Company: <?php echo htmlspecialchars($row['company_name']); ?> /
                                            CTC: <?php echo htmlspecialchars($row['ctc']); ?> /
                                            <span><?php echo date("g:i A", strtotime($row['date'])); ?> ago</span>
                                            <a href="<?php echo htmlspecialchars($row['apply_link']); ?>" class="btn btn-primary btn-sm" style="margin-left: 10px;">Click here to apply</a>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <p>No notices available.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- All Notice Area End Here -->
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>

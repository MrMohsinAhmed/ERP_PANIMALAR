<?php
// Database connection
$servername = "localhost"; // Change if necessary
$username = "root"; // Change if necessary
$password = ""; // Change if necessary
$dbname = "notice_board";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
        <h2>Notice Board</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Sender</th>
                    <th>Job Description</th>
                    <th>Eligible Criteria</th>
                    <th>CTC</th>
                    <th>Date</th>
                    <th>File</th>
                    <th>Apply</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['sender_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['job_description']); ?></td>
                            <td><?php echo htmlspecialchars($row['eligible_criteria']); ?></td>
                            <td><?php echo htmlspecialchars($row['ctc']); ?></td>
                            <td><?php echo htmlspecialchars($row['date']); ?></td>
                            <td>
                                <?php if ($row['file']): ?>
                                    <a href="uploads/<?php echo htmlspecialchars($row['file']); ?>">Click here</a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo htmlspecialchars($row['apply_link']); ?>" class="btn btn-primary">Click here to apply</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">No notices found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>

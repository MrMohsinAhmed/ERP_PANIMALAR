<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'student_exams');

if (isset($_GET['search'])) {
    $search = $_GET['search'];
} else {
    $search = '';
}

$query = "SELECT * FROM exam_percentages WHERE register_number LIKE ? OR student_name LIKE ?";
$stmt = $conn->prepare($query);
$searchTerm = '%' . $search . '%';
$stmt->bind_param('ss', $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Exam Percentages</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="my-4">View Exam Percentages</h2>
        <form method="GET" action="">
            <div class="form-group">
                <label for="search">Search by Register Number or Student Name:</label>
                <input type="text" class="form-control" id="search" name="search" value="<?php echo htmlspecialchars($search); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Register Number</th>
                    <th>Student Name</th>
                    <th>Semester Number</th>
                    <th>GPA</th>
                    <th>CGPA</th>
                    <th>History of Arrears</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['register_number']; ?></td>
                        <td><?php echo $row['student_name']; ?></td>
                        <td><?php echo $row['semester_number']; ?></td>
                        <td><?php echo $row['gpa']; ?></td>
                        <td><?php echo $row['cgpa']; ?></td>
                        <td><?php echo $row['history_of_arrears']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

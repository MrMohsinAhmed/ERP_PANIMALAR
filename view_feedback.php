<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_feedback";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get filter values
$filter_semester = isset($_GET['semester']) ? $_GET['semester'] : '';
$search_query = isset($_GET['search']) ? $_GET['search'] : '';

// SQL query with filters
$sql = "SELECT * FROM feedback WHERE 1=1";

if ($filter_semester !== '') {
    $sql .= " AND semester = '$filter_semester'";
}

if ($search_query !== '') {
    $sql .= " AND (roll_number LIKE '%$search_query%' OR student_name LIKE '%$search_query%')";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student Feedback</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>View Student Feedback</h2>
        <form method="GET" action="view_feedback.php" class="form-inline mb-3">
            <div class="form-group mr-3">
                <label for="search" class="mr-2">Search by Roll Number or Name:</label>
                <input type="text" class="form-control" id="search" name="search" value="<?php echo $search_query; ?>">
            </div>
            <div class="form-group mr-3">
                <label for="semester" class="mr-2">Filter by Semester:</label>
                <select class="form-control" id="semester" name="semester">
                    <option value="">All Semesters</option>
                    <?php for ($i = 1; $i <= 8; $i++): ?>
                        <option value="<?php echo $i; ?>" <?php echo ($filter_semester == $i) ? 'selected' : ''; ?>>
                            Semester <?php echo $i; ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Apply Filters</button>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Roll Number</th>
                    <th>Student Name</th>
                    <th>Semester</th>
                    <th>Message</th>
                    <th>Submitted At</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['roll_number'] . "</td>";
                        echo "<td>" . $row['student_name'] . "</td>";
                        echo "<td>" . $row['semester'] . "</td>";
                        echo "<td>" . $row['message'] . "</td>";
                        echo "<td>" . $row['created_at'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No feedback found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php $conn->close(); ?>

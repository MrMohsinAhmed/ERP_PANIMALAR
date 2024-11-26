<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "faculty_attendance";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT * FROM attendance";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Table</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Faculty Attendance</h2>
        <input class="form-control mb-4" id="searchInput" type="text" placeholder="Enter the Faculty Name">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Faculty Name</th>
                    <th>Designation</th>
                    <?php for ($i = 1; $i <= 31; $i++): ?>
                        <th> <?= $i ?></th>
                    <?php endfor; ?>
                </tr>
            </thead>
            <tbody id="attendanceTable">
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['roll_number'] ?></td>
                            <td><?= $row['student_name'] ?></td>
                            <?php for ($i = 1; $i <= 31; $i++): ?>
                                <td><?= $row['day' . $i] ?></td>
                            <?php endfor; ?>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="33" class="text-center">No records found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#attendanceTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>
</html>

<?php
$conn->close();
?>

<?php
$host = 'localhost';
$dbname = 'student_db';
$username = 'root'; // change this if necessary
$password = ''; // change this if necessary

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM students";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        table td, table th {
            text-align: center;
        }
        .table {
            margin: 0 auto;
        }
        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4 text-center">Student Details</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Roll Number</th>
                        <th>Student Name</th>
                        <th>Gender</th>
                        <th>Year</th>
                        <th>Section</th>
                        <th>Parent Name</th>
                        <th>Address</th>
                        <th>Date Of Birth</th>
                        <th>Contact Number</th>
                        <th>Parent Contact Number</th>
                        <th>Student E-mail ID</th>
                        <th>Student Docs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>{$row['roll_number']}</td>
                                <td>{$row['student_name']}</td>
                                <td>{$row['gender']}</td>
                                <td>{$row['year']}</td>
                                <td>{$row['section']}</td>
                                <td>{$row['parent_name']}</td>
                                <td>{$row['address']}</td>
                                <td>{$row['dob']}</td>
                                <td>{$row['contact_number']}</td>
                                <td>{$row['parent_contact_number']}</td>
                                <td>{$row['student_email_id']}</td>
                                <td><a href='{$row['student_docs']}' target='_blank' class='btn btn-info btn-sm'>View Document</a></td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='12'>No records found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        // Display total data count
        $result_count = $conn->query("SELECT COUNT(*) AS total FROM students");
        $row_count = $result_count->fetch_assoc();
        echo "<p class='text-center'>Total Records: <strong>" . $row_count['total'] . "</strong></p>";
        ?>
    </div>
</body>
</html>
<?php
$conn->close();
?>

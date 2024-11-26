<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exam_timetable";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$filter_exam_type = isset($_POST['filter_exam_type']) ? $_POST['filter_exam_type'] : '';
$filter_semester = isset($_POST['filter_semester']) ? $_POST['filter_semester'] : '';

$sql = "SELECT * FROM exam_timetable WHERE 1=1";
if ($filter_exam_type != '') {
    $sql .= " AND exam_type = '$filter_exam_type'";
}
if ($filter_semester != '') {
    $sql .= " AND semester = '$filter_semester'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Exam Timetable</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
</head>
<body>
    <div class="container mt-5">
        <h3>EXAM TIMETABLE</h3>
        <form method="post" action="view_exam_timetable.php" class="mb-4">
            <div class="row">
                <div class="col-lg-6 col-12 form-group">
                    <label>Filter by Exam Type</label>
                    <select name="filter_exam_type" class="select2 form-control">
                        <option value="">Select the exam type</option>
                        <option value="Internal 1" <?php if ($filter_exam_type == 'Internal 1') echo 'selected'; ?>>Internal 1</option>
                        <option value="Internal 2" <?php if ($filter_exam_type == 'Internal 2') echo 'selected'; ?>>Internal 2</option>
                        <option value="Internal 3" <?php if ($filter_exam_type == 'Internal 3') echo 'selected'; ?>>Internal 3</option>
                        <option value="Semester" <?php if ($filter_exam_type == 'Semester') echo 'selected'; ?>>Semester</option>
                    </select>
                </div>
                <div class="col-lg-6 col-12 form-group">
                    <label>Filter by Semester</label>
                    <select name="filter_semester" class="select2 form-control">
                        <option value="">Select the semester</option>
                        <option value="1" <?php if ($filter_semester == '1') echo 'selected'; ?>>1</option>
                        <option value="2" <?php if ($filter_semester == '2') echo 'selected'; ?>>2</option>
                        <option value="3" <?php if ($filter_semester == '3') echo 'selected'; ?>>3</option>
                        <option value="4" <?php if ($filter_semester == '4') echo 'selected'; ?>>4</option>
                        <option value="5" <?php if ($filter_semester == '5') echo 'selected'; ?>>5</option>
                        <option value="6" <?php if ($filter_semester == '6') echo 'selected'; ?>>6</option>
                        <option value="7" <?php if ($filter_semester == '7') echo 'selected'; ?>>7</option>
                        <option value="8" <?php if ($filter_semester == '8') echo 'selected'; ?>>8</option>
                        </select>
                        </div>
                        <div class="col-12 form-group">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                        </div>
                        </form>

                        <div class="table-responsive">
                        <table class="table table-bordered">
                        <thead>
                        <tr>
                        <th>Exam Type</th>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Subject Type</th>
                        <th>Semester</th>
                        <th>Exam Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>" . $row['exam_type'] . "</td>
                                    <td>" . $row['subject_code'] . "</td>
                                    <td>" . $row['subject_name'] . "</td>
                                    <td>" . $row['subject_type'] . "</td>
                                    <td>" . $row['semester'] . "</td>
                                    <td>" . $row['exam_date'] . "</td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No records found</td></tr>";
                        }
                        ?>
                        </tbody>
                        </table>
                        </div>
                        </div>
                        </body>
                        </html>

                        <?php
                        $conn->close();
                        ?>


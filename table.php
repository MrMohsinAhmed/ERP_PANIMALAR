<!-- table.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Subjects Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Subjects Table</h2>
        <form method="GET">
            <div class="form-group">
                <label for="semester_filter">Filter by Semester</label>
                <select class="form-control" id="semester_filter" name="semester_filter">
                    <option value="">All Semesters</option>
                    <?php for ($i = 1; $i <= 8; $i++): ?>
                        <option value="<?php echo $i; ?>" <?php echo isset($_GET['semester_filter']) && $_GET['semester_filter'] == $i ? 'selected' : ''; ?>>Semester <?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Subject Type</th>
                    <th>Subject Faculty</th>
                    <th>Subject Notes</th>
                    <th>Semester Number</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "college";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $semester_filter = isset($_GET['semester_filter']) ? (int)$_GET['semester_filter'] : 0;
                $sql = "SELECT * FROM subjects" . ($semester_filter ? " WHERE semester_number = $semester_filter" : "");
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['subject_code']}</td>
                            <td>{$row['subject_name']}</td>
                            <td>{$row['subject_type']}</td>
                            <td>{$row['subject_faculty']}</td>
                            <td><a href='{$row['subject_notes']}' target='_blank'>Notes</a></td>
                            <td>{$row['semester_number']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No subjects found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

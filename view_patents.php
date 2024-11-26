<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patents</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Patent Information</h2>
        <form method="get">
            <div class="form-group">
                <label for="year_filter">Filter by Year</label>
                <select class="form-control" id="year_filter" name="year_filter">
                    <option value="">Select Year</option>
                    <?php
                    for ($year = 2000; $year <= 2024; $year++) {
                        echo "<option value=\"$year\">$year</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Patent Number</th>
                        <th>Name</th>
                        <th>Year</th>
                        <th>Contact Number</th>
                        <th>Author Email ID</th>
                        <th>Patent Link</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "patents";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $year_filter = isset($_GET['year_filter']) ? $_GET['year_filter'] : '';

                    $sql = "SELECT * FROM patents";
                    if ($year_filter) {
                        $sql .= " WHERE year = '$year_filter'";
                    }
                    $sql .= " ORDER BY year DESC";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['patent_number']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['year']}</td>
                                    <td>{$row['contact_number']}</td>
                                    <td>{$row['author_email']}</td>
                                    <td><a href='{$row['patent_link']}' target='_blank'>View Patent</a></td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No records found</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

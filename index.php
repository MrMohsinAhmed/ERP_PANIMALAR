<?php
session_start();  // Start the session to check for messages
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Bulk Email Admin Panel</title>
</head>
<style>
    body {
        font-family: arial;
    }
</style>
<body>
    <div class="container mt-5">

        <!-- Display session message, if available -->
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?= $_SESSION['msg_type']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                // Clear the message after displaying it
                unset($_SESSION['message']);
                unset($_SESSION['msg_type']);
            ?>
        <?php endif; ?>

        <h2>Upload CSV File</h2>
        <!-- CSV Upload Form -->
        <form action="upload_csv.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="csv_file" class="form-label">Select CSV File</label>
                <input type="file" name="csv_file" class="form-control" id="csv_file" accept=".csv" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload CSV</button>
        </form>

        <h2 class="mt-5">Send Bulk Emails</h2>

        <!-- Filter form for selecting students -->
        <form id="filter-form" method="POST" action="index.php">
            <div class="row">
                <div class="col-md-3">
                    <label for="year" class="form-label">Year</label>
                    <select name="year" class="form-select" id="year">
                        <option value="">Select Year</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="section" class="form-label">Section</label>
                    <select name="section" class="form-select" id="section">
                        <option value="">Select Section</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="passed_out_year" class="form-label">Passed Out Year</label>
                    <select name="passed_out_year" class="form-select" id="passed_out_year">
                        <option value="">Select Passed Out Year</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Filter</button>
        </form>

        <!-- Email table -->
        <form id="email-form" method="POST" action="send_mail.php">
            <table class="table mt-4 table-bordered" style="border: 1px solid gray;">
                <thead style="text-align: center; background-color: #10375C; color: white;">
                    <tr>
                        <th>Select</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Year</th>
                        <th>Section</th>
                        <th>Passed Out Year</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "college_emails";

                    // Create a connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Handle filter form submission
                    $sql = "SELECT * FROM students WHERE 1=1";
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $year = $_POST['year'];
                        $section = $_POST['section'];
                        $passed_out_year = $_POST['passed_out_year'];

                        if (!empty($year)) {
                            $sql .= " AND year = '$year'";
                        }
                        if (!empty($section)) {
                            $sql .= " AND section = '$section'";
                        }
                        if (!empty($passed_out_year)) {
                            $sql .= " AND passed_out_year = '$passed_out_year'";
                        }
                    }

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr style='background-color: #F4F6FF;'>
                                    <td style='text-align: center;'><input type='checkbox' name='selected_emails[]' value='{$row['email']}'></td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['email']}</td>
                                    <td style='text-align: center;'>{$row['year']}</td>
                                    <td style='text-align: center;'>{$row['section']}</td>
                                    <td style='text-align: center;'>{$row['passed_out_year']}</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No records found</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>

            <!-- Message area -->
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea name="message" id="message" class="form-control" rows="5" required placeholder="Enter the message"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Send>></button>
        </form>
    </div><br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

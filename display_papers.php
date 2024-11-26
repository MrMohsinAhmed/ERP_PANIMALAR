<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "research_papers";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data
$sql = "SELECT * FROM papers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research Papers</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .filter-container {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Research Papers</h2>
    <div class="filter-container">
        <label for="yearFilter">Filter by Year:</label>
        <select id="yearFilter" class="form-control" style="width: 200px;">
            <option value="all">All</option>
            <?php
            for ($year = 2000; $year <= 2024; $year++) {
                echo "<option value='$year'>$year</option>";
            }
            ?>
        </select>
        <button id="searchButton" class="btn btn-primary mt-2">Search</button>
    </div>
    <table class="table table-bordered" id="papersTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Co-authors</th>
                <th>Year</th>
                <th>Date of Publish</th>
                <th>Author Email</th>
                <th>Paper Link</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["paper_id"] . "</td>
                            <td>" . $row["author_name"] . "</td>
                            <td>" . $row["co_authors"] . "</td>
                            <td class='paper-year'>" . $row["year"] . "</td>
                            <td>" . $row["date_of_publish"] . "</td>
                            <td>" . $row["author_email"] . "</td>
                            <td><a href='" . $row["file_path"] . "' target='_blank'>Paper Link</a></td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No papers found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    document.getElementById('searchButton').addEventListener('click', function() {
        var year = document.getElementById('yearFilter').value;
        var rows = Array.from(document.querySelectorAll('#papersTable tbody tr'));
        var filteredRows = [];
        
        rows.forEach(row => {
            var rowYear = row.querySelector('.paper-year').textContent;
            if (year === 'all' || rowYear === year) {
                filteredRows.push(row);
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
        
        var tbody = document.querySelector('#papersTable tbody');
        tbody.innerHTML = ''; // Clear existing rows
        
        // Append filtered rows to the top
        filteredRows.forEach(row => {
            tbody.appendChild(row);
        });
        
        // Append the rest of the rows
        rows.filter(row => !filteredRows.includes(row)).forEach(row => {
            tbody.appendChild(row);
        });
    });
</script>
</body>
</html>

<?php
$conn->close();
?>

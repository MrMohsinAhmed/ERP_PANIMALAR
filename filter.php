<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college_emails";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $year = $_POST['year'];
    $section = $_POST['section'];
    $passed_out_year = $_POST['passed_out_year'];

    $sql = "SELECT * FROM students WHERE 1=1";
    if (!empty($year)) {
        $sql .= " AND year = '$year'";
    }
    if (!empty($section)) {
        $sql .= " AND section = '$section'";
    }
    if (!empty($passed_out_year)) {
        $sql .= " AND passed_out_year = '$passed_out_year'";
    }

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td><input type='checkbox' name='selected_emails[]' value='{$row['email']}'></td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['year']}</td>
                    <td>{$row['section']}</td>
                    <td>{$row['passed_out_year']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No records found</td></tr>";
    }
}

$conn->close();
?>

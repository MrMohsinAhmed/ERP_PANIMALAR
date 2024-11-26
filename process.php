<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "student_attendance");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll_number = $_POST['roll_number'];
    $student_name = $_POST['student_name'];
    $section = $_POST['section'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    // Collect attendance data for 31 days
    $days = [];
    for ($i = 1; $i <= 31; $i++) {
        $days[] = isset($_POST["day$i"]) ? $_POST["day$i"] : '';
    }

    $sql = "INSERT INTO attendance (roll_number, student_name, section, year, month, day1, day2, day3, day4, day5, day6, day7, day8, day9, day10, day11, day12, day13, day14, day15, day16, day17, day18, day19, day20, day21, day22, day23, day24, day25, day26, day27, day28, day29, day30, day31) VALUES ('$roll_number', '$student_name', '$section', '$year', '$month', '$days[0]', '$days[1]', '$days[2]', '$days[3]', '$days[4]', '$days[5]', '$days[6]', '$days[7]', '$days[8]', '$days[9]', '$days[10]', '$days[11]', '$days[12]', '$days[13]', '$days[14]', '$days[15]', '$days[16]', '$days[17]', '$days[18]', '$days[19]', '$days[20]', '$days[21]', '$days[22]', '$days[23]', '$days[24]', '$days[25]', '$days[26]', '$days[27]', '$days[28]', '$days[29]', '$days[30]')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>

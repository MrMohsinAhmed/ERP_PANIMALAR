<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_results";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reg_number = $_POST['reg_number'];
    $student_name = $_POST['student_name'];
    $tenth_percentage = $_POST['tenth_percentage'];
    $twelfth_percentage = $_POST['twelfth_percentage'];
    $internal_percentage_1 = $_POST['internal_percentage_1'];
    $internal_percentage_2 = $_POST['internal_percentage_2'];
    $internal_percentage_3 = $_POST['internal_percentage_3'];
    $internal_percentage_4 = $_POST['internal_percentage_4'];
    $internal_percentage_5 = $_POST['internal_percentage_5'];
    $internal_percentage_6 = $_POST['internal_percentage_6'];
    $internal_percentage_7 = $_POST['internal_percentage_7'];
    $internal_percentage_8 = $_POST['internal_percentage_8'];
    $sem1_gpa = $_POST['sem1_gpa'];
    $sem2_gpa = $_POST['sem2_gpa'];
    $sem3_gpa = $_POST['sem3_gpa'];
    $sem4_gpa = $_POST['sem4_gpa'];
    $sem5_gpa = $_POST['sem5_gpa'];
    $sem6_gpa = $_POST['sem6_gpa'];
    $sem7_gpa = $_POST['sem7_gpa'];
    $sem8_gpa = $_POST['sem8_gpa'];
    $overall_cgpa = $_POST['overall_cgpa'];
    $num_arrears = $_POST['num_arrears'];
    $marksheet = $_FILES['marksheet']['name'];

    // File upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["marksheet"]["name"]);
    move_uploaded_file($_FILES["marksheet"]["tmp_name"], $target_file);

    $sql = "INSERT INTO student_analysis (reg_number, student_name, tenth_percentage, twelfth_percentage, 
            internal_percentage_1, internal_percentage_2, internal_percentage_3, internal_percentage_4, 
            internal_percentage_5, internal_percentage_6, internal_percentage_7, internal_percentage_8, 
            sem1_gpa, sem2_gpa, sem3_gpa, sem4_gpa, sem5_gpa, sem6_gpa, sem7_gpa, sem8_gpa, 
            overall_cgpa, num_arrears, marksheet) 
            VALUES ('$reg_number', '$student_name', '$tenth_percentage', '$twelfth_percentage', 
            '$internal_percentage_1', '$internal_percentage_2', '$internal_percentage_3', '$internal_percentage_4', 
            '$internal_percentage_5', '$internal_percentage_6', '$internal_percentage_7', '$internal_percentage_8', 
            '$sem1_gpa', '$sem2_gpa', '$sem3_gpa', '$sem4_gpa', '$sem5_gpa', '$sem6_gpa', '$sem7_gpa', '$sem8_gpa', 
            '$overall_cgpa', '$num_arrears', '$marksheet')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

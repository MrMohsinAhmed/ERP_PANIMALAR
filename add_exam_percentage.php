<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'student_exams');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $register_number = $_POST['register_number'];
    $student_name = $_POST['student_name'];
    $semester_number = $_POST['semester_number'];
    $gpa = $_POST['gpa'];
    $cgpa = $_POST['cgpa'];
    $history_of_arrears = $_POST['history_of_arrears'];

    // Corrected: Use 's' for all parameters that are strings and 'd' for decimal numbers
    $stmt = $conn->prepare("INSERT INTO exam_percentages (register_number, student_name, semester_number, gpa, cgpa, history_of_arrears) VALUES (?, ?, ?, ?, ?, ?)");
    
    // Updated bind_param to use 's' for strings and 'd' for decimal numbers
    $stmt->bind_param('ssddds', $register_number, $student_name, $semester_number, $gpa, $cgpa, $history_of_arrears);
    $stmt->execute();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Exam Percentage</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="my-4">Add Exam Percentage</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="register_number">Register Number:</label>
                <input type="text" class="form-control" id="register_number" name="register_number" required>
            </div>
            <div class="form-group">
                <label for="student_name">Student Name:</label>
                <input type="text" class="form-control" id="student_name" name="student_name" required>
            </div>
            <div class="form-group">
                <label for="semester_number">Semester Number:</label>
                <select class="form-control" id="semester_number" name="semester_number" required>
                    <option value="">Select Semester</option>
                    <?php for ($i = 1; $i <= 8; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo " $i"; ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="gpa">GPA:</label>
                <input type="text" class="form-control" id="gpa" name="gpa" required>
            </div>
            <div class="form-group">
                <label for="cgpa">CGPA:</label>
                <input type="text" class="form-control" id="cgpa" name="cgpa" required>
            </div>
            <div class="form-group">
                <label for="history_of_arrears">History of Arrears:</label>
                <textarea class="form-control" id="history_of_arrears" name="history_of_arrears"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Result Analysis Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Student Result Analysis Form</h2>
    <form action="save_student.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="reg_number">Register Number</label>
            <input type="text" class="form-control" id="reg_number" name="reg_number" required>
        </div>
        <div class="form-group">
            <label for="student_name">Student Name</label>
            <input type="text" class="form-control" id="student_name" name="student_name" required>
        </div>
        <div class="form-group">
            <label for="tenth_percentage">10th Percentage</label>
            <input type="number" step="0.01" class="form-control" id="tenth_percentage" name="tenth_percentage">
        </div>
        <div class="form-group">
            <label for="twelfth_percentage">12th Percentage</label>
            <input type="number" step="0.01" class="form-control" id="twelfth_percentage" name="twelfth_percentage">
        </div>
        <!-- Internal Percentage for Semesters 1 to 8 -->
        <div class="form-group">
            <label for="internal_percentage_1">Internal Percentage Semester 1</label>
            <input type="text" step="0.01" class="form-control" id="internal_percentage_1" name="internal_percentage_1">
        </div>
        <div class="form-group">
            <label for="internal_percentage_2">Internal Percentage Semester 2</label>
            <input type="text" step="0.01" class="form-control" id="internal_percentage_2" name="internal_percentage_2">
        </div>
        <div class="form-group">
            <label for="internal_percentage_3">Internal Percentage Semester 3</label>
            <input type="text" step="0.01" class="form-control" id="internal_percentage_3" name="internal_percentage_3">
        </div>
        <div class="form-group">
            <label for="internal_percentage_4">Internal Percentage Semester 4</label>
            <input type="text" step="0.01" class="form-control" id="internal_percentage_4" name="internal_percentage_4">
        </div>
        <div class="form-group">
            <label for="internal_percentage_5">Internal Percentage Semester 5</label>
            <input type="text" step="0.01" class="form-control" id="internal_percentage_5" name="internal_percentage_5">
        </div>
        <div class="form-group">
            <label for="internal_percentage_6">Internal Percentage Semester 6</label>
            <input type="text" step="0.01" class="form-control" id="internal_percentage_6" name="internal_percentage_6">
        </div>
        <div class="form-group">
            <label for="internal_percentage_7">Internal Percentage Semester 7</label>
            <input type="text" step="0.01" class="form-control" id="internal_percentage_7" name="internal_percentage_7">
        </div>
        <div class="form-group">
            <label for="internal_percentage_8">Internal Percentage Semester 8</label>
            <input type="text" step="0.01" class="form-control" id="internal_percentage_8" name="internal_percentage_8">
        </div>
        <!-- GPA for Semesters 1 to 8 -->
        <div class="form-group">
            <label for="sem1_gpa">Semester 1 GPA</label>
            <input type="number" step="0.01" class="form-control" id="sem1_gpa" name="sem1_gpa">
        </div>
        <div class="form-group">
            <label for="sem2_gpa">Semester 2 GPA</label>
            <input type="number" step="0.01" class="form-control" id="sem2_gpa" name="sem2_gpa">
        </div>
        <div class="form-group">
            <label for="sem3_gpa">Semester 3 GPA</label>
            <input type="number" step="0.01" class="form-control" id="sem3_gpa" name="sem3_gpa">
        </div>
        <div class="form-group">
            <label for="sem4_gpa">Semester 4 GPA</label>
            <input type="number" step="0.01" class="form-control" id="sem4_gpa" name="sem4_gpa">
        </div>
        <div class="form-group">
            <label for="sem5_gpa">Semester 5 GPA</label>
            <input type="number" step="0.01" class="form-control" id="sem5_gpa" name="sem5_gpa">
        </div>
        <div class="form-group">
            <label for="sem6_gpa">Semester 6 GPA</label>
            <input type="number" step="0.01" class="form-control" id="sem6_gpa" name="sem6_gpa">
        </div>
        <div class="form-group">
            <label for="sem7_gpa">Semester 7 GPA</label>
            <input type="number" step="0.01" class="form-control" id="sem7_gpa" name="sem7_gpa">
        </div>
        <div class="form-group">
            <label for="sem8_gpa">Semester 8 GPA</label>
            <input type="number" step="0.01" class="form-control" id="sem8_gpa" name="sem8_gpa">
        </div>
        <div class="form-group">
            <label for="overall_cgpa">Overall CGPA</label>
            <input type="number" step="0.01" class="form-control" id="overall_cgpa" name="overall_cgpa">
        </div>
        <div class="form-group">
            <label for="num_arrears">Number of Arrears</label>
            <input type="number" class="form-control" id="num_arrears" name="num_arrears">
        </div>
        <div class="form-group">
            <label for="marksheet">Marksheet</label>
            <input type="file" class="form-control" id="marksheet" name="marksheet">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>

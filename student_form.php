<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Student Details Form</h2>
        <form action="upload_student.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="roll_number">Roll Number</label>
                <input type="text" class="form-control" id="roll_number" name="roll_number" required>
            </div>
            <div class="form-group">
                <label for="student_name">Student Name</label>
                <input type="text" class="form-control" id="student_name" name="student_name" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" class="form-control" id="year" name="year" required>
            </div>
            <div class="form-group">
                <label for="section">Section</label>
                <input type="text" class="form-control" id="section" name="section" required>
            </div>
            <div class="form-group">
                <label for="parent_name">Parent Name</label>
                <input type="text" class="form-control" id="parent_name" name="parent_name" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="dob">Date Of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="text" class="form-control" id="contact_number" name="contact_number" required>
            </div>
            <div class="form-group">
                <label for="parent_contact_number">Parent Contact Number</label>
                <input type="text" class="form-control" id="parent_contact_number" name="parent_contact_number" required>
            </div>
            <div class="form-group">
                <label for="student_email_id">Student E-mail ID</label>
                <input type="email" class="form-control" id="student_email_id" name="student_email_id" required>
            </div>
            <div class="form-group">
                <label for="student_docs">Upload Document</label>
                <input type="file" class="form-control-file" id="student_docs" name="student_docs" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>

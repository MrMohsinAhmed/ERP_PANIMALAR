<!-- form.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Subject Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Add Subject</h2>
        <form action="save_subject.php" method="POST">
            <div class="form-group">
                <label for="subject_code">Subject Code</label>
                <input type="text" class="form-control" id="subject_code" name="subject_code" required>
            </div>
            <div class="form-group">
                <label for="subject_name">Subject Name</label>
                <input type="text" class="form-control" id="subject_name" name="subject_name" required>
            </div>
            <div class="form-group">
                <label for="subject_type">Subject Type</label>
                <select class="form-control" id="subject_type" name="subject_type" required>
                    <option value="Theory">Theory</option>
                    <option value="Practical">Practical</option>
                    <option value="Elective">Elective</option>
                </select>
            </div>
            <div class="form-group">
                <label for="subject_notes">Subject Notes (URL)</label>
                <input type="text" class="form-control" id="subject_notes" name="subject_notes" required>
            </div>
            <div class="form-group">
                <label for="semester_number">Semester Number</label>
                <select class="form-control" id="semester_number" name="semester_number" required>
                    <?php for ($i = 1; $i <= 8; $i++): ?>
                        <option value="<?php echo $i; ?>">Semester <?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

    <script>
        // Display an alert after form submission
        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
            var form = event.target;

            fetch(form.action, {
                method: form.method,
                body: new FormData(form)
            })
            .then(response => response.text())
            .then(data => {
                alert('Data saved successfully!');
                form.reset(); // Optionally reset the form
            })
            .catch(error => {
                alert('An error occurred: ' + error.message);
            });
        });
    </script>
</body>
</html>

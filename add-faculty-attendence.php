<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Attendance</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mt-5 mb-4">Faculty Attendance Form</h2>
        <form action="fprocess.php" method="POST">
            <div class="form-group">
                <label for="roll_number">Faculty Name:</label>
                <input type="text" class="form-control" id="roll_number" name="roll_number" required>
            </div>
            <div class="form-group">
                <label for="student_name">Designation:</label>
                <input type="text" class="form-control" id="student_name" name="student_name" required>
            </div>
            <div class="form-group">
                <label for="section">Degree:</label>
                <input type="text" class="form-control" id="section" name="section" required>
                
            </div>
            <div class="form-group">
                <label for="month">Month</label>
                <select class="form-control" id="month" name="month" required>
                    <option value="">Select Month</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="number" class="form-control" id="year" name="year" required>
            </div>
            <?php for ($i = 1; $i <= 31; $i++): ?>
                <div class="form-group">
                    <label for="day<?= $i ?>"> <?= $i ?>:</label>
                    <select class="form-control" id="day<?= $i ?>" name="day<?= $i ?>" required>
                        <option value="P">P</option>
                        <option value="A">A</option>
                        <option value="ODI">ODI</option>
                        <option value="ODE">ODE</option>
                        <option value="L">-</option>
                    </select>
                </div>
            <?php endfor; ?>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>

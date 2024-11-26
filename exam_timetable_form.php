<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Timetable Form</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();

            $('form').on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: 'save_exam_timetable.php',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            alert(response.message);
                            $('form')[0].reset(); // Clear the form
                            $('.select2').val(null).trigger('change'); // Reset Select2 fields
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function () {
                        alert('An error occurred while saving the data.');
                    }
                });
            });
        });
    </script>
</head>
<body>
    <div class="container mt-5">
        <h3>Enter Exam Timetable</h3>
        <form method="post">
            <div class="row" style="color: black;">
                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                    <label>Exam type</label>
                    <select name="exam_type" class="select2 form-control">
                        <option value="0">Select the exam type</option>
                        <option value="Internal 1">Internal 1</option>
                        <option value="Internal 2">Internal 2</option>
                        <option value="Internal 3">Internal 3</option>
                        <option value="Semester">Semester</option>
                    </select>
                </div>
                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                    <label>Subject code</label>
                    <input type="text" name="subject_code" placeholder="Enter the subject code" class="form-control">
                </div>
                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                    <label>Subject name</label>
                    <input type="text" name="subject_name" placeholder="Enter the subject name" class="form-control">
                </div>
                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                    <label>Subject type</label>
                    <select name="subject_type" class="select2 form-control">
                        <option value="0">Select the subject type</option>
                        <option value="Theory">Theory</option>
                        <option value="Practical">Practical</option>
                    </select>
                </div>
                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                    <label>Select the semester</label>
                    <select name="semester" class="select2 form-control">
                        <option value="0">Select the semester</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                </div>
                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                    <label>Exam Date</label>
                    <input type="date" name="exam_date" placeholder="DD/MM/YYYY" class="form-control air-datepicker">
                </div>
                <div class="col-12 form-group mg-t-8">
                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Timetable</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <form id="timetableForm">
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="year">Select Year</label>
                    <select id="year" name="year" class="form-control select2">
                        <option value="1">I</option>
                        <option value="2">II</option>
                        <option value="3">III</option>
                        <option value="4">IV</option>
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <label for="section">Select Section</label>
                    <select id="section" name="section" class="form-control select2">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                        <option value="H">H</option>
                        <option value="I">I</option>
                        <option value="J">J</option>
                        <option value="K">K</option>
                        <option value="L">L</option>
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <label for="day">Select Day</label>
                    <select id="day" name="day" class="form-control select2">
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="period1">8.05am - 8.55am</label>
                    <input type="text" id="period1" name="period1" class="form-control">
                </div>
                <div class="col-md-3 form-group">
                    <label for="period2">8.55am - 9.45am</label>
                    <input type="text" id="period2" name="period2" class="form-control">
                </div>
                <div class="col-md-3 form-group">
                    <label for="period3">9.45am - 10.30am</label>
                    <input type="text" id="period3" name="period3" class="form-control">
                </div>
                <div class="col-md-3 form-group">
                    <label for="period4">10.50am - 11.30am</label>
                    <input type="text" id="period4" name="period4" class="form-control">
                </div>
                <div class="col-md-3 form-group">
                    <label for="period5">12.05pm - 12.55pm</label>
                    <input type="text" id="period5" name="period5" class="form-control">
                </div>
                <div class="col-md-3 form-group">
                    <label for="period6">12.55pm - 1.40pm</label>
                    <input type="text" id="period6" name="period6" class="form-control">
                </div>
                <div class="col-md-3 form-group">
                    <label for="period7">1.40pm - 2.25pm</label>
                    <input type="text" id="period7" name="period7" class="form-control">
                </div>
                <div class="col-md-3 form-group">
                    <label for="period8">2.25pm - 2.55pm</label>
                    <input type="text" id="period8" name="period8" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <button type="button" id="saveBtn" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();

            $('#saveBtn').on('click', function() {
                const formData = $('#timetableForm').serialize();
                $.ajax({
                    type: 'POST',
                    url: 'save_timetable.php',
                    data: formData,
                    success: function(response) {
                        alert(response);
                        $('#timetableForm')[0].reset();
                        $('.select2').val(null).trigger('change');
                    },
                    error: function() {
                        alert('An error occurred while saving the timetable.');
                    }
                });
            });
        });
    </script>
</body>
</html>

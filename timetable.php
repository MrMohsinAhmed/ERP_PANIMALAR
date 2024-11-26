<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Timetable</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3 form-group">
                <label for="filterYear">Filter by Year</label>
                <select id="filterYear" class="form-control select2">
                    <option value="1">I</option>
                    <option value="2">II</option>
                    <option value="3">III</option>
                    <option value="4">IV</option>
                </select>
            </div>
            <div class="col-md-3 form-group">
                <label for="filterSection">Filter by Section</label>
                <select id="filterSection" class="form-control select2">
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
            <div class="col-md-3 form-group align-self-end">
                <button id="filterBtn" class="btn btn-info">Search</button>
            </div>
        </div>
        <div class="table-responsive mt-5">
            <table id="timetableTable" class="table table-striped content-table">
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>8.05am - 8.55am</th>
                        <th>8.55am - 9.45am</th>
                        <th>9.45am - 10.30am</th>
                        <th>10.50am - 11.30am</th>
                        <th>12.05pm - 12.55pm</th>
                        <th>12.55pm - 1.40pm</th>
                        <th>1.40pm - 2.25pm</th>
                        <th>2.25pm - 2.55pm</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Table data will be inserted here by PHP -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();

            $('#filterBtn').on('click', function() {
                const year = $('#filterYear').val();
                const section = $('#filterSection').val();
                $.ajax({
                    type: 'GET',
                    url: 'fetch_timetable.php',
                    data: { year: year, section: section },
                    success: function(response) {
                        $('#timetableTable tbody').html(response);
                    },
                    error: function() {
                        alert('An error occurred while fetching the timetable.');
                    }
                });
            });
        });
    </script>
</body>
</html>

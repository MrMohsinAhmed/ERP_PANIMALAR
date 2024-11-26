<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Panimalar ERP | All Subjects</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/pec-logo.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="fonts/flaticon.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Select 2 CSS -->
    <link rel="stylesheet" href="css/select2.min.css">
    <!-- Data Table CSS -->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.2/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.2/uicons-regular-straight/css/uicons-regular-straight.css'>
    <!-- Modernize js -->
    <script src="js/modernizr-3.6.0.min.js"></script>
</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
        <!-- Header Menu Area Start Here -->
        <div class="navbar navbar-expand-md header-menu-one bg-light">
            <!-- ... existing header code ... -->
        </div>
        
                
                <!-- All Subjects Area Start Here -->
                <div class="row">
                    <div class="col-4-xxxl col-12">
                        <div class="card height-auto">
                            <div class="card-body">
                                <br>
                                <form class="new-added-form" action="process_subjects.php" method="post">
                                    <div class="row">
                                        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                            <label>Select the semester</label>
                                            <select class="select2 form-control" name="semester">
                                                <option value="0">Select the semester</option>
                                                <option value="1">1st</option>
                                                <option value="2">2nd</option>
                                                <option value="3">3rd</option>
                                                <option value="4">4th</option>
                                                <option value="5">5th</option>
                                                <option value="6">6th</option>
                                                <option value="7">7th</option>
                                                <option value="8">8th</option>
                                            </select>
                                        </div>
                                        <script>
                                            $(document).ready(function() {
                                                $('.select2').select2();
                                            });
                                        </script>
                                        <style>
                                            /* Custom styles for select2 */
                                        </style>
                                        <div class="col-12 form-group mg-t-8">
                                            <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-8-xxxl col-12">
                        <div class="card height-auto">
                            <div class="card-body">
                                <br>
                                <div class="table-responsive">
                                    <table class="table display data-table text-nowrap">
                                        <thead style="color: black;">
                                            <tr>
                                                <th>Subject code</th>
                                                <th>Subject Name</th>
                                                <th>Subject Type</th>
                                                <th>Subject faculty</th>
                                                <th>Subject notes</th>
                                            </tr>
                                        </thead>
                                        <tbody style="color: rgb(86, 86, 86); text-align: left;">
                                            <?php
                                            // Assuming you have a file named process_subjects.php that handles fetching and displaying the subjects
                                            if (isset($_POST['semester'])) {
                                                $semester = $_POST['semester'];
                                                // Connect to database
                                                $conn = new mysqli('localhost', 'username', 'password', 'database');
                                                if ($conn->connect_error) {
                                                    die("Connection failed: " . $conn->connect_error);
                                                }
                                                // Fetch subjects based on selected semester
                                                $sql = "SELECT subject_code, subject_name, subject_type, subject_faculty, subject_notes FROM subjects WHERE semester = ?";
                                                $stmt = $conn->prepare($sql);
                                                $stmt->bind_param('i', $semester);
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>
                                                            <td>{$row['subject_code']}</td>
                                                            <td>{$row['subject_name']}</td>
                                                            <td>{$row['subject_type']}</td>
                                                            <td>{$row['subject_faculty']}</td>
                                                            <td><a href='{$row['subject_notes']}' target='_blank'>Notes</a></td>
                                                        </tr>";
                                                }
                                                $stmt->close();
                                                $conn->close();
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- All Subjects Area End Here -->
                
                <!-- Footer Area Start Here -->
                <footer class="footer-wrap-layout1">
                    <div class="copyright" style="text-align: center;">© Copyrights <a href="www.panimalar.ac.in">Panimalar Engineering College</a> 2024. All rights reserved. Designed by<a href="www.infomatronics.in"> Infomatronics Project Services</a></div>
                </footer>
                <!-- Footer Area End Here -->
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>
    <!-- jquery-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Select 2 Js -->
    <script src="js/select2.min.js"></script>
    <!-- Scroll Up Js -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- Data Table Js -->
    <script src="js/jquery.dataTables.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>
</body>
</html>

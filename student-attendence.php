<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_attendance";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT * FROM attendance";
$result = $conn->query($sql);
?>


<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Panimalar ERP | Student Attendence</title>
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
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.2/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.2/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.2/uicons-regular-straight/css/uicons-regular-straight.css'>
    <style>
        .attendance-P { background-color: green; color: white; }
        .attendance-A { background-color: red; color: white; }
        .attendance-ODI, .attendance-ODE { background-color: yellow; color: black; }
    </style>

    <!-- Modernize js -->
    <script src="js/modernizr-3.6.0.min.js"></script>
    <style>
        .form-control, .select2-container--default .select2-selection--single {
            width: 100%;
        }
    </style>
</head>

<body>
<script>
        $(document).ready(function(){
            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#attendanceTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
<!-- Header Menu Area Start Here -->
<div class="navbar navbar-expand-md header-menu-one bg-light">
    <div class="nav-bar-header-one">
        <div class="header-logo">
            <a href="hodindex.php">
                <img src="img/Untitled design.png" width="140px" alt="logo">
            </a>
        </div>
         <div class="toggle-button sidebar-toggle">
            <button type="button" class="item-link">
                <span class="btn-icon-wrap">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>
        </div>
    </div>
    <div class="d-md-none mobile-nav-bar">
       <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse" data-target="#mobile-navbar" aria-expanded="false">
            <i class="far fa-arrow-alt-circle-down"></i>
        </button>
        <button type="button" class="navbar-toggler sidebar-toggle-mobile">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <div class="header-main-menu collapse navbar-collapse" id="mobile-navbar">
        <ul class="navbar-nav">
           
        </ul>
        <ul class="navbar-nav">
            <li class="navbar-item dropdown header-admin">
                <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-expanded="false">
                    <div class="admin-title">
                        <h5 class="item-title">Rajkumar S</h5>
                        <span>HOD</span>
                    </div>
                    <div class="admin-img">
                        <img src="img/ece-hod.jpg" width="40px" alt="Admin">
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="item-header">
                        <h6 class="item-title">Rajkumar S</h6>
                    </div>
                    <div class="item-content">
                        <ul class="settings-list">
                            <li><a href="hoddetail.html"><i class="flaticon-user"></i>My Profile</a></li>
                            <li><a href="#"><i class="flaticon-list"></i>Task</a></li>
                            <li><a href="#"><i class="flaticon-chat-comment-oval-speech-bubble-with-text-lines"></i>Message</a></li>
                            <li><a href="#"><i class="flaticon-gear-loading"></i>Account Settings</a></li>
                            <li><a href="login.html"><i class="flaticon-turn-off"></i>Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            
                
            <li class="navbar-item dropdown header-notification">
                <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-expanded="false">
                    <i class="far fa-bell"></i>
                    <div class="item-title d-md-none text-16 mg-l-10">Notification</div>
                    <span>2</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <div class="item-header">
                        <h6 class="item-title">03 Notifications</h6>
                    </div>
                    <div class="item-content">
                        <div class="media">
                            <div class="item-icon bg-skyblue">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="media-body space-sm">
                                <div class="post-title">Attendence Completed</div>
                                <span>1 Mins ago</span>
                            </div>
                        </div>
                        <div class="media">
                            <div class="item-icon bg-orange">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="media-body space-sm">
                                <div class="post-title">Secretary Metting</div>
                                <span>@10:30 AM</span>
                            </div>
                        </div>
                        
                    </div>
                </div>
            
        </ul>
    </div>
</div>
<!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
<!-- Sidebar Area Start Here -->
<div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
    <div class="mobile-sidebar-header d-md-none">
         <div class="header-logo">
             <a href="hodindex.php"><img src="img/logo1.png" width="120px" alt="logo"></a>
         </div>
    </div>
     <div class="sidebar-menu-content">
         <ul class="nav nav-sidebar-menu sidebar-toggle-view">
            
             <li class="nav-item">
                <a href="hodindex.php" class="nav-link"><i class="fi fi-ss-home"></i><span>Home</span></a>
            </li>
             <li class="nav-item">
                <a href="all-hod.html" class="nav-link"><i class="flaticon-multiple-users-silhouette"></i><span>HOD Details</span></a>
            </li>
             <li class="nav-item sidebar-nav-item">
                 <a href="#" class="nav-link"><i class="fi fi-ss-chalkboard-user"></i><span>Faculty details</span></a>
                 <ul class="nav sub-group-menu">
                     <li class="nav-item">
                         <a href="all-teacher.php" class="nav-link"><i class="fas fa-angle-right"></i>All faculty details</a>
                     </li>
                     <!-- <li class="nav-item"> -
                         <a href="teacher-details.html" class="nav-link"><i
                                 class="fas fa-angle-right"></i>Teacher Details</a>
                     </li>-->
                     <li class="nav-item">
                         <a href="add-teacher.html" class="nav-link"><i class="fas fa-angle-right"></i>Add new faculty</a>
                     </li>
                     <!-- <li class="nav-item"> -
                         <a href="teacher-payment.html" class="nav-link"><i
                                 class="fas fa-angle-right"></i>Payment</a>
                     </li>-->   
                 </ul>
             </li>
            
            <li class="nav-item">
                <a href="all-student.php" class="nav-link"><i class="fi fi-ss-student"></i><span>Students details</span></a>
                 
            </li>
             <!-- <li class="nav-item sidebar-nav-item">
                 <a href="#" class="nav-link"><i class="flaticon-couple"></i><span>Parent details</span></a>
                 <ul class="nav sub-group-menu">
                     <li class="nav-item">
                         <a href="all-parents.html" class="nav-link"><i class="fas fa-angle-right"></i>All
                             Parents</a>
                     </li>
                      <li class="nav-item"> 
                         <a href="parents-details.html" class="nav-link"><i
                                 class="fas fa-angle-right"></i>Parents Details</a>
                     </li
                     <li class="nav-item">
                         <a href="add-parents.html" class="nav-link"><i class="fas fa-angle-right"></i>Add Parent details</a>
                     </li>
                 </ul>
             </li>-->
             <!-- <li class="nav-item sidebar-nav-item"> 
                 <a href="#" class="nav-link"><i class="flaticon-books"></i><span>Library</span></a>
                 <ul class="nav sub-group-menu">
                     <li class="nav-item">
                         <a href="all-book.html" class="nav-link"><i class="fas fa-angle-right"></i>All
                             Book</a>
                     </li>
                     <li class="nav-item">
                         <a href="add-book.html" class="nav-link"><i class="fas fa-angle-right"></i>Add New
                             Book</a>
                     </li>
                 </ul>
             </li>
             <li class="nav-item sidebar-nav-item">
                 <a href="all-fees.html" class="nav-link"><i class="flaticon-technological"></i><span>Students fee details</span></a>
                  <ul class="nav sub-group-menu"> -
                     <li class="nav-item">
                         <a href="all-fees.html" class="nav-link"><i class="fas fa-angle-right"></i>All Fees
                             Collection</a>
                     </li>
                     <li class="nav-item">
                         <a href="all-expense.html" class="nav-link"><i
                                 class="fas fa-angle-right"></i>Expenses</a>
                     </li>
                     <li class="nav-item"><i
                         class="flaticon-maths-class-materials-cross-of-a-pencil-and-a-ruler"></i>
                         <a href="add-expense.html" class="nav-link"><i class="fas fa-angle-right"></i>Add
                             Expenses</a>
                     </li>
                 </ul>-->
             </li>
             <li class="nav-item">
                 <a href="Assignment.php" class="nav-link"><i
                 class="flaticon-maths-class-materials-cross-of-a-pencil-and-a-ruler"></i><span>Assignments</span></a>
             </li>
             
             <li class="nav-item">
                 <a href="all-subject.php" class="nav-link"><i
                         class="flaticon-open-book"></i><span>Curriculum</span></a>
             </li>
             <li class="nav-item">
                 <a href="class-routine.php" class="nav-link"><i class="flaticon-calendar"></i><span>Class
                         timetable</span></a>
             </li>
             <li class="nav-item sidebar-nav-item">
                 <a href="#" class="nav-link"><i class="fi fi-rs-calendar-shift-swap"></i><span>Faculty Timetable</span></a>
                 <ul class="nav sub-group-menu">
                     <li class="nav-item">
                         <a href="Add-faculty-routine.php" class="nav-link"><i class="fas fa-angle-right"></i>Add Faculty Timetable</a>
                     </li>
                     <li class="nav-item">
                         <a href="faculty-routine.php" class="nav-link"><i class="fas fa-angle-right"></i>All Faculties TimeTable</a>
                     </li>
                 </ul>
             </li>
             
             <li class="nav-item sidebar-nav-item">
                 <a href="#" class="nav-link"><i class="fi fi-rs-time-watch-calendar"></i><span>Faculty Duties</span></a>
                 <ul class="nav sub-group-menu">
                     <li class="nav-item">
                         <a href="all-duties.php" class="nav-link"><i class="fas fa-angle-right"></i>All Faculty duties</a>
                     </li>
                     <li class="nav-item">
                         <a href="dutyform.html" class="nav-link"><i class="fas fa-angle-right"></i>Add Faculties duties</a>
                     </li>
                 </ul>
             </li>
             <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i
                class="flaticon-checklist"></i><span>Attendence</span></a>
                <ul class="nav sub-group-menu">
                    <li class="nav-item">
                        <a href="student-attendence.php" class="nav-link"><i class="fas fa-angle-right"></i>Student Attendence</a>
                    </li>
                    <li class="nav-item">
                        <a href="faculty-attendence.php" class="nav-link"><i class="fas fa-angle-right"></i>Faculty Attendence</a>
                    </li>
                </ul>
            </li>
             <li class="nav-item">
                 <a href="result-analysis.php" class="nav-link"><i class="fi fi-ss-people-poll"></i><span>Result Analysis</span></a>
             </li>
             <li class="nav-item sidebar-nav-item">
                 <a href="#" class="nav-link"><i class="flaticon-shopping-list"></i><span>Examination</span></a>
                 <ul class="nav sub-group-menu">
                     <li class="nav-item">
                         <a href="exam-schedule.php" class="nav-link"><i class="fas fa-angle-right"></i>Exam
                             timetable</a>
                     </li>
                     <li class="nav-item">
                         <a href="exam-grade.php" class="nav-link"><i class="fas fa-angle-right"></i>Exam
                             Grades</a>
                     </li>
                 </ul>
             </li>
             <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i class="fi fi-rs-search-alt"></i><span>Research module</span></a>
                <ul class="nav sub-group-menu">
                    <li class="nav-item">
                        <a href="all-patents.php" class="nav-link"><i class="fas fa-angle-right"></i>Patents</a>
                    </li>
                    <li class="nav-item">
                        <a href="all-researchpapers.php" class="nav-link"><i class="fas fa-angle-right"></i>Research papers</a>
                    </li>
                </ul>
            </li>
             
             <!-- <li class="nav-item"> 
                 <a href="transport.php" class="nav-link"><i
                         class="flaticon-bus-side-view"></i><span>Bus transport</span></a>
             </li>
             <li class="nav-item">
                 <a href="allhostel.php" class="nav-link"><i class="flaticon-bed"></i><span>Hostel students</span></a>
             </li>-->
             <li class="nav-item">
                 <a href="notice-board.php" class="nav-link"><i
                         class="flaticon-script"></i><span>Notice board</span></a>
             </li>          <li class="nav-item">
                 <a href="messaging.php" class="nav-link"><i
                         class="flaticon-chat"></i><span>Message</span></a>
             </li>
         </ul>
     </div>
 </div>
 <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>STUDENT ATTENDENCE</h3>
                    <ul>
                        <li>
                            <a href="hodindex.html">Home</a>
                        </li>
                        <li>Student attendence</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <div class="row" >
                    <!-- Student Attendence Search Area Start Here -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title"><br>
                                        <h3>Student Attendence</h3><br>
                                    </div> 
                                   
                                </div>
                                <form class="new-added-form">
    <div class="row" style="color: black;">
        <div class="col-xl-3 col-lg-6 col-12 form-group">
            <label>Roll number</label>
            <input class="form-control filter-input" id="searchInput" type="text" placeholder="Search by Roll Number or Student Name">
        </div>
        <div class="col-xl-3 col-lg-6 col-12 form-group" style="color: black; width: 220px;">
            <label>Section</label>
            <select class="select2 filter-input" id="sectionFilter" style="color: black; width: 220px;">
                <option value="">Select the section</option>
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
        <div class="col-xl-3 col-lg-6 col-12 form-group" style="color: black; width: 220px;">
            <label>Select Month</label>
            <select class="select2 filter-input" id="monthFilter" style="color: black; width: 220px;">
                <option value="0">Select the Month</option>
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
        </div>
        <div class="col-xl-3 col-lg-6 col-12 form-group" style="color: black; width: 220px;">
            <label>Year</label>
            <select class="select2 filter-input" id="yearFilter" style="color: black; width: 220px;">
                <option value="0">Select the year</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
            </select>
        </div>
        <div class="col-12 form-group mg-t-8">
            <button type="button" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" onclick="filterTable()">Search</button>
            <button id="downloadexcel" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Export Data</button>
        </div>
    </div>
</form>


                            </div>
                        </div>
                    </div>
                    <script>
                        document.getElementById('downloadexcel').addEventListener('click',function(){
                            var table2excel = new Table2Excel();
                            table2excel.export(document.querySelectorAll("#attendence-table"));
                        });
                    </script>
                    <script src="table2excel.js"></script>
                    <!-- Student Attendence Search Area End Here -->
                    <!-- Student Attendence Area Start Here -->
                    <div class="col-12" style="max-height: 400px; overflow-y: auto;">
                        <div class="card">
                            <div class="card-body"><br>
                                
                                <div class="heading-layout1"> 
                                    
                                </div>
                                <div class="table-responsive">
        <table class="table bs-table table-striped table-bordered text-nowrap" id="attendence-table" style="max-height: 400px; overflow-y: auto;">
            <thead style="text-align: center;">
                <tr>
                    <th>Roll Number</th>
                    <th>Student Name</th>
                    <th>Section</th>
                    <th>Month</th>
                    <th>Year</th>
                    <?php for ($i = 1; $i <= 31; $i++): ?>
                        <th><?= $i ?></th>
                    <?php endfor; ?>
                </tr>
            </thead>
            <tbody style="color: black;" id="attendanceTable">
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['roll_number'] ?></td>
                            <td><?= $row['student_name'] ?></td>
                            <td><?= $row['section'] ?></td>
                            <td><?= $row['month'] ?></td>
                            <td><?= $row['year'] ?></td>
                            <?php for ($i = 1; $i <= 31; $i++): ?>
                                <td class="attendance-<?= $row['day' . $i] ?>"><?= $row['day' . $i] ?></td>
                            <?php endfor; ?>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="35" class="text-center">No records found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- Student Attendence Area End Here -->
                 <!-- Footer Area Start Here -->
                 <footer class="footer-wrap-layout1">
                    <div class="copyright" style="text-align: center;">© Copyrights <a href="www.panimalar.ac.in">Panimalar Engineering College</a> 2024. All rights reserved. Designed by<a
                            href="www.infomatronics.in"> Infomatronics Project Services</a></div>
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
    <!-- Custom Js -->
    <script src="js/main.js"></script>
    <script>
    $(document).ready(function() {
        $('.select2').select2();
    });

    function filterTable() {
        const searchInput = document.getElementById('searchInput').value.toLowerCase();
        const sectionFilter = document.getElementById('sectionFilter').value;
        const monthFilter = document.getElementById('monthFilter').value;
        const yearFilter = document.getElementById('yearFilter').value;

        const monthNames = ["", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        const table = document.getElementById('attendence-table');
        const tbody = table.getElementsByTagName('tbody')[0];
        const rows = tbody.getElementsByTagName('tr');

        for (let i = 0; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName('td');
            const rollNumber = cells[0].textContent.toLowerCase();
            const studentName = cells[1].textContent.toLowerCase();
            const section = cells[2].textContent;
            const month = cells[3].textContent;
            const year = cells[4].textContent;

            const matchesSearch = rollNumber.includes(searchInput) || studentName.includes(searchInput);
            const matchesSection = !sectionFilter || section === sectionFilter;
            const matchesMonth = monthFilter === "0" || month === monthNames[parseInt(monthFilter)];
            const matchesYear = yearFilter === "0" || year === yearFilter;

            if (matchesSearch && matchesSection && matchesMonth && matchesYear) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    }
</script>

</body>

</html>

<?php
$conn->close();
?>
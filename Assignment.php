<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "assignment_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch notices from the database
$sql = "SELECT * FROM notices ORDER BY date DESC";
$result = $conn->query($sql);
?>


<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Panimalar ERP | Assignments</title>
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
    <!-- Date Picker CSS -->
    <link rel="stylesheet" href="css/datepicker.min.css">
    <!-- Select 2 CSS -->
    <link rel="stylesheet" href="css/select2.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.2/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.2/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.2/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


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
                    <h3>ASSIGNMENTS</h3>
                    <ul>
                        <li>
                            <a href="hodindex.html">Home</a>
                        </li>
                        <li>Assignment</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <div class="row">
                    <!-- Add Notice Area Start Here -->
                    <div class="col-4-xxxl col-12">
                        <div class="card height-auto">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    
                                    <div class="container mt-5" style="font-size: 16px; color: black; font-wieght: bold;">
        
        <?php if (isset($_GET['submitted']) && $_GET['submitted'] == 'true') { ?>
            <div class="alert alert-success">Assignment submitted successfully!</div>
        <?php } ?>
        

        <form method="post" enctype="multipart/form-data" >
        <div class="form-group">
            <label for="assignment_name">Assignment Name</label>
            <input type="text" placeholder="Enter the assignment name" class="form-control" id="assignment_name" name="assignment_name" required>
        </div>
        <div class="form-group">
            <label for="sender_name">Faculty Name</label>
            <input type="text" placeholder="Enter the faculty name" class="form-control" id="sender_name" name="sender_name" required>
        </div>
        <div class="form-group">
            <label for="section">Section</label>
            <input type="text" placeholder="Enter the section" class="form-control" id="section" name="section" required>
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="text" placeholder="Enter the year" class="form-control" id="year" name="year" required>
        </div>
        <div class="form-group">
            <label for="submission_deadline">Submission Deadline</label>
            <input type="date"  placeholder="Enter the submission deadline" class="form-control" id="submission_deadline" name="submission_deadline" required>
        </div>
        <div class="form-group">
            <label for="assignment_file">Assignment File</label>
            <input type="file" class="form-control-file" id="assignment_file" name="assignment_file" required>
        </div>
        <div class="col-12 form-group mg-t-8">
        <button type="submit" style="padding-top: 20px; width: 150px; height: 50px; align-items: center;" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Upload</button>
        </div>
        </div>
    </form>
    </div>
        </div>
                                
                                
                            </div>
                        </div>
                    </div>
                    <!-- Add Notice Area End Here -->
                    
                </div>
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
    <!-- Date Picker Js -->
    <script src="js/datepicker.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>

</body>

</html>
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "notice_board_db";

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
    <title>Panimalar ERP | Notice Board</title>
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
                 <a href="#" class="nav-link"><i class="fi fi-ss-chalkboard-user"></i><span>Placement</span></a>
                 <ul class="nav sub-group-menu">
                     <li class="nav-item">
                         <a href="notice-board.php" class="nav-link"><i class="fas fa-angle-right"></i>Upcoming companies</a>
                     </li>
                     <li class="nav-item">
                         <a href="add-notice.php" class="nav-link"><i class="fas fa-angle-right"></i>Add company</a>
                     </li>
                     <li class="nav-item">
                         <a href="admin.php" class="nav-link"><i class="fas fa-angle-right"></i>Applied students</a>
                     </li>
                        
                 </ul>
             </li>
             <li class="nav-item sidebar-nav-item">
                 <a href="#" class="nav-link"><i class="fi fi-ss-student"></i><span>Student details</span></a>
                 <ul class="nav sub-group-menu">
                     <li class="nav-item">
                         <a href="all-student.php" class="nav-link"><i class="fas fa-angle-right"></i>All students</a>
                     </li>
                    
                     <li class="nav-item">
                         <a href="student_form.php" class="nav-link"><i class="fas fa-angle-right"></i>Add students</a>
                     </li>
                        
                 </ul>
             </li>
             <li class="nav-item sidebar-nav-item">
                 <a href="#" class="nav-link"><i class="fi fi-ss-people-poll"></i><span>Academic details</span></a>
                 <ul class="nav sub-group-menu">
                     <li class="nav-item">
                         <a href="result-analysis.php" class="nav-link"><i class="fas fa-angle-right"></i>All students academics</a>
                     </li>
                    
                     <li class="nav-item">
                         <a href="enterdetail.php" class="nav-link"><i class="fas fa-angle-right"></i>Add student academics</a>
                     </li>
                        
                 </ul>
             </li>
            
            
             
             <li class="nav-item">
                 <a href="notice-board.php" class="nav-link"><i
                         class="flaticon-script"></i><span>Upcoming companies</span></a>
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
                    <h3>Add upcoming company</h3>
                    <ul>
                        <li>
                            <a href="hodindex.php">Home</a>
                        </li>
                        <li>Add upcoming company</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <div class="row">
                    <!-- Add Notice Area Start Here -->
                    <div class="col-12">
                        <div class="card height-auto">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Add upcoming company</h3>
                                    </div>
                                     <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" 
                                        data-toggle="dropdown" aria-expanded="false">...</a>
                
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid mt-5" style="color: black;">
                                <form action="upload_notice.php" method="POST">
        <div class="form-group">
            <label for="job_role">Job Role</label>
            <input type="text" class="form-control" placeholder="Enter the job role" name="job_role" required>
        </div>
        <div class="form-group">
            <label for="ctc">CTC</label>
            <input type="text" class="form-control" placeholder="CTC" name="ctc" required>
        </div>
        <div class="form-group">
            <label for="company_name">Company Name</label>
            <input type="text" class="form-control" placeholder="Enter the company name" name="company_name" required>
        </div>
        <div class="form-group">
            <label for="job_description">Job Description</label>
            <textarea class="form-control" placeholder="Enter the job description" name="job_description" required></textarea>
        </div>
        <div class="form-group">
            <label for="branch">Branch/Stream</label>
            <input type="text" class="form-control" placeholder="Enter the eligible branch/stream" name="branch" required>
        </div>
        <div class="form-group">
            <label for="deadline">Deadline</label>
            <input type="date" class="form-control" name="deadline" required>
        </div>
        <button type="submit" style="color: white; font-weight: bold; border-radius: 5px;"  class="btn-fill-sm btn-gradient-yellow btn-hover-bluedark">Upload</button>
    </form>

</div>

                                
                                
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- Add Notice Area End Here -->
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
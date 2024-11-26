<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_results";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

$sql = "SELECT * FROM student_analysis WHERE reg_number LIKE '%$search%' OR student_name LIKE '%$search%'";
$result = $conn->query($sql);
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Panimalar ERP | Result Analysis</title>
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
    <!-- Data Table CSS -->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.2/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.2/uicons-bold-straight/css/uicons-bold-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.2/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.2/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.2/uicons-regular-straight/css/uicons-regular-straight.css'>
    <!-- Modernize js -->
    <script src="js/modernizr-3.6.0.min.js"></script>
    <style>
        .form-control {
            background-color: rgb(226, 226, 226);
            color: black;
        }
        .table-responsive {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
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
                    <h3>ALL STUDENT ACADEMICS</h3>
                    <ul>
                        <li>
                            <a href="hodindex.php">Home</a>
                        </li>
                        <li>All student academics</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                              
                <!-- Student Table Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body"><br>
                        
                        <h3 style="color: black; font-weight: bold;">ACADEMIC DETAILS OF STUDENTS</h3>
                        <form method="get" class="mg-b-20" style="color: black;">
                        <div class="row gutters-8">
                        <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <div class="col-12 form-group mg-t-8" style="display: flex; gap: 30px">
        <input type="text"  style="background-color: rgb(238, 238, 238); color: black; width: 700px;" name="search" class="form-control" placeholder="Search by Register Number" value="<?php echo $search; ?>">
        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Search</button>

        </div>
    </div>

      <div class="table-responsive">

      <table class="table display text-nowrap table-bordered" >
      <thead style="color: black; text-align: center;">
            <tr>
                <th>Register Number</th>
                <th>Student Name</th>
                <th>10th Percentage</th>
                <th>12th Percentage</th>
                <th>Internal Percentage Sem 1</th>
                <th>Internal Percentage Sem 2</th>
                <th>Internal Percentage Sem 3</th>
                <th>Internal Percentage Sem 4</th>
                <th>Internal Percentage Sem 5</th>
                <th>Internal Percentage Sem 6</th>
                <th>Internal Percentage Sem 7</th>
                <th>Internal Percentage Sem 8</th>
                <th>Sem 1 GPA</th>
                <th>Sem 2 GPA</th>
                <th>Sem 3 GPA</th>
                <th>Sem 4 GPA</th>
                <th>Sem 5 GPA</th>
                <th>Sem 6 GPA</th>
                <th>Sem 7 GPA</th>
                <th>Sem 8 GPA</th>
                <th>Overall CGPA</th>
                <th>Number of Arrears</th>
                <th>Marksheet</th>
            </tr>
        </thead>
        <tbody style="color: black; text-align: left;">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["reg_number"] . "</td>";
                    echo "<td>" . $row["student_name"] . "</td>";
                    echo "<td>" . $row["tenth_percentage"] . "</td>";
                    echo "<td>" . $row["twelfth_percentage"] . "</td>";
                    echo "<td>" . $row["internal_percentage_1"] . "</td>";
                    echo "<td>" . $row["internal_percentage_2"] . "</td>";
                    echo "<td>" . $row["internal_percentage_3"] . "</td>";
                    echo "<td>" . $row["internal_percentage_4"] . "</td>";
                    echo "<td>" . $row["internal_percentage_5"] . "</td>";
                    echo "<td>" . $row["internal_percentage_6"] . "</td>";
                    echo "<td>" . $row["internal_percentage_7"] . "</td>";
                    echo "<td>" . $row["internal_percentage_8"] . "</td>";
                    echo "<td>" . $row["sem1_gpa"] . "</td>";
                    echo "<td>" . $row["sem2_gpa"] . "</td>";
                    echo "<td>" . $row["sem3_gpa"] . "</td>";
                    echo "<td>" . $row["sem4_gpa"] . "</td>";
                    echo "<td>" . $row["sem5_gpa"] . "</td>";
                    echo "<td>" . $row["sem6_gpa"] . "</td>";
                    echo "<td>" . $row["sem7_gpa"] . "</td>";
                    echo "<td>" . $row["sem8_gpa"] . "</td>";
                    echo "<td>" . $row["overall_cgpa"] . "</td>";
                    echo "<td>" . $row["num_arrears"] . "</td>";
                    echo "<td><a href='uploads/" . $row["marksheet"] . "' target='_blank'>Marksheet</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='23'>No results found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    </div>
                    </div>
                </div>
                <!-- Student Table Area End Here -->
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
    <!-- Scroll Up Js -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- Data Table Js -->
    <script src="js/jquery.dataTables.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>
    <script>
        function filterTable() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const sectionSelect = document.getElementById('sectionSelect').value.toLowerCase();
            const batchSelect = document.getElementById('batchSelect').value.toLowerCase();
            const table = document.getElementById('studentTable');
            const tbody = table.getElementsByTagName('tbody')[0];
            const rows = tbody.getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const rollNumber = rows[i].cells[0].textContent.toLowerCase();
                const studentName = rows[i].cells[1].textContent.toLowerCase();
                const section = rows[i].cells[4].textContent.toLowerCase();
                const batch = rows[i].cells[3].textContent.toLowerCase();

                let displayRow = true;

                if (searchInput && !rollNumber.includes(searchInput) && !studentName.includes(searchInput)) {
                    displayRow = false;
                }
                if (sectionSelect && section !== sectionSelect) {
                    displayRow = false;
                }
                if (batchSelect && batch !== batchSelect) {
                    displayRow = false;
                }

                rows[i].style.display = displayRow ? '' : 'none';
            }
        }
    </script>

</body>

</html>
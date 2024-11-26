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
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Header Menu Area Start Here -->
    <!-- Include your header and menu code here -->
    <!-- Header Menu Area End Here -->

    <!-- Page Area Start Here -->
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>Notice Board</h3>
            <ul>
                <li>
                    <a href="hodindex.html">Home</a>
                </li>
                <li>Notice Board</li>
            </ul>
        </div>
        <!-- Breadcubs Area End Here -->

        <div class="row">
            <!-- All Notice Area Start Here -->
            <div class="col-12">
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Notice Board</h3>
                            </div>
                        </div>

                        <div class="notice-board-wrap">
                            <?php if ($result->num_rows > 0): ?>
                                <?php while($row = $result->fetch_assoc()): ?>
                                    <div class="notice-list">
                                        <div class="post-date bg-skyblue"><?php echo date("d M, Y", strtotime($row['date'])); ?></div>
                                        <h6 class="notice-title">
                                            <a href="#"><?php echo htmlspecialchars($row['message']); ?></a>
                                            <?php if (!empty($row['file'])): ?>
                                                <a href="uploads/<?php echo htmlspecialchars($row['file']); ?>" target="_blank" style="color: blue; text-decoration: underline;">Click here</a>
                                            <?php endif; ?>
                                        </h6>
                                        <div class="entry-meta"><?php echo htmlspecialchars($row['sender']); ?> / <span>5 min ago</span></div>
                                    </div>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <p>No notices available.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- All Notice Area End Here -->
        </div>
    </div>
    <!-- Page Area End Here -->

    <!-- Footer Area Start Here -->
    <footer class="footer-wrap-layout1">
        <div class="copyright" style="text-align: center;">© Copyrights <a href="www.panimalar.ac.in">Panimalar Engineering College</a> 2024. All rights reserved. Designed by<a
                href="www.infomatronics.in"> Infomatronics Project Services</a></div>
    </footer>
    <!-- Footer Area End Here -->

    <!-- jquery-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>

<?php
// Close connection
$conn->close();
?>

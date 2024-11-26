<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>All Assignments</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Include other necessary CSS files -->
</head>

<body>
    <!-- Preloader Start Here -->
    <!-- Header and Sidebar Code Here -->

    <div class="dashboard-content-one">
        <div class="breadcrumbs-area">
            <h3>Assignments</h3>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="notice-board-wrap">
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "assignment_db";

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT * FROM assignments ORDER BY date DESC";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<div class="notice-list">';
                                    echo '<div class="post-date bg-skyblue">' . date('d M, Y', strtotime($row['date'])) . '</div>';
                                    echo '<h6 class="notice-title"><a href="#">' . htmlspecialchars($row['message']);
                                    if ($row['file_path']) {
                                        echo ' <a href="' . htmlspecialchars($row['file_path']) . '" style="color: blue; text-decoration:underline">Click here</a>';
                                    }
                                    echo '</a></h6>';
                                    echo '<div class="entry-meta">Posted by ' . htmlspecialchars($row['sender_name']) . ' / <span>' . date('d M, Y', strtotime($row['date'])) . '</span></div>';
                                    echo '</div>';
                                }
                            } else {
                                echo "No assignments found.";
                            }

                            $conn->close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Area Start Here -->
    <!-- Include necessary JavaScript files -->
</body>

</html>

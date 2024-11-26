<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_POST['roleSelect'];
    
    switch ($role) {
        case 'STUDENT':
            $roll_number = $_POST['roll_number'];
            $date_of_birth = $_POST['date_of_birth'];
            
            $sql = "SELECT * FROM students WHERE roll_number = ? AND date_of_birth = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $roll_number, $date_of_birth);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows == 1) {
                $_SESSION['user_id'] = $result->fetch_assoc()['id'];
                $_SESSION['role'] = 'student';
                header("Location: studentindex.html");
                exit();
            }
            break;
            
        case 'FACULTY':
        case 'HOD':
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $table = strtolower($role);
            $sql = "SELECT * FROM $table WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['role'] = strtolower($role);
                    header("Location: " . strtolower($role) . "index.html");
                    exit();
                }
            }
            break;
    }
    
    // If we reach here, login failed
    $error_message = "Invalid credentials. Please try again.";
    session_destroy();
    header("Location: login.php");
    exit();
}

$conn->close();
?>
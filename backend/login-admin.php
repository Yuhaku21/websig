<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "db_websig");

if(isset($_POST['loginBtn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM `admin` WHERE `username` = ? AND `password` = ?");
    $stmt->bind_param("ss", $username, $password);

    try {
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $admin = $result->fetch_assoc();
            $_SESSION['login'] = $admin['id'];
            header("Location: ./dashboard.html");
            exit();
        } else {
            echo "Email atau password salah.";
        }

    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $conn->close();
}

?>
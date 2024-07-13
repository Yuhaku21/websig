<?php 
session_start();
include "query.php";
$conn = mysqli_connect("localhost", "root", "", "db_websig");

try {
    $touring_travel = sqlFetchAll("SELECT * FROM `touring_travel`");
} catch (Exception $e) {
    echo "". $e->getMessage();
}

if(isset($_POST['tambahTouringTravel'])) {
    $nama_travel = $_POST['nama_travel'];
    $langtitude = floatval($_POST['langtitude']);
    $longtitude = floatval($_POST['longtitude']);
    $link_travel = $_POST['link_travel'];
    
    $stmt = $conn->prepare("INSERT INTO `touring_travel`(`nama_travel`, `langtitude`, `longtitude`, `link_travel`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdds", $nama_travel, $langtitude, $longtitude, $link_travel);

    try {
        $stmt->execute();
        header("Location: ./data-touring-travel.php");
        exit();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $conn->close();
    $stmt->close();
}

if(isset($_POST['ubahTouringTravel'])) {
    $nama_travel = $_POST['nama_travel'];
    $langtitude = floatval($_POST['langtitude']);
    $longtitude = floatval($_POST['longtitude']);
    $link_travel = $_POST['link_travel'];
    $id = $_POST["id"]; 
    
    $stmt = $conn->prepare("UPDATE `touring_travel` SET `nama_travel`= ?, `langtitude`= ?, `longtitude`= ?, `link_travel`= ? WHERE `id` = ?");
    $stmt->bind_param("sddsi", $nama_travel, $langtitude, $longtitude, $link_travel, $id);

    try {
        $stmt->execute();
        header("Location: ./data-touring-travel.php");
        exit();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $conn->close();
    $stmt->close();
}

if(isset($_POST['hapusTouringTravel'])) {
    $id = $_POST["id"]; 
    
    $stmt = $conn->prepare("DELETE FROM `touring_travel` WHERE `id` = ?");
    $stmt->bind_param("i", $id);

    try {
        $stmt->execute();
        header("Location: ./data-touring-travel.php");
        exit();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $conn->close();
    $stmt->close();
}
?>
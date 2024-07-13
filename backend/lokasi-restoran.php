<?php 
session_start();
include "query.php";
$conn = mysqli_connect("localhost", "root", "", "db_websig");

try {
    $lokasi_restoran = sqlFetchAll("SELECT * FROM `lokasi_restoran`");
} catch (Exception $e) {
    echo "". $e->getMessage();
}

if(isset($_POST['tambahLokasiRestoran'])) {
    $nama_restoran = $_POST['nama_restoran'];
    $langtitude = floatval($_POST['langtitude']);
    $longtitude = floatval($_POST['longtitude']);
    $link_restoran = $_POST['link_restoran'];
    
    $stmt = $conn->prepare("INSERT INTO `lokasi_restoran`(`nama_restoran`, `langtitude`, `longtitude`, `link_restoran`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdds", $nama_restoran, $langtitude, $longtitude, $link_restoran);

    try {
        $stmt->execute();
        header("Location: ./data-lokasi-restoran.php");
        exit();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $conn->close();
    $stmt->close();
}

if(isset($_POST['ubahLokasiRestoran'])) {
    $nama_restoran = $_POST['nama_restoran'];
    $langtitude = floatval($_POST['langtitude']);
    $longtitude = floatval($_POST['longtitude']);
    $link_restoran = $_POST['link_restoran'];
    $id = $_POST["id"]; 
    
    $stmt = $conn->prepare("UPDATE `lokasi_restoran` SET `nama_restoran`= ?, `langtitude`= ?, `longtitude`= ?, `link_restoran`= ? WHERE `id` = ?");
    $stmt->bind_param("sddsi", $nama_restoran, $langtitude, $longtitude, $link_restoran, $id);

    try {
        $stmt->execute();
        header("Location: ./data-lokasi-restoran.php");
        exit();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $conn->close();
    $stmt->close();
}

if(isset($_POST['hapusLokasiRestoran'])) {
    $id = $_POST["id"]; 
    
    $stmt = $conn->prepare("DELETE FROM `lokasi_restoran` WHERE `id` = ?");
    $stmt->bind_param("i", $id);

    try {
        $stmt->execute();
        header("Location: ./data-lokasi-restoran.php");
        exit();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $conn->close();
    $stmt->close();
}
?>
<?php 
session_start();
include "query.php";
$conn = mysqli_connect("localhost", "root", "", "db_websig");

try {
    $lokasi_penginapan = sqlFetchAll("SELECT * FROM `lokasi_penginapan`");
} catch (Exception $e) {
    echo "". $e->getMessage();
}

if(isset($_POST['tambahLokasiPenginapan'])) {
    $nama_penginapan = $_POST['nama_penginapan'];
    $langtitude = floatval($_POST['langtitude']);
    $longtitude = floatval($_POST['longtitude']);
    $link_penginapan = $_POST['link_penginapan'];
    
    $stmt = $conn->prepare("INSERT INTO `lokasi_penginapan`(`nama_penginapan`, `langtitude`, `longtitude`, `link_penginapan`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdds", $nama_penginapan, $langtitude, $longtitude, $link_penginapan);

    try {
        $stmt->execute();
        header("Location: ./data-lokasi-penginapan.php");
        exit();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $conn->close();
    $stmt->close();
}

if(isset($_POST['ubahLokasiPenginapan'])) {
    $nama_penginapan = $_POST['nama_penginapan'];
    $langtitude = floatval($_POST['langtitude']);
    $longtitude = floatval($_POST['longtitude']);
    $link_penginapan = $_POST['link_penginapan'];
    $id = $_POST["id"]; 
    
    $stmt = $conn->prepare("UPDATE `lokasi_penginapan` SET `nama_penginapan`= ?, `langtitude`= ?, `longtitude`= ?, `link_penginapan`= ? WHERE `id` = ?");
    $stmt->bind_param("sddsi", $nama_penginapan, $langtitude, $longtitude, $link_penginapan, $id);

    try {
        $stmt->execute();
        header("Location: ./data-lokasi-penginapan.php");
        exit();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $conn->close();
    $stmt->close();
}

if(isset($_POST['hapusLokasiPenginapan'])) {
    $id = $_POST["id"]; 
    
    $stmt = $conn->prepare("DELETE FROM `lokasi_penginapan` WHERE `id` = ?");
    $stmt->bind_param("i", $id);

    try {
        $stmt->execute();
        header("Location: ./data-lokasi-penginapan.php");
        exit();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $conn->close();
    $stmt->close();
}
?>
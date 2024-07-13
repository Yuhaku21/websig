<?php 
session_start();
include "query.php";
$conn = mysqli_connect("localhost", "root", "", "db_websig");

try {
    $objek_wisata = sqlFetchAll("SELECT * FROM `objek_wisata`");
} catch (Exception $e) {
    echo "". $e->getMessage();
}

if(isset($_POST['tambahObjekWisata'])) {
    $nama_wisata = $_POST['nama_wisata'];
    $langtitude = floatval($_POST['langtitude']);
    $longtitude = floatval($_POST['longtitude']);
    $link_wisata = $_POST['link_wisata'];
    
    $stmt = $conn->prepare("INSERT INTO `objek_wisata`(`nama_wisata`, `langtitude`, `longtitude`, `link_wisata`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdds", $nama_wisata, $langtitude, $longtitude, $link_wisata);

    try {
        $stmt->execute();
        header("Location: ./data-objek-wisata.php");
        exit();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $conn->close();
    $stmt->close();
}

if(isset($_POST['ubahObjekWisata'])) {
    $nama_wisata = $_POST['nama_wisata'];
    $langtitude = floatval($_POST['langtitude']);
    $longtitude = floatval($_POST['longtitude']);
    $link_wisata = $_POST['link_wisata'];
    $id = $_POST["id"]; 
    
    $stmt = $conn->prepare("UPDATE `objek_wisata` SET `nama_wisata`= ?, `langtitude`= ?, `longtitude`= ?, `link_wisata`= ? WHERE `id` = ?");
    $stmt->bind_param("sddsi", $nama_wisata, $langtitude, $longtitude, $link_wisata, $id);

    try {
        $stmt->execute();
        header("Location: ./data-objek-wisata.php");
        exit();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $conn->close();
    $stmt->close();
}

if(isset($_POST['hapusObjekWisata'])) {
    $id = $_POST["id"]; 
    
    $stmt = $conn->prepare("DELETE FROM `objek_wisata` WHERE `id` = ?");
    $stmt->bind_param("i", $id);

    try {
        $stmt->execute();
        header("Location: ./data-objek-wisata.php");
        exit();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $conn->close();
    $stmt->close();
}
?>
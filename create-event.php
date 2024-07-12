<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judulberita'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal_berakhir = $_POST['tanggal_berakhir'];

    // Upload Gambar
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["gambarberita"]["name"]);
    move_uploaded_file($_FILES["gambarberita"]["tmp_name"], $target_file);
    $gambar = basename($_FILES["gambarberita"]["name"]);

    $sql = "INSERT INTO event (judul, deskripsi, gambar, tanggal_berakhir) VALUES ('$judul', '$deskripsi', '$gambar', '$tanggal_berakhir')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: data-event.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

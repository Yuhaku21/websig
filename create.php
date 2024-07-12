<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judulberita'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_FILES['gambarberita']['name'];

    // Proses upload gambar
    if ($gambar != "") {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($gambar);
        if (move_uploaded_file($_FILES['gambarberita']['tmp_name'], $target_file)) {
            $gambar_path = $gambar;
        } else {
            $gambar_path = null;
        }
    }

    // Insert data into database
    $sql = "INSERT INTO berita (judul, deskripsi, gambar) VALUES ('$judul', '$deskripsi', '$gambar_path')";
    if ($conn->query($sql) === TRUE) {
        header("Location: data-berita.php"); // Redirect to the main page
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

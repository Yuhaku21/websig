<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $judul = $_POST['judulberita'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal_berakhir = $_POST['tanggal_berakhir'];

    // Handle file upload
    if (isset($_FILES['gambarberita']) && $_FILES['gambarberita']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['gambarberita']['tmp_name'];
        $fileName = $_FILES['gambarberita']['name'];
        $fileSize = $_FILES['gambarberita']['size'];
        $fileType = $_FILES['gambarberita']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $uploadFileDir = './uploads/';
        $dest_path = $uploadFileDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            // Update event with new image
            $sql = "UPDATE event SET judul = ?, deskripsi = ?, tanggal_berakhir = ?, gambar = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssi", $judul, $deskripsi, $tanggal_berakhir, $newFileName, $id);
        } else {
            echo "There was some error moving the file to upload directory.";
            exit();
        }
    } else {
        // Update event without changing the image
        $sql = "UPDATE event SET judul = ?, deskripsi = ?, tanggal_berakhir = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $judul, $deskripsi, $tanggal_berakhir, $id);
    }

    if ($stmt->execute()) {
        header("Location: data-event.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $stmt->close();
}
$conn->close();
?>

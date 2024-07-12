<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $judul = $_POST['judulberita'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_FILES['gambarberita']['name'];

    if (!empty($gambar)) {
        move_uploaded_file($_FILES['gambarberita']['tmp_name'], 'uploads/' . $gambar);
        $sql = "UPDATE berita SET judul='$judul', deskripsi='$deskripsi', gambar='$gambar' WHERE id=$id";
    } else {
        $sql = "UPDATE berita SET judul='$judul', deskripsi='$deskripsi' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: data-berita.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM berita WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include your existing HTML head code here -->
</head>
<body>
    <!-- Sidebar and other content here -->

    <div class="content">
        <h2><b>Edit Berita</b></h2>
        <div class="card">
            <div class="card-body">
                <form action="edit.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="mb-3">
                        <label for="gambarberita" class="form-label">Input Gambar Berita</label>
                        <input class="form-control" type="file" id="gambarberita" name="gambarberita" />
                    </div>
                    <div class="mb-3">
                        <label for="judulberita" class="form-label">Judul Berita</label>
                        <input type="text" class="form-control" id="judulberita" name="judulberita" value="<?php echo $row['judul']; ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Berita</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?php echo $row['deskripsi']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
    <!--MainContent-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>

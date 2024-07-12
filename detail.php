<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM berita WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Berita tidak ditemukan.";
        exit();
    }
} else {
    echo "ID berita tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detail Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-5">
        <h1><?php echo htmlspecialchars($row['judul']); ?></h1>
        <?php if (!empty($row['gambar'])) : ?>
            <img src="uploads/<?php echo htmlspecialchars($row['gambar']); ?>" class="img-fluid" alt="Gambar Berita" width="50%" height="50%">
        <?php endif; ?>
        <p><?php echo nl2br(htmlspecialchars($row['deskripsi'])); ?></p>
        <a href="data-berita.php" class="btn btn-primary">Kembali</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
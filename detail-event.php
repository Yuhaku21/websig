<?php
include 'config.php';

// Periksa apakah parameter ID tersedia di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data event berdasarkan ID
    $sql = "SELECT * FROM event WHERE id = $id";
    $result = $conn->query($sql);

    // Periksa apakah data event ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Event tidak ditemukan!";
        exit();
    }
} else {
    echo "ID event tidak ditemukan!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Detail Event</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <style>
    .container {
      max-width: 900px;
      margin: auto;
      padding-top: 20px;
    }
    .event-image {
      max-height: 400px;
      object-fit: cover;
    }
  </style>
</head>

<body>
  <!-- Main Content -->
  <div class="container">
    <div class="card mb-4 shadow-lg">
      <img src="uploads/<?php echo $row['gambar']; ?>" class="card-img-top event-image" alt="<?php echo $row['judul']; ?>" />
      <div class="card-body">
        <h3 class="card-title"><?php echo $row['judul']; ?></h3>
        <p class="card-text"><?php echo $row['deskripsi']; ?></p>
        <p class="card-text"><small class="text-muted">Event Berakhir: <?php echo $row['tanggal_berakhir']; ?></small></p>
        <a href="event.php" class="btn btn-dark">Kembali</a>
      </div>
    </div>
  </div>
  <!-- Main Content -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

<?php
include 'config.php';

// Fetch the event data to edit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM event WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $event = $result->fetch_assoc();
    $stmt->close();
} else {
    // Redirect if no ID is provided
    header("Location: data-event.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Event</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      display: flex;
    }

    .sidebar {
      width: 250px;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #343a40;
      color: white;
      padding-top: 20px;
    }

    .sidebar a {
      color: white;
      padding: 15px;
      text-decoration: none;
      display: block;
    }

    .sidebar a:hover {
      background-color: #495057;
    }

    .content {
      margin-left: 250px;
      padding: 20px;
      width: calc(100% - 250px);
    }

    .card {
      max-width: 900px;
    }
  </style>
</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h3 class="text-center">Admin Dashboard</h3>
    <a href="dashboard.html">Dashboard</a>
    <a href="data-objek-wisata.html">Data Objek Wisata</a>
    <a href="data-lokasi-penginapan.html">Data Lokasi Penginapan</a>
    <a href="data-touring-travel.html">Data Touring Travel</a>
    <a href="data-lokasi-restoran.html">Data Lokasi Restoran</a>
    <a href="data-event.html">Data Event</a>
    <a href="data-berita.html">Data Berita</a>
    <a href="#logout">Logout</a>
  </div>
  <!-- Sidebar -->

  <!-- Main Content -->
  <div class="content">
    <h2><b>Edit Event</b></h2>
    <div class="card">
      <div class="card-body">
        <form action="update-event.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $event['id']; ?>" />
          <div class="mb-3">
            <label for="gambarberita" class="form-label">Input Gambar Event</label>
            <input class="form-control" type="file" id="gambarberita" name="gambarberita" />
          </div>
          <div class="mb-3">
            <label for="judulberita" class="form-label">Judul Event</label>
            <input type="text" class="form-control" id="judulberita" name="judulberita" value="<?php echo htmlspecialchars($event['judul']); ?>" />
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Event</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?php echo htmlspecialchars($event['deskripsi']); ?></textarea>
          </div>
          <!-- Input untuk Tanggal Event Berakhir -->
          <div class="mb-3">
            <label for="tanggal_berakhir" class="form-label">Tanggal Event Berakhir</label>
            <input type="date" class="form-control" id="tanggal_berakhir" name="tanggal_berakhir" value="<?php echo htmlspecialchars($event['tanggal_berakhir']); ?>" />
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
  <!-- Main Content -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

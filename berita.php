<?php
include 'config.php';

// Fetch all records
$sql = "SELECT * FROM berita";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Event</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="#"><b>Wisata <span style="color: purple">Labuan Bajo</span></b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.html">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="event.php">Event</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="berita.php">Berita</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Eksplore </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="object-wisata.html">Object Wisata</a></li>
              <li><a class="dropdown-item" href="penginapan.html">Penginapan</a></li>
              <li><a class="dropdown-item" href="restoran.html">Restoran</a></li>
              <li><a class="dropdown-item" href="touring-travel.html">Touring Travel</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="visi-misi.html">Visi dan Misi</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--Navbar-->

  <!--MainContent-->
  <div class="container">
    <h3 class="text-center mt-5"><b>Berita</b></h3>

    <!--Data Berita dengan Card-->
    <div class="row mt-5">
      <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<div class="col-md-4 mb-4">
                  <div class="card" style="width: 18rem;">
                    <img src="uploads/' . htmlspecialchars($row['gambar']) . '" class="card-img-top" alt="Gambar Berita" style="width: 100%; height: 200px; object-fit: cover;">
                    <div class="card-body">
                      <h5 class="card-title">' . htmlspecialchars($row['judul']) . '</h5>
                      <a href="detail.php?id=' . $row['id'] . '" class="btn btn-primary">Lihat Detail</a>
                    </div>
                  </div>
                </div>';
        }
      } else {
        echo "<p>No records found</p>";
      }
      ?>
    </div>
  </div>
  <!--MainContent-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

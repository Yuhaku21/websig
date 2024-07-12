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
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
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
  <!--Sidebar-->
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
  <!--Sidebar-->

  <!--MainContent-->
  <div class="content">
    <h2><b>Halaman Data Berita</b></h2>
    <div class="card">
      <div class="card-body">
        <form action="create.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="gambarberita" class="form-label">Input Gambar Berita</label>
            <input class="form-control" type="file" id="gambarberita" name="gambarberita" />
          </div>
          <div class="mb-3">
            <label for="judulberita" class="form-label">Judul Berita</label>
            <input type="text" class="form-control" id="judulberita" name="judulberita" />
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Berita</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>
    </div>
    <div class="divider mt-4 p-3"></div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Judul Berita</th>
          <th scope="col">Preview Berita</th>
          <th scope="col">Aksi</th>
          <th scope="col">Detail</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
                            <th scope='row'>" . $row["id"] . "</th>
                            <td>" . $row["judul"] . "</td>
                            <td>" . substr($row["deskripsi"], 0, 50) . "...</td>
                            <td>
                                <a href='edit.php?id=" . $row["id"] . "' class='btn btn-warning'>Edit</a>
                                <a href='delete.php?id=" . $row["id"] . "' class='btn btn-danger'>Delete</a>
                            </td>
                            <td>
                                <a href='detail.php?id=" . $row["id"] . "' class='btn btn-info'>Lihat Detail</a>
                            </td>
                        </tr>";
          }
        } else {
          echo "<tr><td colspan='5'>Tidak Ada Data Berita !</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  <!--MainContent-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

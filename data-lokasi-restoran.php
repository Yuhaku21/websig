<?php include "./backend/lokasi-restoran.php" ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
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
        max-width: 900px; /* Ubah nilai ini sesuai dengan lebar yang diinginkan */
      }
      #map {
        height: 300px; /* Ubah tinggi sesuai kebutuhan */
        max-width: 900px;
      }
      .table .link-restoran {
        max-width: 150px;
        overflow: auto;
      }
    </style>
  </head>
  <body>
    <!--Sidebar-->
    <?php include "./layouts/sidebar.html" ?>
    <!--Sidebar-->

    <!--MainContent-->
    <div class="content">
      <h2><b>Halaman Data Lokasi Restoran</b></h2>
      <div class="card mt-4">
        <div class="card-body">
          <form method="post">
            <div class="mb-3">
              <label for="nama_restoran" class="form-label">Nama Restoran</label>
              <input type="text" class="form-control" id="nama_restoran" name="nama_restoran" />
            </div>
            <div class="mb-3">
              <label for="langtitude" class="form-label">Langtitude</label>
              <input type="number" step="any" class="form-control" id="langtitude" name="langtitude" />
            </div>
            <div class="mb-3">
              <label for="longtitude" class="form-label">Longtitude</label>
              <input type="number" step="any" class="form-control" id="longtitude" name="longtitude" />
            </div>
            <div class="mb-3">
              <label for="link_restoran" class="form-label">Link Restoran</label>
              <input type="text" class="form-control" id="link_restoran" name="link_restoran" />
            </div>
            <button type="submit" class="btn btn-success" name="tambahLokasiRestoran">Tambah Data Restoran</button>
          </form>
        </div>
      </div>

      <!-- Table -->
    <div class="table-responsive">
        <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Restoran</th>
            <th scope="col">Langtitude</th>
            <th scope="col">Longtitude</th>
            <th scope="col">Link Restoran</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($lokasi_restoran as $index=>$restoran) : ?>
            <tr>
              <th scope="row"><?php echo $index + 1 ?></th>
              <td><?php echo $restoran["nama_restoran"] ;?></td>
              <td><?php echo $restoran["langtitude"] ;?></td>
              <td><?php echo $restoran["longtitude"] ;?></td>
              <td class="link-restoran"><?php echo $restoran["link_restoran"] ;?></td>
              <td>
              <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal-<?php echo $index; ?>">Edit</button>
              <!-- Edit Modal -->
              <div class="modal fade" id="editModal-<?php echo $index; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Ubah Lokasi Restoran</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form method="post">
                        <input
                          type="hidden"
                          class="form-control"
                          id="id<?php echo $index; ?>"
                          name="id"
                          value="<?php echo $restoran["id"] ;?>"
                        />
                      <div class="mb-3">
                        <label for="nama_restoran<?php echo $index; ?>" class="form-label">Nama Restoran</label>
                        <input
                          required
                          type="text"
                          class="form-control"
                          id="nama_restoran_<?php echo $index; ?>"
                          name="nama_restoran"
                          value="<?php echo $restoran["nama_restoran"] ;?>"
                        />
                      </div>
                      <div class="mb-3">
                        <label for="langtitude_<?php echo $index; ?>" class="form-label">Langtitude</label>
                        <input
                          required
                          type="number"
                          step="any"
                          class="form-control"
                          id="langtitude_<?php echo $index; ?>"
                          name="langtitude"
                          value="<?php echo $restoran["langtitude"] ;?>"
                        />
                      </div>
                      <div class="mb-3">
                        <label for="longtitude_<?php echo $index; ?>" class="form-label">Longtitude</label>
                        <input
                          required
                          type="number"
                          step="any"
                          class="form-control"
                          id="longtitude_<?php echo $index; ?>"
                          name="longtitude"
                          value="<?php echo $restoran["longtitude"] ;?>"
                        />
                      </div>
                      <div class="mb-3">
                        <label for="link_restoran_<?php echo $index; ?>" class="form-label">Link Restoran</label>
                        <input
                          required
                          type="text"
                          class="form-control"
                          id="link_restoran_<?php echo $index; ?>"
                          name="link_restoran"
                          value="<?php echo $restoran["link_restoran"] ;?>"
                        />
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary" name="ubahLokasiRestoran">Simpan Perubahan</button>
                    </div>
                  </form>
                  </div>
                </div>
              </div>
              <!-- Edit Modal -->

             <!-- Delete Modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-<?php echo $index; ?>">
                    Delete
                </button>

              <!-- Modal -->
                <div class="modal fade" id="deleteModal-<?php echo $index; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Lokasi restoran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="" method="post">
                                <input type="hidden" name="id" id="id<?php echo $index; ?>" value="<?php echo $restoran["id"]; ?>">
                                Apakah anda yakin ingin menghapus lokasi restoran ini?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger" name="hapusLokasiRestoran">Hapus</button>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
              </td>
            </tr>
          <?php endforeach ;?>
        </tbody>
      </table>
      </div>
      <!-- Table -->

      <div id="map" class="mt-4"></div>
    </div>

    <!--MainContent-->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
      // Inisialisasi peta dan atur tampilan awal
      var map = L.map("map").setView([-8.6101156, 119.515702], 10); // Koordinat Jakarta, Indonesia

      // Tambahkan tile layer dari OpenStreetMap
      L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution:
          '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      }).addTo(map);

      // Tambahkan marker pada peta
      <?php foreach($lokasi_restoran as $restoran) : ?>
      var marker = L.marker([<?php echo $restoran["langtitude"] ?>, <?php echo $restoran["longtitude"] ?>])
        .addTo(map)
        .bindPopup("<b><?php echo $restoran["nama_restoran"] ?></b>")
        .openPopup();
      <?php endforeach; ?>  

      // Tambahkan popup pada peta saat di-klik
      var popup = L.popup();

      function onMapClick(e) {
        popup
          .setLatLng(e.latlng)
          .setContent("Anda mengklik peta pada " + e.latlng.toString())
          .openOn(map);
      }

      map.on("click", onMapClick);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

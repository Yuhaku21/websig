<?php include "./backend/touring-travel.php" ?>
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
      .table .link-travel {
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
      <h2><b>Halaman Data Touring Travel</b></h2>
      <div class="card mt-4">
        <div class="card-body">
          <form method="post">
            <div class="mb-3">
              <label for="nama_travel" class="form-label">Nama Travel</label>
              <input type="text" class="form-control" id="nama_travel" name="nama_travel" />
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
              <label for="link_travel" class="form-label">Link Travel</label>
              <input type="text" class="form-control" id="link_travel" name="link_travel" />
            </div>
            <button type="submit" class="btn btn-success" name="tambahTouringTravel">Tambah Data Travel</button>
          </form>
        </div>
      </div>

      <!-- Table -->
      <div class="table-responsive">
        <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Travel</th>
            <th scope="col">Langtitude</th>
            <th scope="col">Longtitude</th>
            <th scope="col">Link Travel</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($touring_travel as $index=>$travel) : ?>
            <tr>
              <th scope="row"><?php echo $index + 1 ?></th>
              <td><?php echo $travel["nama_travel"] ;?></td>
              <td><?php echo $travel["langtitude"] ;?></td>
              <td><?php echo $travel["longtitude"] ;?></td>
              <td class="link-travel"><?php echo $travel["link_travel"] ;?></td>
              <td>
              <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal-<?php echo $index; ?>">Edit</button>
              <!-- Edit Modal -->
              <div class="modal fade" id="editModal-<?php echo $index; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Ubah Travel</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form method="post">
                        <input
                          type="hidden"
                          class="form-control"
                          id="id<?php echo $index; ?>"
                          name="id"
                          value="<?php echo $travel["id"] ;?>"
                        />
                      <div class="mb-3">
                        <label for="nama_travel_<?php echo $index; ?>" class="form-label">Nama Travel</label>
                        <input
                          required
                          type="text"
                          class="form-control"
                          id="nama_travel_<?php echo $index; ?>"
                          name="nama_travel"
                          value="<?php echo $travel["nama_travel"] ;?>"
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
                          value="<?php echo $travel["langtitude"] ;?>"
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
                          value="<?php echo $travel["longtitude"] ;?>"
                        />
                      </div>
                      <div class="mb-3">
                        <label for="link_travel_<?php echo $index; ?>" class="form-label">Link Travel</label>
                        <input
                          required
                          type="text"
                          class="form-control"
                          id="link_travel_<?php echo $index; ?>"
                          name="link_travel"
                          value="<?php echo $travel["link_travel"] ;?>"
                        />
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary" name="ubahTouringTravel">Simpan Perubahan</button>
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
                                <h5 class="modal-title" id="exampleModalLabel">Hapus travel</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="" method="post">
                                <input type="hidden" name="id" id="id<?php echo $index; ?>" value="<?php echo $travel["id"]; ?>">
                                Apakah anda yakin ingin menghapus travel ini?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger" name="hapusTouringTravel">Hapus</button>
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
      <?php foreach($touring_travel as $travel) : ?>
      var marker = L.marker([<?php echo $travel["langtitude"] ?>, <?php echo $travel["longtitude"] ?>])
        .addTo(map)
        .bindPopup("<b><?php echo $travel["nama_travel"] ?></b>")
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

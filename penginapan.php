<?php include "./backend/lokasi-penginapan.php" ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Penginapan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  </head>
  <body>
    <!--Navbar-->
    <?php include "./layouts/navbar.html" ?>
    <!--Navbar-->

    <!--MainContent-->
    <h3 class="text-center mt-5"><b>Peta Informasi Penginapan</b></h3>
    <!--PetaSIG-->
    <div class="mt-4" id="map"></div>
    <!--PetaSIG-->
    <!--tempat wisata-->
    <h4 class="text-center mt-5">Yuk Kunjungi Penginapan yang Berada di Labuan Bajo</h4>
    <!--tempat wisata-->
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
      <?php foreach($lokasi_penginapan as $penginapan) : ?>
      var marker = L.marker([<?php echo $penginapan["langtitude"] ?>, <?php echo $penginapan["longtitude"] ?>])
        .addTo(map)
        .bindPopup("<b><?php echo $penginapan["nama_penginapan"] ?></b>")
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
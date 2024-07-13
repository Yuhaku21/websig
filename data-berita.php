<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
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
    </style>
  </head>
  <body>
    <!--Sidebar-->
    <?php include "./layouts/sidebar.html" ; ?>
    <!--Sidebar-->

    <!--MainContent-->
    <div class="content">
      <h2><b>Halaman Data Berita</b></h2>
    </div>
    <!--MainContent-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

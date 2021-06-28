<?php
session_start();
if (!isset($_SESSION['nim'])) {
  header("location: login.php");
}
   
include_once('./config/db.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="./vendors/bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Style CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- jQuery 3.6.0 -->
    <script defer src="./vendors/jQuery-3.6.0/jQuery.min.js"></script>
    <!-- Bootstrap Bundle with Popper -->
    <script defer src="./vendors/bootstrap-5.0.0-beta3-dist/js/bootstrap.bundle.min.js"></script>
    <!-- FontAwesome -->
    <script defer src="./vendors/fontawesome-free-5.15.3-web/js/all.min.js"></script>
    <!-- Script JS -->
    <script defer src="./assets/js/script.js"></script>
    <?php   
      $page = @$_GET['page'];
      $file = '';
      $title = '';
      if (isset($page)) {
        if ($page === '') {
          $file = 'dashboard.php';
          $title = 'Dashboard - ';
        } else if ($page === 'matkul') {
          $file = 'matkul.php';
          $title = 'Mata Kuliah - ';
        } else if ($page === 'khs') {
          $file = 'khs.php';
          $title = 'Laporan KHS - ';
        } else if ($page === 'profile') {
          $file = 'profile.php';
          $title = 'Data Pribadi - ';
        } else {
          $file = '404.php';
          $title = '404 Not Found - ';
        }
      } else {
        $file = 'dashboard.php';
        $title = 'Dashboard - ';
      }
    ?>
    <title><?= $title ?>Sistem Informasi Mahasiswa</title>
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar  -->
      <?php include('./components/sidebar.php'); ?>
      <!-- Page Content  -->
      <div id="main">
        <!-- Navbar -->
        <?php include('./components/navbar.php'); ?>
        <!-- Userinfo -->
        <div class='py-3 px-4 bg-warning text-light fs-5'>Selamat datang <?= $_SESSION['nama_lengkap'] ?> | Prodi: <?= $_SESSION['nama_prodi'] ?></div>
        <!-- Content -->
        <div id="content">
        <?php
          include('./pages/' . $file);
        ?>
        <!-- End div content -->
        </div>
      <!-- End div main -->
      </div>
    <!-- End div wrapper -->
    </div>
  </body>
</html>
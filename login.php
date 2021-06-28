<?php
session_start();
$error = false;
if (isset($_SESSION['nim'])) {
  header("location: index.php");
} else {
  $submit = @$_POST['submit'];
  $nim = @$_POST['nim'];
  $password = @$_POST['password'];
  $encodedPassword = md5($password);
  if (isset($submit)) {
    if($nim == '' || $password == '') {
      $error = true;
    } else {
      include_once('./config/db.php');
      $query = "SELECT biodata.nim, biodata.nama_lengkap, prodi.nama_prodi FROM biodata ";
      $query .= "LEFT JOIN prodi ON biodata.id_prodi = prodi.id ";
      $query .= "WHERE nim='$nim' AND password='$encodedPassword'";
      $result = $connect->query($query);
      if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['nim'] = $user['nim'];
        $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
        $_SESSION['nama_prodi'] = $user['nama_prodi'];
        header("location: index.php");
      } else {
        $error = true;
      }
    }
  }
}
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

    <style>
      html, body {
        height: 100%;
      }
      .container-fluid, .row, .full-height {
        height: 100%;
      }
    </style>

    <title>Masuk - Sistem Informasi Mahasiswa</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-0 col-md-4 d-none d-md-block bg-primary full-height position-relative">
          <img class='w-75 exact-center' src="./assets/img/login.svg"/>
        </div>
        <div class="col-sm-12 col-md-8 full-height">
          <div class="p-5">
            <h3 class="fw-bold mb-4">Login</h3>
            <?php
              if ($error) {
            ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
              <i class="fas fa-exclamation-triangle bi flex-shrink-0 me-2" width="24" height="24"></i>
              <div><strong>Gagal!</strong> NIM atau password salah</div>
            </div>
            <?php 
              }
            ?>
            <form method="POST">
              <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" name="nim" placeholder="Nomor Induk Mahasiswa">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="*******">
              </div>
              <div class="d-grid mb-4">
                <button class="btn btn-primary" name='submit' type="submit">Masuk</button>
              </div>
              <div class="mb-3 text-center">
                Belum punya akun? <a href="register.php" class='fs-6 link-primary'>Daftar</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
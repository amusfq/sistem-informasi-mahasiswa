<div class="row">
   <div class="col-md-3 border-right">
      <div class="d-flex flex-column align-items-center text-center p-3">
         <img class="rounded-circle mt-5 object-cover" width="150px" height="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
         <span class="font-weight-bold"><?= $_SESSION['nama_lengkap'] ?></span>
      </div>
   </div>
   <?php
        $success = false;
        $error = false;

      if(isset($_POST['simpan'])) {
        $query = "UPDATE biodata SET ";
        $query .= "nama_lengkap='". $_POST['nama_lengkap'] ."', ";
        $query .= "jenis_kelamin='". $_POST['jenis_kelamin'] ."', ";
        $query .= "tempat_lahir='". $_POST['tempat_lahir'] ."', ";
        $query .= "tanggal_lahir='". $_POST['tanggal_lahir'] ."', ";
        $query .= "golongan_darah='". $_POST['golongan_darah'] ."', ";
        $query .= "agama='". $_POST['agama'] ."', ";
        $query .= "alamat='". $_POST['alamat'] ."', ";
        $query .= "no_telepon='". $_POST['no_telepon'] ."'";
        $query .= "WHERE nim='" . $_SESSION['nim'] . "'";
        $result = $connect->query($query);
        if ($result) {
            $success = true;
            $_SESSION['nama_lengkap'] = $_POST['nama_lengkap'];
        } else {
            $error = true;
        }
      }

      $query = "SELECT biodata.*, prodi.nama_prodi, fakultas.nama_fakultas FROM biodata ";
      $query .= "LEFT JOIN prodi ON biodata.id_prodi = prodi.id ";
      $query .= "LEFT JOIN fakultas ON prodi.id_fakultas = fakultas.id ";
      $query .= "WHERE nim='" . $_SESSION['nim'] . "'";
      
      $result = $connect->query($query);
      if ($result->num_rows > 0) {
         $user = $result->fetch_assoc();
      } else {
         header("location: login.php");
      }
   
   ?>
   <div class="col-md-5 border-right">
      <div class="p-3">
         <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-right">Data Mahasiswa</h4>
         </div>
         <?php if ($success) {?>
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <i class="fas fa-check bi flex-shrink-0 me-2" width="24" height="24"></i>
            <div><strong>Berhasil!</strong> Biodata berhasil diperbarui</div>
        </div>
        <?php } ?>
         <?php if ($error) {?>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <i class="fas fa-exclamation-triangle bi flex-shrink-0 me-2" width="24" height="24"></i>
            <div><strong>Gagal!</strong> Biodata gagal diperbarui</div>
        </div>
        <?php } ?>
         <div class="d-flex justify-content-between align-items-center">
            <h6 class="text-right">Biodata Diri</h6>
         </div>
         <form method="POST">
            <div class="row mt-2">
                <div class="col-md-12 mb-2">
                <label class="labels">NIM</label>
                <input type="text" class="form-control" placeholder="Nomor Induk Mahasiswa" value="<?= $user['nim'] ?>" readonly>
                </div>
                <div class="col-md-12 mb-2">
                <label class="labels">Nama Lengkap</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap" name='nama_lengkap' value="<?= $user['nama_lengkap'] ?>">
                </div>
                <div class="col-md-12 mb-2">
                <label class="labels">Jenis Kelamin</label>
                <select class="form-select" aria-label="Jenis Kelamin" name='jenis_kelamin'>
                    <option>Pilih Jenis Kelamin</option>
                    <option value="0" <?php if ($user['jenis_kelamin'] == 0) echo 'selected'; ?>>Laki-laki</option>
                    <option value="1" <?php if ($user['jenis_kelamin'] == 1) echo 'selected'; ?>>Perempuan</option>
                </select>
                </div>
                <div class="col-md-6 mb-2">
                <label class="labels">Tempat Lahir</label>
                <input type="text" class="form-control" placeholder="Tempat lahir" name='tempat_lahir' value="<?= $user['tempat_lahir'] ?>">
                </div>
                <div class="col-md-6 mb-2">
                <label class="labels">Tanggal Lahir</label>
                <input type="date" class="form-control" placeholder="Tanggal Lahir" name='tanggal_lahir' value="<?= $user['tanggal_lahir'] ?>">
                </div>
                <div class="col-md-6 mb-2">
                <label class="labels">Golongan Darah</label>
                <select class="form-select" aria-label="Golongan Darah" name='golongan_darah'>
                    <option selected>Pilih Golongan Darah</option>
                    <option value="0" <?php if ($user['golongan_darah'] == 0) echo 'selected'; ?>>A</option>
                    <option value="1" <?php if ($user['golongan_darah'] == 1) echo 'selected'; ?>>B</option>
                    <option value="2" <?php if ($user['golongan_darah'] == 2) echo 'selected'; ?>>AB</option>
                    <option value="3" <?php if ($user['golongan_darah'] == 3) echo 'selected'; ?>>O</option>
                </select>
                </div>
                <div class="col-md-6 mb-2">
                <label class="labels">Agama</label>
                <select class="form-select" aria-label="Agama" name='agama'>
                    <option selected>Pilih Agama</option>
                    <option value="0" <?php if ($user['agama'] == 0) echo 'selected'; ?>>Islam</option>
                    <option value="1" <?php if ($user['agama'] == 1) echo 'selected'; ?>>Kristen</option>
                    <option value="2" <?php if ($user['agama'] == 2) echo 'selected'; ?>>Katholik</option>
                    <option value="3" <?php if ($user['agama'] == 3) echo 'selected'; ?>>Hindu</option>
                    <option value="4" <?php if ($user['agama'] == 4) echo 'selected'; ?>>Budha</option>
                    <option value="5" <?php if ($user['agama'] == 5) echo 'selected'; ?>>Konghucu</option>
                    <option value="6" <?php if ($user['agama'] == 6) echo 'selected'; ?>>Protestan</option>
                </select>
                </div>
                <div class="col-md-12 mb-2">
                <label class="labels">Alamat</label>
                <textarea class="form-control" id="alamat" rows="3" name='alamat'><?= $user['alamat'] ?></textarea>
                </div>
                <div class="col-md-12 mb-4">
                <label class="labels">No Telepon</label>
                <input type="text" class="form-control" placeholder="Nomor Telepon" name="no_telepon" value="<?= $user['no_telepon'] ?>">
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="text-right">Informasi Akademik</h6>
            </div>
            <div class="row mt-2">
                <div class="col-md-12 mb-2">
                <label class="labels">Fakultas</label>
                <input type="text" class="form-control" placeholder="Fakultas" value="<?= $user['nama_fakultas'] ?>" readonly>
                </div>
                <div class="col-md-12 mb-2">
                <label class="labels">Prodi</label>
                <input type="text" class="form-control" placeholder="Prodi" value="<?= $user['nama_prodi'] ?>" readonly>
                </div>
                <div class="col-md-12 mb-3">
                <label class="labels">Status Mahasiswa</label>
                <input type="text" class="form-control" placeholder="Status Mahasiswa" value="<?= ($user['status'] == 1) ? "Aktif" : "Tidak Aktif" ?>" readonly>
                </div>
            </div>
            <div class="text-right">
                <button class="btn btn-primary profile-button" type="submit" name='simpan'>Simpan Perubahan</button>
            </div>
         </form>
      </div>
   </div>
   <?php
      $errorPass = false;    
      $errorText = "";
      $successPass = false;
      if(isset($_POST['updatePassword'])) {
          $passwordLama = md5($_POST['password_lama']);
          $passwordBaru = md5($_POST['password_baru']);
          $konfirmasiPasswordBaru = md5($_POST['konfirmasi_password_baru']);
          if ($passwordLama == '') {
            $errorPass = true;
            $errorText = 'Password lama tidak boleh kosong';
          } else if ($passwordBaru == '') { 
            $errorPass = true;
            $errorText = 'Password baru tidak boleh kosong';
          } else if ($passwordBaru != $konfirmasiPasswordBaru) {
            $errorPass = true;
            $errorText = 'Konfirmasi password tidak sama';
          } else {
              $errorPass = false;
              $query = "SELECT nim FROM biodata WHERE nim='" . $_SESSION['nim'] . "' AND password='". $passwordLama ."'";
              $result = $connect->query($query);
              if ($result->num_rows > 0) {
                  $query = "UPDATE biodata SET password='". $passwordBaru ."' WHERE nim='". $_SESSION['nim'] ."'";
                  $result = $connect->query($query);
                  if ($result) {
                    $successPass = true;
                  } else {
                    $errorPass = true;
                    $errorText = "Gagal memperbarui password";
                  }
              } else {
                  $errorPass = true;
                  $errorText = "Password lama salah";
              }
          }
      }
   ?>
   <div class="col-md-4 mt-5">
      <div class="p-3">
         <?php if ($successPass) { ?>
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <i class="fas fa-check bi flex-shrink-0 me-2" width="24" height="24"></i>
            <div><strong>Berhasil!</strong> Password berhasil diperbarui</div>
        </div>
        <?php } ?>
         <?php if ($errorPass) { ?>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <i class="fas fa-exclamation-triangle bi flex-shrink-0 me-2" width="24" height="24"></i>
            <div><strong>Gagal!</strong> <?= $errorText ?></div>
        </div>
        <?php } ?>
         <div class="d-flex justify-content-between align-items-center fw-bold mb-3">
           <span>Ubah Password Login</span>
         </div>
         <form method='POST'>
            <div class="col-md-12 mb-2">
                <label class="labels">Password Lama</label>
                <input type="password" class="form-control" placeholder="Password lama" name='password_lama' value="">
            </div>
            <div class="col-md-12 mb-2">
                <label class="labels">Password Baru</label>
                <input type="password" class="form-control" placeholder="Password lama" name='password_baru' value="">
            </div>
            <div class="col-md-12 mb-3">
                <label class="labels">Konfirmasi Password Baru</label>
                <input type="password" class="form-control" placeholder="Password lama" name='konfirmasi_password_baru' value=''>
            </div>
            <div class="text-right">
                <button class="btn btn-primary profile-button" name='updatePassword' type="submit">Update Password</button>
            </div>
        </form>
      </div>
   </div>
</div>
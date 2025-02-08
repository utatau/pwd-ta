<?php
require_once "inc/header.php";
require_once "inc/links.php";
if (isset($_POST['submit'])) {
  $user = $_POST['user'];
  $email = $_POST['email'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $telepon = $_POST['telepon'];
  $pass = md5($_POST['pass']);

  $sqlsimpan = $pdo->query("INSERT INTO tamu VALUES('', '$user', '$email', '$nama', '$alamat', '$telepon', '$pass', '')");

  echo "<script>swal({
        type: 'success',
        title: 'Registrasi Sukses!',
        showConfirmButton: false,
        backdrop: 'rgba(0,0,123,0.5)',
        });
        window.setTimeout(function(){
            window.location.replace('login');
        } ,1500);</script>";
}
?>
<section class="bg-light py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <!-- <div class="text-center mb-3">
              <a href="#!">
                <img src="./assets/img/bsb-logo.svg" alt="BootstrapBrain Logo" width="175" height="57">
              </a>
            </div> -->
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Masukkan identitas anda</h2>
            <form method="post" action="daftar" enctype="multipart/form-data">
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="user" placeholder="username" required>
                    <label for="username" class="form-label">Username</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                    <label for="email" class="form-label">email</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nama" placeholder="nama lengkap" required>
                    <label for="nama Lengkap" class="form-label">Nama Lengkap</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                    <label for="alamat" class="form-label">Alamat</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="telepon" placeholder="Nomor HP" required>
                    <label for="noTelepon" class="form-label">No Telepon</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="pass" placeholder="Password" required>
                    <label for="Password" class="form-label">Password</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-grid my-3">
                    <input type="submit" name="submit" value="Daftar" class="btn btn-primary btn-lg" type="submit"></input>
                  </div>
                </div>
                <div class="col-12">
                  <p class="m-0 text-secondary text-center">Sudah Memiliki Akun? <a href="login" class="link-primary text-decoration-none">Sign in</a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
require_once "inc/footer.php"
?>
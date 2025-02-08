<?php
require_once "inc/header.php";
require_once "inc/links.php";
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sqll = $pdo->query("SELECT * FROM tamu WHERE username='$username' && password='$password'");
    $cari = $sqll->rowCount();
    $akses = $sqll->fetch();

    if ($cari) {

        $_SESSION['user'] = $akses['idtamu'];
        echo "<script>swal({
        type: 'success',
        title: 'Login Sukses!',
        showConfirmButton: false,
        backdrop: 'rgba(0,0,123,0.5)',
        });
        window.setTimeout(function(){
            window.location.replace('user/');
        } ,1500); </script>";
    } else {
        echo "<script>swal({
        type: 'error',
        title: 'Login Gagal!',
        showConfirmButton: false,
        backdrop: 'rgba(123,0,0,0.5)',
        });
        window.setTimeout(function(){
            window.location.replace('login');
        } ,1500); </script>";
    }
}
?>

<!-- <div id="page">
    <center>
        <li>Silahkan Login</li>
        <form method="post" action="login">
            <table style="margin-top: 10px; margin-bottom: 10px;">
                <tr>
                    <td style="width:100px;">Username</td>
                    <td><input type="text" placeholder="Nama Pengguna" name="username"></td>
                </tr>
                <td></td>
                <td></td>
                <tr>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" placeholder="Kata Sandi" name="password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Login" style="background:rgba(255,0,0,0.8);;color:white;padding:10px;width:80px;border:1px solid #fff;"></td>
                </tr>
            </table>
        </form>
    </center>
</div> -->

<section class="bg-light py-3 py-md-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <div class="card border border-light-subtle rounded-3 shadow-sm">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Masukkan Akun Anda</h2>
                        <form action="login" method="post">
                            <div class="row gy-2 overflow-hidden">
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                                        <label for="username" class="form-label">Username</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                        <label for="lastName" class="form-label">Password</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid my-3">
                                        <button type="submit" name="submit" value="Login" class="btn btn-primary btn-lg" type="submit">Login</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p class="m-0 text-secondary text-center">Belum Memiliki Akun? <a href="daftar" class="link-primary text-decoration-none">Daftar</a></p>
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
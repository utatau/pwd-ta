<?php
include "fungsi/koneksi.php";
require_once "inc/links.php";
session_start();
if (isset($_SESSION['ceklog'])) {
    echo "<script>window.location.replace('beranda.php')</script>";
} else {
    unset($_SESSION['ceklog']);
?>
    <section class="bg-light py-3 py-md-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card border border-light-subtle rounded-3 shadow-sm">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">ADMIN LOGIN</h2>
                            <form method="post" action="fungsi/proseslogin">
                                <div class="row gy-2 overflow-hidden">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" placeholder="Nama Pengguna" name="username" required>
                                            <label for="username" class="form-label">Username</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="password" placeholder="Kata Sandi" name="password" required>
                                            <label for="password" class="form-label">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid my-3">
                                            <button type="submit" name="submit" value="Login" class="btn btn-primary btn-lg" type="submit">Login</button>
                                        </div>
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
}
require_once 'inc/footer.php';
?>
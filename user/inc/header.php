<?php
session_start();
require_once "../fungsi/koneksi.php";

if (!isset($_SESSION['user'])) {
    //unset($_SESSION['user']);
    //echo "<script>window.location.replace('../fungsi/load.php')</script>";
?>
    <html>

    <head>
        <script type="text/javascript" src="../lib/sweet.js"></script>
    </head>

    <body>
        <script>
            swal({
                title: 'Oops...?',
                text: 'Silahkan Login Terlebih Dahulu!',
                showConfirmButton: false,
                type: 'warning',
                backdrop: 'rgba(123,0,0,1)',
            });
            window.setTimeout(function() {
                window.location.replace('../');
            }, 2000);
        </script>;
    </body>

    </html>
<?php
}

$ambil = $_SESSION['user'];
$sql = $pdo->query("SELECT * FROM tamu WHERE idtamu='$ambil'");
$data = $sql->fetch();
$id = $data['idtamu'];
$username = $data['username'];
$email = $data['email'];
$alamat = $data['alamat'];
$telepon = $data['telepon'];
$password = $data['password'];
$nama = $data['nama'];
$foto = $data['foto'];

$bts = 22;
$nmak = strlen($nama);
if ($nmak > $bts) {
    $nm = substr($nama, 0, $bts) . '...';
} else {
    $nm = $nama;
}

?>

<head>
    <?php require_once "links.php"; ?>
    <script type="text/javascript" src="lib/sweet.js"></script>
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">HotelKu.Co</a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active me-2" href="index.php">Beranda</a></li>
                <li class="nav-item"><a class="nav-link me-2" href="kamar">Kamar</a></li>
                <li class="nav-item"><a class="nav-link me-2" href="fasilitas">Fasilitas</a></li>
                <li class="nav-item"><a class="nav-link me-2" href="datapesanan">Data Reservasi</a></li>
                <li class="nav-item"><a class="nav-link me-2" href="kontak">Kontak</a></li>
            </ul>
            <div class="d-flex">
                <a type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" href="profil">Profil</a>
                <a type="button" class="btn btn-outline-dark shadow-none" href="../fungsi/proseskeluar.php">Keluar</a>
            </div>
        </div>
    </div>
</nav>
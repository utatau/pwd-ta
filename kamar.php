<?php
require_once "inc/header.php";
require_once "inc/links.php";
?>
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>
<div class="container">
    <div class="row justify-content-center">
        <?php
        $sql = $pdo->query("SELECT * FROM kamar");
        while ($data = $sql->fetch()) {
            $id = $data['idkamar'];
            $tipe = $data['tipe'];
            $jumlah = $data['jumlah'];
            $harga = $data['harga'];
            $gambar = $data['gambar'];

            $angka = number_format($harga, 0, ",", ".");

            $sqly = $pdo->query("SELECT * FROM stokkamar WHERE idkamar=$id");
            while ($datay = $sqly->fetch()) {
                $stok = $datay['stok'];
        ?>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="card border-0 shadow h-100 d-flex flex-column">
                        <img src="simpangambar/<?php echo $gambar ?>"
                            class="card-img-top w-100 img-fluid object-fit-cover">
                        <div class="card-body d-flex flex-column">
                            <h5 class="text-center"><?php echo $tipe ?></h5>
                            <h6 class="mb-4 text-center">Rp. <?php echo $angka ?> permalam</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap text-center">
                                <?php echo $stok ?> Kamar
                            </span>
                            <a href="user/pemesanan" class="btn btn-dark w-100 mt-auto">Pesan</a>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>


<?php
require_once "inc/footer.php"
?>
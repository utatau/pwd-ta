<?php
require_once "inc/header.php";
require_once "inc/links.php";
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
        <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>
        <div class="container">
            <form method="POST" action="pemesanan?id=<?php echo $id ?>">
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
                                <div class="card border-0 shadow">
                                    <img src="../simpangambar/<?php echo $gambar; ?>" class="card-img-top">
                                    <div class="card-body">
                                        <h5><?php echo $tipe; ?></h5>
                                        <h6 class="mb-4">Rp. <?php echo $angka; ?> permalam</h6>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap"><?php echo $stok; ?> Kamar</span>
                                        <button type="submit" name="klik" value="Pesan" class="btn btn-dark w-100"> Pesan</button>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
        <?php
    }
}
        ?>
            </form>
        </div>


        <?php
        require_once "inc/footer.php"
        ?>
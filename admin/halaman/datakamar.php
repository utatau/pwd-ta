<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>
<div class="container">
    <div class="row justify-content-center">
        <?php
        include "fungsi/koneksi.php";
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
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4">
                    <div class="card border-0 shadow h-100">
                        <img src="../simpangambar/<?php echo $gambar; ?>" class="card-img-top" style="object-fit: cover; width: 100%; height: 200px;" alt="<?php echo $tipe; ?>">
                        <div class="card-body d-flex flex-column">
                            <h5 class="text-center"><?php echo $tipe; ?></h5>
                            <h6 class="text-center mb-3">Rp. <?php echo $angka; ?> per malam</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap text-center">Tersisa: <?php echo $jumlah; ?> Kamar</span>
                            <div class="mt-auto d-flex justify-content-center gap-2">
                                <a href="editkamar?id=<?php echo $id; ?>" class="btn btn-info btn-fill btn-wd">Edit</a>
                                <a href="fungsi/hapuskamar?id=<?php echo $id; ?>" onclick="return confirm('Anda yakin ingin menghapus kamar ini?')" class="btn btn-danger btn-fill btn-wd">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Stok Kamar</h2>
<div class="container">
    <div class="row justify-content-center">
        <?php
        include "fungsi/koneksi.php";
        $sql = $pdo->query("SELECT * FROM stokkamar");
        while ($data = $sql->fetch()) {
            $id = $data['idkamar'];
            $tipe = $data['tipe'];
            $stok = $data['stok'];

            $sql2 = $pdo->query("SELECT * FROM kamar WHERE idkamar=$id");
            while ($data2 = $sql2->fetch()) {
                $gambar = $data2['gambar'];
        ?>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4">
                    <div class="card border-0 shadow h-100">
                        <img src="../simpangambar/<?php echo $gambar; ?>" class="card-img-top" style="object-fit: cover; width: 100%; height: 200px;" alt="<?php echo $tipe; ?>">
                        <div class="card-body d-flex flex-column">
                            <h5 class="text-center"><?php echo $tipe; ?></h5>
                            <span class="badge rounded-pill bg-light text-dark text-wrap text-center">Tersisa: <?php echo $stok; ?> Kamar</span>
                            <div class="mt-auto d-flex justify-content-center gap-2">
                                <a href="editstok?id=<?php echo $id; ?>" class="btn btn-info btn-fill btn-wd">Edit</a>
                                <a href="fungsi/hapusstok?id=<?php echo $id; ?>" onclick="return confirm('Anda yakin ingin menghapus stok ini?')" class="btn btn-danger btn-fill btn-wd">Hapus</a>
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
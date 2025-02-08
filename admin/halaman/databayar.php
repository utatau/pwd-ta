<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Data Bayar</h2>
<div class="col-md-12">
    <div class="card">
        <div class="content">
            <div class="table-responsive content table-full-width">
                <table class="table table-striped text-center">
                    <thead class="table-danger text-white">
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Bank</th>
                            <th>No Rekening</th>
                            <th>Nama Pemilik Rekening</th>
                            <th>Bukti Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = $pdo->query("SELECT * FROM pembayaran");
                        while ($caridata = $sql->fetch()) {
                            $id = $caridata['idpesan'];
                            $nama = $caridata['nama'];
                            $jumlah = $caridata['jumlah'];
                            $bank = $caridata['bank'];
                            $norek = $caridata['norek'];
                            $namarek = $caridata['namarek'];
                            $gambar = $caridata['gambar'];
                        ?>
                            <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $nama ?></td>
                                <td><?php echo $jumlah ?></td>
                                <td><?php echo $bank ?></td>
                                <td><?php echo $norek ?></td>
                                <td><?php echo $namarek ?></td>
                                <td><?php echo $gambar ?></td>
                                <td>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="text-center mt-3">

                    <a href="laporan-pembayaran" target="_blank"><button id="laporan" class="btn btn-info btn-fill btn-wd">Cetak Laporan</button></a>
                </div>

            </div>
        </div>
    </div>
</div>
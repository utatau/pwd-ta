<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Transaksi Batal</h2>
<div class="col-md-12">
    <div class="card">
        <div class="content">
            <div class="table-responsive content table-full-width">
                <table class="table table-striped text-center">
                    <thead class="table-danger text-white">
                        <tr>
                            <th>ID</th>
                            <th>Tgl</th>
                            <th>Tipe</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Lama</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = $pdo->query("SELECT * FROM pemesanan ORDER BY idpesan DESC");
                        while ($datax = $sql->fetch()) {
                            $idpesan = $datax['idpesan'];
                            $tglpesann = date('d/m/Y', strtotime($datax['tglpesan']));
                            $tglmasukk = date('d/m/Y', strtotime($datax['tglmasuk']));
                            $tglkeluarr = date('d/m/Y', strtotime($datax['tglkeluar']));
                            $hargaa = number_format($datax['harga'], 0, ",", ".");
                            $angka = number_format($datax['totalbayar'], 0, ",", ".");
                            $status = $datax['status'];

                            if ($status == 'Dibatalkan') {
                        ?>
                                <tr>
                                    <td><?php echo $idpesan ?></td>
                                    <td><?php echo $tglpesann ?></td>
                                    <td><?php echo $datax['tipe'] ?></td>
                                    <td><?php echo $hargaa ?></td>
                                    <td><?php echo $datax['jumlah'] ?></td>
                                    <td><?php echo $datax['nama'] ?></td>
                                    <td><?php echo $datax['telepon'] ?></td>
                                    <td><?php echo $tglmasukk ?></td>
                                    <td><?php echo $tglkeluarr ?></td>
                                    <td><?php echo $datax['lamahari'] ?> hari</td>
                                    <td><?php echo $angka ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-3">
                <a href="laporan-transaksi" target="_blank">
                    <button id="laporan" class="btn btn-info btn-fill btn-wd" style="width: 150px; padding: 4px; border: 2px solid white;">Cetak Laporan</button>
                </a>
            </div>
        </div>
    </div>
</div>
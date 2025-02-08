<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Konfirmasi Pesanan</h2>
<div class="col-md-12">
    <div class="card">
        <div class="content">
            <div class="table-responsive content table-full-width">
                <table class="table table-striped text-center">
                    <thead class="table-danger text-white">
                        <tr>
                            <th>Kd</th>
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
                            <th>Status</th>
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

                            if ($status == 'Pending...') {
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
                                    <td>
                                        <a href="fungsi/proseskonfirmasi?id=<?php echo $idpesan ?>" class="btn btn-info btn-fill btn-wd">Konfirmasi</a>
                                        <a href="fungsi/prosesbatal?id=<?php echo $idpesan ?>" class="btn btn-danger btn-fill btn-wd">Batalkan</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
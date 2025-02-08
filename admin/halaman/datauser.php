<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Data User</h2>
<div class="col-md-12">
    <div class="card">
        <div class="content">
            <div class="table-responsive content table-full-width">
                <?php
                include "fungsi/koneksi.php";
                $sql = $pdo->query("SELECT * FROM tamu");
                ?>
                <table class="table table-striped text-center">
                    <thead class="table-danger text-white">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($caridata = $sql->fetch()) { ?>
                            <tr>
                                <td><?php echo $caridata['idtamu']; ?></td>
                                <td><?php echo $caridata['username']; ?></td>
                                <td><?php echo $caridata['email']; ?></td>
                                <td><?php echo $caridata['nama']; ?></td>
                                <td><?php echo $caridata['alamat']; ?></td>
                                <td><?php echo $caridata['telepon']; ?></td>
                                <td>
                                    <a href="fungsi/hapususer?id=<?php echo $caridata['idtamu']; ?>"
                                        onclick="return confirm('Hapus User?')"
                                        class="btn btn-danger btn-fill btn-wd">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
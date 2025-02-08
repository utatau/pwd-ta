<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Edit Kamar</h2>
<div class="container">
    <div class="row justify-content-end">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Edit Data Kamar</h4>
                </div>
                <div class="card-body">
                    <?php
                    include "fungsi/koneksi.php";
                    $ambil = $_GET['id'];
                    $sql = $pdo->query("SELECT * FROM kamar WHERE idkamar='$ambil'");
                    $data = $sql->fetch();
                    $id = $data['idkamar'];
                    $tipe = $data['tipe'];
                    $jumlah = $data['jumlah'];
                    $harga = $data['harga'];
                    $gambar = $data['gambar'];
                    ?>
                    <form method="post" action="fungsi/prosesedit" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>ID Kamar</label>
                            <input type="text" name="id" class="form-control" value="<?php echo $id ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tipe</label>
                            <select name="edittipe" class="form-control" required>
                                <option selected hidden><?php echo $tipe ?></option>
                                <option>Standard</option>
                                <option>Superior</option>
                                <option>Deluxe</option>
                                <option>Junior Suite</option>
                                <option>Suite</option>
                                <option>Executive</option>
                                <option>Presidential/Penthouse</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="text" name="editjumlah" class="form-control" value="<?php echo $jumlah ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="editharga" class="form-control" value="<?php echo $harga ?>" required>
                        </div>
                        <div class="form-group text-center">
                            <label>Gambar Saat Ini</label><br>
                            <img src="../simpangambar/<?php echo $gambar ?>" class="img-fluid rounded" width="250">
                        </div>
                        <div class="form-group">
                            <label>Gambar Baru</label>
                            <input type="file" name="editgambar" class="form-control">
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="datakamar" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
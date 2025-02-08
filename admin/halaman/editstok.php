<div class="col-md-4">
    <div class="card">
        <div class="header">
            <div class="title">
                Edit Stok Kamar
            </div>
            <div class="content">
                <?php
                include "fungsi/koneksi.php";
                $ambil = $_GET['id'];
                $sql = $pdo->query("SELECT * FROM stokkamar WHERE idkamar='$ambil'");
                $data = $sql->fetch();
                $id = $data['idkamar'];
                $tipe = $data['tipe'];
                $stok = $data['stok'];
                ?>

                <form method="post" action="fungsi/proseseditstok" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>ID Kamar</label>
                                <input type="text" readonly="true" name="id" value="<?php echo $id ?>" class="form-control border-input">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tipe Kamar</label>
                                <input type="text" readonly="true" name="edittipe" value="<?php echo $tipe ?>" class="form-control border-input">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Stok Kamar</label>
                                <input type="text" required="required" name="editstok" value="<?php echo $stok ?>" class="form-control border-input">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>ID Kamar</label>
                                <input type="text" readonly="true" name="id" value="<?php echo $id ?>" class="form-control border-input">
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update</button>
                    </div>
                    <div class="text-center">
                        <a href="stokkamar">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
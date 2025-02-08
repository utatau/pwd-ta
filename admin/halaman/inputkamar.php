<div class="col-md-4">
    <div class="card">
        <div class="header">
            <h4 class="title">
                Input Data Kamar
            </h4>
        </div>
        <div class="content">
            <form method="post" action="fungsi/prosesinput" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>ID Kamar</label>
                            <input type="text" name="id" class="form-control border-input" placeholder="ID KAMAR" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tipe</label>
                            <select name="tipe" required="required" class="form-control border-input">
                                <option selected="selected" disabled="disabled">--Pilih--</option>
                                <option>Standard</option>
                                <option>Superior</option>
                                <option>Deluxe</option>
                                <option>Junior Suite</option>
                                <option>Suite</option>
                                <option>Executive</option>
                                <option>Presidential/Penthouse</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Jumlah Kamar</label>
                            <input type="text" required="required" name="jumlah" class="form-control border-input" placeholder="Jumlah" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" required="required" name="harga" class="form-control border-input" placeholder="Harga" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" required="required" name="gambar" class="form-control border-input" placeholder="Gambar">
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-info btn-fill btn-wd" name="submit">Tambah Tipe Kamar</button>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
<table>
    <!-- <tr>
                       
                        <td>Gambar</td>
                        <td><input type="file" required="required" name="gambar"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit" style="width:100px;background:#B40301; color:white;font-weight:bold;padding:4px;border:2px solid #B40301;">Simpan</button></td>
                    </tr>
                </table> -->
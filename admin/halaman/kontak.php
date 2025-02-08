<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <h5 class="text-center p-2 bg-dark text-white">Kontak</h5>
                <?php
                include "fungsi/koneksi.php";
                $sql_users = $pdo->query("SELECT DISTINCT username FROM kontak");
                while ($user = $sql_users->fetch()) {
                ?>
                    <a href="?user=<?php echo urlencode($user['username']); ?>" class="list-group-item list-group-item-action">
                        <?php echo htmlspecialchars($user['username']); ?>
                    </a>
                <?php } ?>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-body" style="max-height: 100%; overflow-y: auto; padding: 15px;">
                    <?php
                    if (isset($_GET['user'])) {
                        $selected_user = $_GET['user'];
                        $sql = $pdo->prepare("SELECT * FROM kontak WHERE username = ?");
                        $sql->execute([$selected_user]);
                        while ($data = $sql->fetch()) {
                            $pesanuser = $data['pesanuser'];
                            $pesanadmin = $data['pesanadmin'];
                    ?>
                            <?php if (!empty($pesanuser)) { ?>
                                <div class="d-flex justify-content-start mb-3">
                                    <div class="bg-danger text-white p-3 rounded text-left" style="max-width: 70%; border-radius: 15px; margin:10px;">
                                        <strong><?php echo htmlspecialchars($selected_user); ?></strong><br>
                                        <?php echo htmlspecialchars($pesanuser); ?>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (!empty($pesanadmin)) { ?>
                                <div class="d-flex justify-content-end mb-3">
                                    <div class=" bg-warning text-dark p-3 rounded text-right" style="max-width: 70%; border-radius: 15px; margin:10px;">
                                        <strong>Admin</strong><br>
                                        <?php echo htmlspecialchars($pesanadmin); ?>
                                    </div>
                                </div>
                            <?php } ?>
                    <?php }
                    } ?>
                </div>
                <div class="card-footer content card-full-width">
                    <?php if (isset($selected_user)) { ?>
                        <form method="post" action="fungsi/proseskontak.php">
                            <input type="hidden" name="username" value="<?php echo htmlspecialchars($selected_user); ?>">
                            <div class="input-group">
                                <textarea name="tekss" class="form-control" required placeholder="Ketikkan pesan..."></textarea>
                                <button type="submit" name="ok" class="btn btn-info btn-fill btn-wd">Kirim</button>
                            </div>
                        </form>
                    <?php } else { ?>
                        <p class="text-center text-muted">Pilih kontak untuk melihat percakapan.</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
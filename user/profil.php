<?php
require_once "inc/header.php";
require_once "inc/links.php";
if (isset($_POST['gantipass'])) {
	$idp = $_POST['tid'];
	$lama = md5($_POST['passlama']); // Disarankan menggunakan password_hash
	$baru = md5($_POST['passbaru']);
	$konfirmasi = md5($_POST['konfirmasi']);

	$caripassword = $pdo->prepare("SELECT * FROM tamu WHERE idtamu=? AND password=?");
	$caripassword->execute([$idp, $lama]);
	$cekpassword = $caripassword->rowCount();

	if ($cekpassword == 0) {
		echo "<script>alert('Password Lama Salah'); document.location.href='#gantipassword';</script>";
	} elseif ($baru != $konfirmasi) {
		echo "<script>alert('Password Baru Tidak Sama'); document.location.href='#gantipassword';</script>";
	} else {
		$update = $pdo->prepare("UPDATE tamu SET password=? WHERE idtamu=?");
		$update->execute([$baru, $idp]);
		echo "<script>alert('Password Berhasil Diganti'); document.location.href='profil';</script>";
	}
}
?>

<div class="container py-5">
	<div class="row justify-content-center">
		<div class="col-md-8 col-lg-6">
			<div class="card shadow-sm">
				<div class="card-body text-center">
					<h2 class="fw-bold">Profil</h2>
					<img src="../simpangambar/<?php echo ($foto != '') ? $foto : 'profil.png'; ?>" class="rounded-circle img-thumbnail mt-3" width="120" height="120">
					<table class="table table-borderless mt-3 text-start">
						<tr>
							<th>Username</th>
							<td><?php echo $username; ?></td>
						</tr>
						<tr>
							<th>Email</th>
							<td><?php echo $email; ?></td>
						</tr>
						<tr>
							<th>Nama Lengkap</th>
							<td><?php echo $nama; ?></td>
						</tr>
						<tr>
							<th>Alamat</th>
							<td><?php echo $alamat; ?></td>
						</tr>
						<tr>
							<th>Telepon</th>
							<td><?php echo $telepon; ?></td>
						</tr>
					</table>
					<a href="editprofil" class="btn btn-primary mt-2">Edit/Upload Foto</a>
					<a href="#gantipassword" class="btn btn-danger mt-2">Ganti Password</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="gantipassword" class="modal fade" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Ubah Password</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form method="post" action="profil">
					<input type="hidden" name="tid" value="<?php echo $id; ?>">
					<div class="mb-3">
						<label class="form-label">Password Lama</label>
						<input type="password" name="passlama" class="form-control" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Password Baru</label>
						<input type="password" name="passbaru" class="form-control" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Konfirmasi Password</label>
						<input type="password" name="konfirmasi" class="form-control" required>
					</div>
					<div class="d-grid gap-2">
						<button type="submit" class="btn btn-success" name="gantipass">Ubah</button>
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php require_once "inc/footer.php"; ?>
<?php
require_once "inc/header.php";

if (isset($_POST['submit'])) {
	$ambil2 = $_POST['txtid'];
	$teks = $_POST['teks'];

	$sqlx = $pdo->query("SELECT * FROM tamu WHERE idtamu=$ambil2");
	$datax = $sqlx->fetch();
	$idt = $datax['idtamu'];
	$user = $datax['username'];

	$sqlsimpan = $pdo->query("INSERT INTO kontak VALUES('', '$idt', '$user', '$teks', '')");
	echo "<script>window.location.replace('kontak.php');</script>";
}
?>

<div class="container mt-4">
	<div class="card">
		<div class="card-header bg-primary text-white text-center">
			<h5>Kontak Admin</h5>
		</div>
		<div class="card-body" style="max-height: 400px; overflow-y: auto;">
			<?php
			$sqly = $pdo->query("SELECT * FROM kontak WHERE idtamu=$ambil");
			while ($datay = $sqly->fetch()) {
				$pesanuser = $datay['pesanuser'];
				$pesanadmin = $datay['pesanadmin'];
			?>
				<?php if (!empty($pesanuser)) { ?>
					<div class="d-flex justify-content-end mb-2">
						<div class="bg-success text-white p-2 rounded" style="max-width: 70%;">
							<?php echo $pesanuser; ?>
						</div>
					</div>
				<?php } ?>

				<?php if (!empty($pesanadmin)) { ?>
					<div class="d-flex justify-content-start mb-2">
						<div class="bg-secondary text-white p-2 rounded" style="max-width: 70%;">
							<strong>Admin:</strong> <?php echo $pesanadmin; ?>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
		<div class="card-footer">
			<form method="post" action="kontak.php">
				<input type="hidden" name="txtid" value="<?php echo $id; ?>">
				<div class="input-group">
					<textarea name="teks" class="form-control" required placeholder="Ketikkan pesan..."></textarea>
					<button type="submit" name="submit" class="btn btn-primary">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php require_once "inc/footer.php"; ?>
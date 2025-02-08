<?php
require_once "inc/header.php";
require_once "inc/links.php";

$ambilx = $_GET['id'];

$sqlx = $pdo->query("SELECT * FROM pemesanan WHERE idpesan='$ambilx'");
$datax = $sqlx->fetch();
$idpesan = $datax['idpesan'];
$nama = $datax['nama'];
$total = $datax['totalbayar'];



?>
<section class="bg-light py-3 py-md-5">

	<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Konfirmasi Pembayaran</h2>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-4 col-md-6 d-flex align-items-center">
				<div class="card border-0 shadow">
					<form method="post" action="../fungsi/prosesbayar" enctype="multipart/form-data">
						<table style="width: 90%;padding: 10px;margin: 10px;">
							<caption style="color: white;">Konfirmasi Pembayaran</caption>
							<tr>
								<td>ID Pemesanan</td>
								<td><input type="text" class="form-control" readonly="readonly" required="required" name="txtid" value="<?php echo $idpesan ?>"></td>
							</tr>
							<tr>
								<td>Nama Lengkap</td>
								<td><input type="text" class="form-control" readonly="readonly" required="required" name="txtnama" value="<?php echo $nama ?>"></td>
							</tr>
							<tr>
								<td>Jumlah Bayar</td>
								<td><input type="text" class="form-control" readonly="readonly" required="required" name="txtjumlah" value="<?php echo $total ?>"></td>
							</tr>
							<tr>
								<td>Bank</td>
								<td>
									<select name="txtbank" required="required" style="font-weight: bold">
										<option hidden="hidden">-Pilih Bank-</option>
										<option>Mandiri</option>
										<option>BCA</option>
										<option>BNI</option>
										<option>BRI</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>No. rekening</td>
								<td><input type="text" class="form-control" required="required" name="txtnorek"></td>
							</tr>
							<tr>
								<td>Nama Pemilik Rekening</td>
								<td><input type="text" class="form-control" required="required" name="txtnamarek"></td>
							</tr>
							<tr>
								<td>Upload Bukti Transfer</td>
								<td><input class="form-control" type="file" required="required" name="txtgambar"></td>
							</tr>
						</table>
						<div class="col-12">
							<div class="d-grid my-3">
								<button type="submit" name="submit" value="Kirim" id="tombol" class="btn btn-primary btn-lg">Bayar</button>
							</div>
						</div>
						<!-- <div class="d-flex">
							<input type="submit" name="submit" value="Kirim" id="tombol" class="btn btn-outline-dark shadow-none me-lg-3 me-2">
						</div> -->
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
require_once "view/footer.php"
?>
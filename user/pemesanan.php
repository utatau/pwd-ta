<?php
require_once "inc/header.php";

if (isset($_POST['ok'])) {
	$in = $_POST['cekin'];
	$out = $_POST['cekout'];
	$type = $_POST['tipex'];

	$sqlxy = $pdo->query("SELECT * FROM kamar WHERE tipe='$type'");
	$dataxy = $sqlxy->fetch();
	$idkamarxy = $dataxy['idkamar'];
	$tipexy = $dataxy['tipe'];
	$jumlahxy = $dataxy['jumlah'];
	$gambarxy = $dataxy['gambar'];
	$hargaxy = $dataxy['harga'];
	$hargafxy = number_format($hargaxy, 0, ',', '.');

	$sqlyx = $pdo->query("SELECT * FROM stokkamar WHERE tipe='$type'");
	$datayx = $sqlyx->fetch();
	$stokyx = $datayx['stok'];
}

date_default_timezone_set("Asia/Makassar");

$today = new DateTime();
$tglpesan = $today->format('Y-m-d H:i:s') . PHP_EOL;
$today->add(new DateInterval('PT5H'));
$jamex = $today->format('Y-m-d H:i:s') . PHP_EOL;

if (isset($_POST['klik'])) {
	$ambilx = $_GET['id'];

	$sqlx = $pdo->query("SELECT * FROM kamar WHERE idkamar='$ambilx'");
	$datax = $sqlx->fetch();
	$idkamar = $datax['idkamar'];
	$tipe = $datax['tipe'];
	$jumlah = $datax['jumlah'];
	$gambar = $datax['gambar'];
	$harga = $datax['harga'];
	$hargaf = number_format($harga, 0, ',', '.');

	$sqly = $pdo->query("SELECT * FROM stokkamar WHERE idkamar='$ambilx'");
	$datay = $sqly->fetch();
	$stok = $datay['stok'];
}
?>

<script type="text/javascript">
	function hitung() {
		var jumlahstok = parseFloat(document.cekstok.stok.value);
		var jumlahpesan = parseFloat(document.cekstok.jum.value);
		var harga = parseFloat(document.cekstok.harga.value);

		var tglsekarang = new Date();
		var dd = tglsekarang.getDate();
		var mm = tglsekarang.getMonth() + 1;
		var yy = tglsekarang.getFullYear();
		if (dd < 10) {
			dd = '0' + dd;
		}
		if (mm < 10) {
			mm = '0' + mm;
		}
		tglsekarang = dd + '/' + mm + '/' + yy;

		var tglin = document.cekstok.tglcekin.value;
		var tglout = document.cekstok.tglcekout.value;


		var tglcin = tglin.split('-');
		var tglcout = tglout.split('-');
		var tglcekk = tglsekarang.split('-');

		var objektgl = new Date();

		var tglmasuk = objektgl.setFullYear(tglcin[0], tglcin[1], tglcin[2]);
		var tglkeluar = objektgl.setFullYear(tglcout[0], tglcout[1], tglcout[2]);
		var cektgl = objektgl.setFullYear(tglcekk[0], tglcekk[1], tglcekk[2]);

		var selisih = (tglkeluar - tglmasuk) / (60 * 60 * 24 * 1000);

		var cek = (tglmasuk - cektgl) / (60 * 60 * 24 * 1000);

		if (jumlahstok < jumlahpesan) {
			alert("Maaf.. Stok Kamar Tidak Cukup");
			document.cekstok.jum.value = "Pilih";
			document.cekstok.total.value = "";
		} else {

			document.cekstok.lama.value = selisih;
			var hitungharga = harga * jumlahpesan * selisih;
			document.cekstok.total.value = hitungharga;
			if ((selisih || hitungharga || cek) < 0) {
				alert("Pilih Tanggal Dengan Benar!!!");
				document.cekstok.lama.value = 0;
				document.cekstok.total.value = 0;
			}
		}
	}
</script>
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Pemesanan Kamar</h2>
<div class="container">
	<div class="row justify-content-center">
		<?php
		if (isset($_POST['ok'])) {
		?>
			<form method="post" action="../fungsi/prosespesan" name="cekstok">
				<div class="col-lg-4 col-md-6 d-flex align-items-center">>
					<div class="card border-0 shadow">
						<td colspan="2" style="width:300px;"><img src="../simpangambar/<?php echo $gambarxy ?>" class="card-img-top"></td>
					</div>
					<div class="col-12">
						<div class="form-floating mb-3">
							<label for="username" class="form-label">Tipe Kamar</label>
							<input class="form-control" type="hidden" name="tglpesan" readonly="true" value="<?php echo $tglpesan ?>">
							<input class="form-control" type="hidden" name="jamexpire" readonly="true" value="<?php echo $jamex ?>">
							<input class="form-control" type="text" name="tipe" readonly="true" value="<?php echo $tipexy ?>">
							<input class="form-control" type="hidden" name="idkamar" readonly="true" value="<?php echo $idkamarxy ?>">
						</div>
					</div>
					<div class="col-12">
						<label for="username" class="form-label">Harga Kamar</label>
						<div class="form-floating mb-3">
							<input class="form-control" type="text" name="harga" readonly="true" value="<?php echo $hargaxy ?>">
							<input class="form-control" type="hidden" name="stok" readonly="true" value=" <?php echo $stokyx ?>">
						</div>
					</div>
					<div class="col-12">
						<label for="Jumlah" class="form-label">Jumlah Kamar</label>
						<div class="form-floating mb-3">
							<select name="jum" onchange="hitung()" required="required" style="font-weight: bold; border: 2px solid #B40301">
								<option>-Pilih-</option>
								<script>
									for (var i = 1; i <= 50; i++) {
										document.write("<option>" + i + "</option>");
									}
								</script>
							</select>
						</div>
					</div>
					<div class="col-12">
						<label for="namalengkap" class="form-label">Nama Lengkap</label>
						<div class="form-floating mb-3">
							<input type="text" name="nama" value="<?php echo $nama ?>">
							<input type="hidden" name="idtamu" readonly="true" value="<?php echo $id ?>">
						</div>
					</div>
					<div class="col-12">
						<label for="namalengkap" class="form-label">Nama Lengkap</label>
						<div class="form-floating mb-3">
							<input type="text" name="alamat" value="<?php echo $alamat ?>">
						</div>
					</div>
					<div class="col-12">
						<label for="namalengkap" class="form-label">No telepon</label>
						<div class="form-floating mb-3">
							<input type="text" name="telepon" value="<?php echo $telepon ?>">
						</div>
					</div>
					<div class="col-12">
						<label for="namalengkap" class="form-label">Tanggal Cekin</label>
						<div class="form-floating mb-3">
							<input type="date" value="<?php echo $in ?>" min="<?php echo date('d-m-Y') ?>" required="required" onchange="hitung()" name="tglcekin" style="font-family: arial">
						</div>
					</div>
					<div class="col-12">
						<label for="namalengkap" class="form-label">Tanggal Cekout</label>
						<div class="form-floating mb-3">
							<input type="date" value="<?php echo $out ?>" required="required" onchange="hitung()" name="tglcekout" style="font-family: arial">
						</div>
					</div>
					<div class="col-12">
						<label for="namalengkap" class="form-label">Lama Menginap</label>
						<div class="form-floating mb-3">
							<input type="text" name="lama" onchange="hitung()" readonly="true" style="width: 100px;"> Malam
						</div>
					</div>
					<div class="col-12">
						<label for="namalengkap" class="form-label">Nama Lengkap</label>
						<div class="form-floating mb-3">
							<input type="text" name="total" onchange="hitung()" readonly="true">
						</div>
					</div>
					<div class="col-12">
						<div class="d-grid my-3">
							<button type="submit" class="btn btn-primary btn-lg">Pesan Kamar</button>
						</div>
					</div>
				</div>
			</form>
		<?php
		}

		if (isset($_POST['klik'])) {
		?>
			<section class="bg-light py-3 py-md-5">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
							<div class="card border border-light-subtle rounded-3 shadow-sm">
								<div class="card-body p-4 p-md-4 p-xl-9">
									<form method="post" action="../fungsi/prosespesan" name="cekstok">
										<table width="100%">
											<tr align="center">
												<td colspan="2" style="width:300px;"><img src="../simpangambar/<?php echo $gambar ?>" width='200px' height='150px' style="border:5px solid #B40301;"></td>
											</tr>
											<tr>
												<td>Tipe Kamar</td>
												<td>
													<input type="hidden" name="tglpesan" readonly="true" value="<?php echo $tglpesan ?>">
													<input type="hidden" name="jamexpire" readonly="true" value="<?php echo $jamex ?>">
													<input type="text" name="tipe" readonly="true" value="<?php echo $tipe ?>">
													<input type="hidden" name="idkamar" readonly="true" value="<?php echo $idkamar ?>">
												</td>
											</tr>
											<tr>
												<td>Harga / Hari</td>
												<td><input type="text" name="harga" readonly="true" value="<?php echo $harga ?>">
													<input type="hidden" name="stok" readonly="true" value=" <?php echo $stok ?>">
												</td>
											</tr>
											<tr>
												<td>Jumlah Kamar</td>
												<td>
													<select name="jum" onchange="hitung()" required="required" style="font-weight: bold; border: 2px solid #B40301">
														<option>Pilih</option>
														<script>
															for (var i = 1; i <= 50; i++) {
																document.write("<option>" + i + "</option>");
															}
														</script>
													</select>
												</td>
											</tr>
											<tr>
												<td>Nama Lengkap</td>
												<td><input class="form-label" type="text" name="nama" value="<?php echo $nama ?>">
													<input type="hidden" name="idtamu" readonly="true" value="<?php echo $id ?>">
												</td>
											</tr>
											<tr>
												<td>Alamat</td>
												<td><input type="text" name="alamat" value="<?php echo $alamat ?>"></td>
											</tr>
											<tr>
												<td>No. Telepon</td>
												<td><input type="text" name="telepon" value="<?php echo $telepon ?>"></td>
											</tr>
											<tr>
												<td>Tanggal Check-In</td>
												<td><input type="date" min="<?php echo date('d-m-Y') ?>" required="required" onchange="hitung()" name="tglcekin" style="font-family: arial"></td>
											</tr>
											<tr>
												<td>Tanggal Check-Out</td>
												<td><input type="date" required="required" onchange="hitung()" name="tglcekout" style="font-family: arial"></td>
											</tr>
											<tr>
												<td>Lama Menginap</td>
												<td><input type="text" name="lama" onchange="hitung()" readonly="true" style="width: 100px;"> Malam</td>
											</tr>
											<tr>
												<td>Total Biaya</td>
												<td><input type="text" name="total" onchange="hitung()" readonly="true"></td>
											</tr>
											<tr>
												<td></td>
												<td>
													<button type="submit" class="btn btn-outline-dark shadow-none me-lg-3 me-2">Pesan Kamar</button>
												</td>
											</tr>
										</table>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

		<?php
		}
		?>

		</center>
	</div>

	<?php
	require_once "inc/footer.php"
	?>
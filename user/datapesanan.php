<?php
require_once "inc/header.php";
require_once "inc/links.php";
?>

<section class="bg-light py-3 py-md-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
				<div class="card border border-light-subtle rounded-3 shadow-sm">
					<div class="card-body p-4 p-md-4 p-xl-9 row">
						<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Data Pesanan</h2>
						<!-- <div id="pemesanan"> -->
						<?php
						include "../fungsi/koneksi.php";
						$sqlx = $pdo->query("SELECT * FROM pemesanan WHERE idtamu = $ambil ORDER BY idpesan DESC");
						while ($datax = $sqlx->fetch()) {
							$idpesan = $datax['idpesan'];
							$tglpesan = $datax['tglpesan'];
							$batasbayar = $datax['batasbayar'];
							$idkamar = $datax['idkamar'];
							$tipe = $datax['tipe'];
							$harga = $datax['harga'];
							$jumlah = $datax['jumlah'];
							$idtamu = $datax['idtamu'];
							$namax = $datax['nama'];
							$alamat = $datax['alamat'];
							$telepon = $datax['telepon'];
							$tglmasuk = $datax['tglmasuk'];
							$tglkeluar = $datax['tglkeluar'];
							$lamahari = $datax['lamahari'];
							$totalbayar = $datax['totalbayar'];
							$status = $datax['status'];

							$tglpesann = date('d/m/Y', strtotime($tglpesan));
							$tglmasukk = date('d/m/Y', strtotime($tglmasuk));
							$tglkeluarr = date('d/m/Y', strtotime($tglkeluar));
							$batasbayarr = date('d/m/Y', strtotime($batasbayar));
							$batasjam = date('H:i:s', strtotime($batasbayar));

							$hargaa = number_format($harga, 0, ",", ".");
							$angka = number_format($totalbayar, 0, ",", ".");
						?>
							<table width="100%">
								<tr align="center">
									<td colspan="2">Kode Transaksi : <?php echo $idpesan ?>
										<input class="form-control shadow-none" type="hidden" name="idd" value="<?php echo $idpesan ?>">
									</td>
								</tr>
								<tr align="center">
									<td colspan="2">
										<?php
										$sqly = $pdo->query("SELECT * FROM kamar WHERE idkamar=$idkamar");
										while ($datay = $sqly->fetch()) {
											$gambary = $datay['gambar'];
										?>
											<img src="../simpangambar/<?php echo $gambary ?>" width='200px' height='120px' style="border:2px solid #B40301;">
										<?php
										}
										?>
									</td>
								</tr>
								<tr>
									<td>Tanggal Pemesanan</td>
									<td class="form-control shadow-none"><?php echo $tglpesann ?></td>
								</tr>
								<tr>
									<td>Tipe Kamar</td>
									<td class="form-control shadow-none"><?php echo $tipe ?></td>
								</tr>
								<tr>
									<td>Harga / Hari</td>
									<td class="form-control shadow-none">Rp. <?php echo $hargaa ?></td>
								</tr>
								<tr>
									<td>Jumlah Kamar</td>
									<td class="form-control shadow-none"><?php echo $jumlah ?></td>
								</tr>
								<tr>
									<td>Nama Lengkap</td>
									<td class="form-control shadow-none"><?php echo $namax ?>
										<input type="hidden" name="namax" value="<?php echo $namax ?>">
									</td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td class="form-control shadow-none"><?php echo $alamat ?></td>
								</tr>
								<tr>
									<td>No. Telepon</td>
									<td class="form-control shadow-none"><?php echo $telepon ?></td>
								</tr>
								<tr>
									<td>Tanggal Check-In</td>
									<td class="form-control shadow-none"><?php echo $tglmasukk ?></td>
								</tr>
								<tr>
									<td>Tanggal Check-Out</td>
									<td class="form-control shadow-none"><?php echo $tglkeluarr ?></td>
								</tr>
								<tr>
									<td>Lama Menginap</td>
									<td class="form-control shadow-none"><?php echo $lamahari ?> Hari</td>
								</tr>
								<tr style="background:rgb(89, 153, 182);" align="center">
									<td style="color: white">Total Bayar</td>
									<td style="color: white">Rp. <?php echo $angka ?>
										<input class="form-control shadow-none" type="hidden" name="total" value="<?php echo $totalbayar ?>">
									</td>
								</tr>
								<tr>
									<?php
									if ($status == "Berhasil") {

										echo '<td colspan="2" align="center" style="background: green;color: white;">Status Transaksi :';
									} else if ($status == "Pending...") {
										echo '<td colspan="2" align="center" style="background: blue;color: white;">Status Transaksi :';
									} else {
										echo '<td colspan="2" align="center" style="background: black;color: white;">Status Transaksi :';
									}
									date_default_timezone_set("Asia/Makassar");
									$tglsekarang = date('Y-m-d H:i:s');
									if ($tglsekarang > $batasbayar) {
										echo "Dibatalkan";
										$updatestatus = $pdo->query("UPDATE pemesanan SET status='Dibatalkan' WHERE idpesan=$idpesan");
									} else {
										echo $status;
										if ($status == "Pending...") {

											$sqly = $pdo->query("SELECT * FROM pembayaran WHERE idpesan='$idpesan'");
											$datay = $sqly->fetch();
											$idbayar = $datay['idpesan'];
											if ($idbayar == $idpesan) {
												echo "<br><p style='background: yellow; color: black'>Menunggu Verifikasi Pembayaran</p>";
											} else {
												echo "<br>Menunggu Proses Pembayaran<br>
							<p style='background:rgb(89, 153, 182);'>Segera Lakukan Pembayaran Sebelum :</p>
							<p style='background:rgb(89, 153, 182);'>Tanggal : $batasbayarr <br>Jam : $batasjam</p>
							Jika Tidak Transaksi Anda Dibatalkan<br>";
									?>
												<a href="bayar.php?id=<?php echo $idpesan ?>"><button id="bbayar" style="width:150px;background:yellow;color:black;font-weight:bold;padding:4px;border:2px solid white; margin-bottom: 3px;">Konfirmasi Pembayaran</button></a>
									<?php
											}
										}
									}

									?>
									</td>
								</tr>
							</table>

						<?php
						}
						?>
						</center>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</section>

<?php
require_once "inc/footer.php"
?>
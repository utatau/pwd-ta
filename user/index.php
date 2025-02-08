<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HotelKu.Co - HOME</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
	<?php require('inc/links.php') ?>
	<script type="text/javascript">
		function pilih() {
			var type = document.opsi.tipe.value;
			var teks = document.getElementById('selek').options[document.getElementById('selek').selectedIndex].text;
			document.opsi.harga.value = type;
			document.opsi.tipex.value = teks;

		}
	</script>

	<style>
		.Availability-form {
			margin-top: -50px;
			z-index: 2;
			position: relative;
		}

		@media screen and (max-width: 575px) {
			.Availability-form {
				margin-top: 0px;
				padding: 0 35px;
			}
		}
	</style>
</head>

<body class="bg-light">
	<?php
	require_once "inc/header.php";
	?>
	<!-- carousel -->
	<div class="container-fluid px-lg-4 mt-4">
		<div class="swiper swiper-container">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<img src="../images/carousel/1.png" class="w-100 d-block">
				</div>
				<div class="swiper-slide">
					<img src="../images/carousel/2.png" class="w-100 d-block">
				</div>
				<div class="swiper-slide">
					<img src="../images/carousel/3.png" class="w-100 d-block">
				</div>
				<div class="swiper-slide">
					<img src="../images/carousel/4.png" class="w-100 d-block">
				</div>
				<div class="swiper-slide">
					<img src="../images/carousel/5.png" class="w-100 d-block">
				</div>
				<div class="swiper-slide">
					<img src="../images/carousel/6.png" class="w-100 d-block">
				</div>
			</div>
		</div>
	</div>
	<!-- chek room -->

	<div class="container Availability-form">
		<div class="row">
			<div class="col-lg-12 bg-white shadow p-4 rounded">
				<h5 class="mb-4">Reservasi</h5>
				<form method="post" action="user/pemesanan.php" name="opsi">
					<div class="row align-items-end">
						<div class="col-lg-3 mb-3">
							<label class="form-label" style="font-weight: 500;">Check-in</label>
							<input type="date" name="cekin" class="form-control shadow-none">
						</div>
						<div class="col-lg-3 mb-3">
							<label class="form-label" style="font-weight: 500;">Check-out</label>
							<input type="date" name="cekout" class="form-control shadow-none">
						</div>
						<div class="col-lg-3 mb-3">
							<label class="form-label" style="font-weight: 500;">Adult</label>
							<select name="tipe" id="selek" required="required" onchange="pilih()" class="form-select shadow-none">
								<option selected="selected" disabled="disabled">-Pilih-</option>
								<option value="Rp 410.000">Superior</option>
								<option value="Rp 450.000">Deluxe</option>
								<option value="Rp 700.000">Junior Suite</option>
								<option value="Rp 1.200.000">Executive</option>
							</select>
						</div>
						<div class="col-lg-3 mb-3">
							<label class="form-label" style="font-weight: 500;">Harga</label>
							<input type="text" name="harga" class="form-control shadow-none" onchange="pilih()">
							<input type="hidden" name="tipex" style="width: 100px;" onchange="pilih()">
						</div>
						<div class="col-lg-3 mb-3">
							<button type="submit" name="ok" value="Pesan" id="tombol" class="btn text-white shadow-none custom-bg">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>


	<!-- room -->

	<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>
	<div class="container">
		<div class="row justify-content-center">
			<?php
			$sql = $pdo->query("SELECT * FROM kamar");
			while ($data = $sql->fetch()) {
				$id = $data['idkamar'];
				$tipe = $data['tipe'];
				$jumlah = $data['jumlah'];
				$harga = $data['harga'];
				$gambar = $data['gambar'];

				$angka = number_format($harga, 0, ",", ".");

				$sqly = $pdo->query("SELECT * FROM stokkamar WHERE idkamar=$id");
				while ($datay = $sqly->fetch()) {
					$stok = $datay['stok'];
			?>
					<div class="col-lg-4 col-md-6 d-flex align-items-stretch">
						<div class="card border-0 shadow">
							<img src="../simpangambar/<?php echo $gambar ?>" class="card-img-top">
							<div class="card-body">
								<h5><?php echo $tipe ?></h5>
								<h6 class="mb-4">Rp. <?php echo $angka ?> permalam</h6>
								<span class="badge rounded-pill bg-light text-dark text-wrap">
									<?php echo $stok ?> Kamar
								</span>
								<a href="user/pemesanan" class="btn btn-dark w-100">Pesan</a>
							</div>
						</div>
					</div>
			<?php
				}
			}
			?>
		</div>
	</div>

	<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR FACILITIES</h2>
	<div class="container">
		<div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
			<div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
				<img src="../images/features/wifi.svg" width="80px">
				<h5 class="mt-3">Wifi</h5>
			</div>
			<div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
				<img src="../images/features/IMG_47816.svg" width="80px">
				<h5 class="mt-3">SPA</h5>
			</div>
			<div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
				<img src="../images/features/IMG_41622.svg" width="80px">
				<h5 class="mt-3">Smart TV</h5>
			</div>
			<div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
				<img src="../images/features/vecteezy_swimming-icon-design-template_7634817.jpg" width="80px">
				<h5 class="mt-3">Pool</h5>
			</div>
			<div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
				<img src="../images/features/1106_U1RVRElPIEtBVCAwODUtMTQ1.jpg" width="80px">
				<h5 class="mt-3">GYM</h5>
			</div>
			<div class="col-lg-12 text-center mt-5">
				<a href="#" class="btn btn-outline-dark rounded-0 fw-bold shadow none">More Facilities >>></a>
			</div>
		</div>
	</div>

	<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">TESTIMONIALS</h2>

	<div class="container mt-5">
		<div class="swiper swiper-testimonials">
			<div class="swiper-wrapper mb-5 ">
				<div class="swiper-slide bg-white p-4">
					<div class="profile d-flex align-items-center mb-3">
						<img src="../images/features/star.svg" width="30px">
						<h6 class="m-0 ms-2">Random User1</h6>
					</div>
					<p>
						Lorem ipsum dolor sit amet consectetur adipisicing elit.
						Facere, voluptas rem distinctio adipisci nihil possimus
						obcaecati omnis earum delectus iste.
					</p>
					<div class="rating">
						<i class="bi bi-star-fill text-warning"></i>
						<i class="bi bi-star-fill text-warning"></i>
						<i class="bi bi-star-fill text-warning"></i>
						<i class="bi bi-star-half text-warning"></i>
					</div>
				</div>
				<div class="swiper-slide bg-white p-4">
					<div class="profile d-flex align-items-center mb-3">
						<img src="../images/features/star.svg" width="30px">
						<h6 class="m-0 ms-2">Random User1</h6>
					</div>
					<p>
						Lorem ipsum dolor sit amet consectetur adipisicing elit.
						Facere, voluptas rem distinctio adipisci nihil possimus
						obcaecati omnis earum delectus iste.
					</p>
					<div class="rating">
						<i class="bi bi-star-fill text-warning"></i>
						<i class="bi bi-star-fill text-warning"></i>
						<i class="bi bi-star-fill text-warning"></i>
						<i class="bi bi-star-half text-warning"></i>
					</div>
				</div>
				<div class="swiper-slide bg-white p-4">
					<div class="profile d-flex align-items-center mb-3">
						<img src="../images/features/star.svg" width="30px">
						<h6 class="m-0 ms-2">Random User1</h6>
					</div>
					<p>
						Lorem ipsum dolor sit amet consectetur adipisicing elit.
						Facere, voluptas rem distinctio adipisci nihil possimus
						obcaecati omnis earum delectus iste.
					</p>
					<div class="rating">
						<i class="bi bi-star-fill text-warning"></i>
						<i class="bi bi-star-fill text-warning"></i>
						<i class="bi bi-star-fill text-warning"></i>
						<i class="bi bi-star-half text-warning"></i>
					</div>
				</div>
			</div>
			<div class="swiper-pagination"></div>
		</div>
	</div>

	<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">REACH US</h2>

	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
				<iframe class="w-100 rounded" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126906.93358124908!2d106.89097475715384!3d-6.284533052568554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698c6900964f69%3A0xd00495351896398!2sBekasi%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1735206375668!5m2!1sen!2sid" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
			<div class="col-lg-4 col-md-4">
				<div class="bg-white p-4 rounded mb-4">
					<h5>Call Us</h5>
					<a href="tel: +6287581792094" class="d-inline-block mb-2 text-decoration-none text-dark">
						<i class="bi bi-telephone-fill"></i> +6287581792094
					</a>
					<br>
					<a href="tel: +6287581792094" class="d-inline-block text-decoration-none text-dark">
						<i class="bi bi-telephone-fill"></i> +6287581792094
					</a>
				</div>
				<div class="bg-white p-4 rounded mb-4">
					<h5>Follow Us</h5>
					<a href="https://www.instagram.com/ramatrihandikamalau28/" class="d-inline-block mb- 3">
						<span class="badge bg-light text-dark fs-6 p-2">
							<i class="bi bi-instagram me-1"></i> Instagram
						</span>
					</a>
					<br>
					<a href="https://www.instagram.com/ramatrihandikamalau28/" class="d-inline-block mb- 3">
						<span class="badge bg-light text-dark fs-6 p-2">
							<i class="bi bi-envelope-fill me-1"></i> Email
						</span>
					</a>
					<br>
					<a href="https://www.instagram.com/ramatrihandikamalau28/" class="d-inline-block">
						<span class="badge bg-light text-dark fs-6 p-2">
							<i class="bi bi-facebook me-1"></i> Facebook
						</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<?php require('inc/footer.php') ?>
	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
	<script>
		var swiper = new Swiper(".swiper-container", {
			spaceBetween: 30,
			effect: "fade",
			loop: true,
			autoplay: {
				delay: 3500,
				disableOnInteraction: false,
			}
		});

		var swiper = new Swiper(".swiper-testimonials", {
			effect: "coverflow",
			grabCursor: true,
			centeredSlides: true,
			slidesPerView: "auto",
			slidesPerView: "3",
			loop: true,
			coverflowEffect: {
				rotate: 50,
				stretch: 0,
				depth: 100,
				modifier: 1,
				slideShadows: false,
			},
			pagination: {
				el: ".swiper-pagination",
			},
			breakpoints: {
				320: {
					slidesPerView: 1,
				},
				640: {
					slidesPerView: 1,
				},
				768: {
					slidesPerView: 2,
				},
				1024: {
					slidesPerView: 3,
				},
			}
		});
	</script>
</body>

</html>
<?php
include "koneksi.php";

if (isset($_POST['ok'])) {
	if (!isset($_POST['username']) || !isset($_POST['tekss'])) {
		die("Error: Data tidak lengkap.");
	}

	$username = $_POST['username'];
	$teks = $_POST['tekss'];

	$stmt = $pdo->prepare("SELECT idtamu FROM tamu WHERE username = ?");
	$stmt->execute([$username]);
	$data = $stmt->fetch();

	if ($data) {
		$idtamu = $data['idtamu'];

		$stmt_insert = $pdo->prepare("INSERT INTO kontak (idtamu, username, pesanuser, pesanadmin) VALUES (?, ?, '', ?)");
		if ($stmt_insert->execute([$idtamu, $username, $teks])) {
			echo "<script>window.location.replace('../kontak?user=" . urlencode($username) . "');</script>";
		} else {
			echo "Gagal mengirim pesan.";
		}
	} else {
		echo "Error: User tidak ditemukan!";
	}
}

<div class="sidebar" data-background-color="white" data-active-color="danger">

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                HotelKu.co Admin
            </a>
        </div>

        <ul class="nav">
            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">
                <a href="index.php">
                    <i class="ti-panel"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'inputkamar.php') ? 'active' : ''; ?>">
                <a href="inputkamar.php">
                    <i class="ti-notepad"></i>
                    <p>Input Data Kamar</p>
                </a>
            </li>
            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'datakamar.php') ? 'active' : ''; ?>">
                <a href="datakamar.php">
                    <i class="ti-notepad"></i>
                    <p>Data Kamar</p>
                </a>
            </li>
            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'stokkamar.php') ? 'active' : ''; ?>">
                <a href="stokkamar.php">
                    <i class="ti-notepad"></i>
                    <p>Stok Kamar</p>
                </a>
            </li>
            <hr>
            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'datauser.php') ? 'active' : ''; ?>">
                <a href="datauser.php">
                    <i class="ti-id-badge"></i>
                    <p>Data User</p>
                </a>
            </li>

            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'pembayaran.php') ? 'active' : ''; ?>">
                <a href="databayar.php">
                    <i class="ti-credit-card"></i>
                    <p>Data Pembayaran</p>
                </a>
            </li>
            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'konfirmasi.php') ? 'active' : ''; ?>">
                <a href="konfirmasi.php">
                    <i class="ti-wallet"></i>
                    <p>Konfirmasi Pesanan</p>
                </a>
            </li>
            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'transaksiberhasil.php') ? 'active' : ''; ?>">
                <a href="transaksiberhasil.php">
                    <i class="ti-shopping-cart"></i>
                    <p>Transaksi Sukses</p>
                </a>
            </li>
            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'transaksibatal.php') ? 'active' : ''; ?>">
                <a href="transaksibatal.php">
                    <i class="ti-shopping-cart"></i>
                    <p>Transaksi Batal</p>
                </a>
            </li>
            <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'kontak.php') ? 'active' : ''; ?>">
                <a href="kontak.php">
                    <i class="ti-comment"></i>
                    <p>Kontak</p>
                </a>
            </li>
        </ul>
    </div>
</div>
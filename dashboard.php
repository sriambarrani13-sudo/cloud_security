<?php
session_start();
if ($_POST['kode'] == $_SESSION['otp']) {
    echo "<h1 style='color:lime;'>✅ Login Berhasil!</h1>";
    echo "<p>Selamat datang, <b>{$_SESSION['username']}</b> (Role: {$_SESSION['role']})</p>";

    // Role-based access control
    if ($_SESSION['role'] == "Admin") {
        echo "<ul>
                <li>Kelola Data Siswa</li>
                <li>Kelola Transaksi</li>
                <li>Laporan Sistem</li>
              </ul>";
    } elseif ($_SESSION['role'] == "Guru") {
        echo "<ul>
                <li>Lihat Status SPP Murid</li>
                <li>Lihat Saldo Tabungan Murid</li>
              </ul>";
    } elseif ($_SESSION['role'] == "Orangtua") {
        echo "<ul>
                <li>Lihat Status Pembayaran Anak</li>
                <li>Lihat Saldo Tabungan Anak</li>
                <li>Upload Bukti Pembayaran</li>
              </ul>";
    }
} else {
    echo "<h1 style='color:red;'>❌ Kode OTP salah! Akses ditolak.</h1>";
}
?>

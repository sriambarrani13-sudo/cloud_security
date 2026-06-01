<?php
session_start();

// cek jika tombol logout ditekan
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

if (isset($_POST['kode']) && isset($_SESSION['otp'])) {
    if ($_POST['kode'] == $_SESSION['otp']) {
        $username = $_SESSION['username'];
        $role = $_SESSION['role'];
        ?>
        <!DOCTYPE html>
        <html>
        <head>
          <title>Dashboard Siswa - Cloud Security & Identity Management</title>
          <style>
            body {
              margin: 0;
              font-family: 'Poppins', Arial, sans-serif;
              display: flex;
              height: 100vh;
              background: #f5f5f5;
            }
            .sidebar {
              width: 220px;
              background: linear-gradient(180deg, #0a0f2c, #1a2a6c);
              color: #fff;
              padding: 20px;
              box-shadow: 4px 0 12px rgba(0,0,0,0.3);
              display: flex;
              flex-direction: column;
              justify-content: space-between;
            }
            .sidebar h2 {
              margin-bottom: 15px;
              text-align: center;
              font-size: 16px; /* kecilin judul */
              font-weight: normal;
            }
            .menu a {
              display: block;
              color: #fff;
              text-decoration: none;
              padding: 10px;
              margin: 6px 0;
              border-radius: 6px;
              transition: 0.3s;
              font-size: 14px;
            }
            .menu a:hover {
              background: #00bfff;
            }
            .logout a {
              display: block;
              background: #b21f1f;
              color: #fff;
              text-decoration: none;
              padding: 10px;
              border-radius: 6px;
              font-weight: bold;
              text-align: center;
              transition: 0.3s;
            }
            .logout a:hover {
              background: #ff4040;
            }
            .content {
              flex: 1;
              padding: 30px;
            }
            .content h1 {
              color: #1a2a6c;
              margin-bottom: 10px;
            }
            .note {
              margin-top: 20px;
              font-size: 14px;
              color: #333;
              background: #f9f9f9;
              padding: 12px;
              border-left: 4px solid #1a2a6c;
              border-radius: 6px;
              max-width: 450px; /* batasi lebar catatan */
              line-height: 1.5;
            }
          </style>
        </head>
        <body>
          <div class="sidebar">
            <div>
              <h2>📊 Dashboard Siswa</h2>
              <div class="menu">
                <?php
                if ($role == "Admin") {
                    echo '<a href="#">Kelola Data Siswa</a>
                          <a href="#">Kelola Transaksi</a>
                          <a href="#">Laporan Sistem</a>
                          <a href="#">Manajemen User</a>
                          <a href="#">Pengaturan Sistem</a>
                          <a href="#">Backup & Restore</a>';
                } elseif ($role == "Guru") {
                    echo '<a href="#">Lihat Status SPP Murid</a>
                          <a href="#">Lihat Saldo Tabungan Murid</a>
                          <a href="#">Laporan Kelas</a>
                          <a href="#">Absensi Murid</a>';
                } elseif ($role == "Orangtua") {
                    echo '<a href="#">Lihat Status Pembayaran Anak</a>
                          <a href="#">Lihat Saldo Tabungan Anak</a>
                          <a href="#">Upload Bukti Pembayaran</a>
                          <a href="#">Riwayat Pembayaran</a>';
                }
                ?>
              </div>
            </div>
            <div class="logout">
              <a href="?logout=true">Logout</a>
            </div>
          </div>
          <div class="content">
            <h1>✅ Login Berhasil!</h1>
            <p>Selamat datang, <b><?php echo $username; ?></b> (Role: <?php echo $role; ?>)</p>

            <!-- Catatan penting -->
            <div class="note">
              <strong>Catatan Penting:</strong><br>
              Dashboard ini adalah simulasi penerapan <b>Cloud Security & Identity Management</b>.  
              Setiap role memiliki hak akses berbeda untuk menjaga keamanan data.  
              Admin mengelola sistem penuh, Guru fokus pada laporan kelas,  
              dan Orangtua hanya mengakses informasi anak.  
              Inilah contoh nyata konsep <i>Identity Management</i>.
            </div>
          </div>
        </body>
        </html>
        <?php
    } else {
        echo "<h1 style='color:red;'>❌ Kode OTP salah! Akses ditolak.</h1>";
    }
} else {
    echo "<h1 style='color:orange;'>⚠️ Akses langsung ke dashboard tidak diperbolehkan. Silakan login dulu.</h1>";
}
?>

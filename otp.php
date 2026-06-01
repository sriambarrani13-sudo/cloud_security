<?php
session_start();

if (!isset($_SESSION['otp'])) {
    echo "<h1 style='color:orange;'>⚠️ Akses langsung ke halaman OTP tidak diperbolehkan. Silakan login dulu.</h1>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Verifikasi OTP - Cloud Security</title>
  <style>
    body {
      background: #f5f5f5; /* putih abu lembut */
      font-family: 'Poppins', Arial, sans-serif;
      color: #333;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .otp-box {
      background: #fff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
      width: 350px;
      text-align: center;
    }
    .otp-box h2 {
      margin-bottom: 20px;
      color: #1a2a6c;
    }
    .otp-code {
      font-size: 20px;
      font-weight: bold;
      color: #1a2a6c;
      margin: 15px 0;
    }
    .form-input, button {
      width: 100%;
      padding: 12px;
      margin: 12px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
      box-sizing: border-box;
    }
    button {
      background: #1a2a6c;
      color: #fff;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
    }
    button:hover { background: #0056b3; }
    .note {
      margin-top: 20px;
      font-size: 13px;
      color: #555;
      text-align: left;
      background: #f9f9f9;
      padding: 10px;
      border-left: 4px solid #1a2a6c;
      border-radius: 6px;
    }
  </style>
</head>
<body>
 <div class="otp-box">
  <h2>🔐 Verifikasi OTP</h2>
  <p class="otp-code">Kode OTP kamu: <?php echo $_SESSION['otp']; ?></p>
  <form action="dashboard.php" method="POST">
    <input class="form-input" type="number" name="kode" placeholder="Masukkan Kode OTP" required>
    <button type="submit">Verifikasi</button>
  </form>
  <!-- Catatan penting -->
  <div class="note">
    <strong>Catatan Penting:</strong><br>
    OTP ini adalah bagian dari sistem <b>Cloud Security & Identity Management</b>, 
    berfungsi sebagai verifikasi dua langkah untuk memastikan identitas pengguna 
    dan menjaga keamanan data sebelum masuk ke dashboard.
  </div>
 </div>
</body>
</html>

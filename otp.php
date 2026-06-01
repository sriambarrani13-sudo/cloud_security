<?php
session_start();

// Simulasi akun dengan role
$akun = [
    "admin" => ["password" => "cloud123", "role" => "Admin"],
    "guru"  => ["password" => "secure456", "role" => "Guru"],
    "ortu"  => ["password" => "parent789", "role" => "Orangtua"]
];

$username = $_POST['username'];
$password = $_POST['password'];

if (isset($akun[$username]) && $akun[$username]["password"] == $password) {
    $_SESSION['otp'] = rand(100000, 999999);
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $akun[$username]["role"];
    echo "<h2 style='color:white;background:#1a2a6c;padding:20px;'>Kode OTP dikirim ke perangkat Anda: <b>{$_SESSION['otp']}</b></h2>";
    echo "<form action='dashboard.php' method='POST'>
            <input type='number' name='kode' placeholder='Masukkan Kode OTP'>
            <button type='submit'>Verifikasi</button>
          </form>";
} else {
    echo "<h2 style='color:red;'>Username atau Password salah!</h2>";
}
?>

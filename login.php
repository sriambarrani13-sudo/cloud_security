<?php
session_start();

// Daftar akun demo pakai array
$users = [
  ['username' => 'admin', 'password' => 'cloud123', 'role' => 'admin'],
  ['username' => 'guru', 'password' => 'secure456', 'role' => 'guru'],
  ['username' => 'orangtua', 'password' => 'parent789', 'role' => 'orangtua']
];

// Kalau form login dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $found = false;
    foreach ($users as $user) {
        if ($user['username'] == $username && $user['password'] == $password) {
            $_SESSION['role'] = $user['role'];
            $_SESSION['username'] = $user['username'];
            $found = true;

            // Generate OTP random 6 digit
            $_SESSION['otp'] = rand(100000, 999999);

            // Redirect ke otp.php
            header("Location: otp.php");
            exit;
        }
    }
    if (!$found) {
        $error = "Username atau Password salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Cloud Security & Identity Management</title>
  <style>
    body {
      background: linear-gradient(135deg, #0a0f2c, #1a2a6c);
      font-family: Arial, sans-serif;
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-box {
      background: rgba(255,255,255,0.1);
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 25px #00bfff;
      width: 350px;
      text-align: center;
    }
    .login-box h2 {
      margin-bottom: 20px;
    }
    .form-input, button {
      width: 100%;
      padding: 12px;
      margin: 12px 0;
      border: none;
      border-radius: 8px;
      font-size: 14px;
      box-sizing: border-box;
    }
    .form-input {
      box-shadow: inset 0 2px 5px rgba(0,0,0,0.3);
    }
    button {
      background: #00bfff;
      color: #fff;
      font-weight: bold;
      cursor: pointer;
      box-shadow: 0 4px 10px rgba(0,0,0,0.4);
      transition: 0.3s;
    }
    button:hover { background: #0056b3; box-shadow: 0 0 12px #00bfff; }
    .error { color: #ff8080; font-size: 14px; }
  </style>
</head>
<body>
 <div class="login-box">
  <h2>🔐 Cloud Security & Identity Management</h2>
  <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
  <form method="POST">
    <input class="form-input" type="text" name="username" placeholder="Username" required>
    <input class="form-input" type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
  </form>

  <!-- Tambahan keterangan akun -->
  <div style="margin-top:15px; font-size:14px; color:#ccc;">
    <p><strong>🔐 Akun Demo:</strong></p>
    <p>Admin → <em>cloud123</em></p>
    <p>Guru → <em>secure456</em></p>
    <p>Orangtua → <em>parent789</em></p>
  </div>
</div>
</body>
</html>

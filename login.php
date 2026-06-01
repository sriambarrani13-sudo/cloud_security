<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Cloud Security Dashboard</title>
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
      width: 320px;
      text-align: center;
    }
    input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: none;
      border-radius: 5px;
    }
    button {
      width: 100%;
      padding: 10px;
      background: #00bfff;
      border: none;
      border-radius: 5px;
      color: #fff;
      font-weight: bold;
      cursor: pointer;
    }
    button:hover { background: #0056b3; }
  </style>
</head>
<body>
 <div class="login-box">
  <h2>Cloud Security Dashboard</h2>
  <form action="otp.php" method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
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

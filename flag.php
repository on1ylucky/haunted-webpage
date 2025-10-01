<?php
session_start();
if (empty($_SESSION['logged_in'])) {
  header('Location: login.html');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Flag</title>
  <style>
    body{background:#000;color:#fff;text-align:center;padding:90px 16px;font-family:'Courier New',monospace}
    .box{display:inline-block;padding:24px;background:rgba(0,0,0,.75);border-radius:10px}
    .flag{margin-top:10px;display:inline-block;padding:10px 14px;background:#111;border-radius:8px;color:#ffdf5d;font-weight:700}
    a{color:#ff6347}
  </style>
</head>
<body>
  <div class="box">
    <h1>Congratulations!</h1>
    <p>You have passed the spectral gate, <?php echo $_SESSION['player'] ?? 'traveler'; ?>.</p>
    <div class="flag">The flag is: <code>hackoween{f0und m3}</code></div>
    <p style="margin-top:14px"><a href="logout.php">Log out</a></p>
  </div>
</body>
</html>

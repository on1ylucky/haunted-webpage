<?php
// flag.php
// IMPORTANT: no whitespace or BOM before this opening tag
session_start();

// debug helper (comment out in production):
// if you want to check session contents, uncomment the next line:
// var_dump($_SESSION); exit;

if (empty($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Not logged in — redirect to login page
    header('Location: login.html');
    exit;
}

// At this point session is valid
$player = isset($_SESSION['player']) ? $_SESSION['player'] : 'traveler';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Flag</title>
  <style>
    body{background:#000;color:#fff;text-align:center;padding:90px 16px;font-family:monospace}
    .box{display:inline-block;padding:24px;background:rgba(0,0,0,.75);border-radius:10px}
    .flag{margin-top:10px;display:inline-block;padding:10px 14px;background:#111;border-radius:8px;color:#ffdf5d;font-weight:700}
  </style>
</head>
<body>
  <div class="box">
    <h1>Congratulations!</h1>
    <p>You have passed the spectral gate, <?php echo $player; ?>.</p>
    <div class="flag">The flag is: <code>hackoween{f0und m3}</code></div>
    <p style="margin-top:14px"><a href="logout.php">Log out</a></p>
  </div>
</body>
</html>

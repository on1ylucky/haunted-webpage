<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Flag</title>
<style>
body { background:black; color:white; text-align:center; padding-top:100px; font-family:monospace; }
.flagbox { display:inline-block; padding:20px; background:rgba(0,0,0,0.8); border-radius:8px; }
.flag { margin-top:12px; padding:10px; background:#111; border-radius:6px; display:inline-block; color:#ffdf5d; font-weight:bold; }
</style>
</head>
<body>
<div class="flagbox">
    <h1>Congratulations!</h1>
    <p>You have passed the spectral gate.</p>
    <div class="flag">The flag is: <code>hackoween{f0und m3}</code></div>
    <p style="margin-top:16px;"><a href="logout.php" style="color:#ff6347;text-decoration:none;">Log out</a></p>
</div>
</body>
</html>

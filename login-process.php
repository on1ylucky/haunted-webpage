<?php
// login-process.php
// IMPORTANT: no whitespace or BOM before this opening tag

session_start();

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    echo "Method Not Allowed";
    exit;
}

// Basic input retrieval + trimming
$u = isset($_POST['username']) ? trim($_POST['username']) : '';
$p = isset($_POST['password']) ? trim($_POST['password']) : '';

// Replace with your expected values for the CTF
$EXPECTED_USER = 'ghostbuster24';
$EXPECTED_PASS = 'h4untedh4cker10';

// Simple authentication (CTF usage — ok). Use hashes for production.
if ($u === $EXPECTED_USER && $p === $EXPECTED_PASS) {
    // regenerate id first for session fixation protection
    session_regenerate_id(true);

    // set session markers that flag.php will check
    $_SESSION['logged_in'] = true;
    $_SESSION['player'] = htmlspecialchars($u, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    // redirect to protected page
    header('Location: flag.php');
    exit;
}

// Authentication failed
http_response_code(401);
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8"><title>Access Denied</title></head>
<body style="background:black;color:white;text-align:center;padding:60px;font-family:monospace;">
  <h1>Access Denied</h1>
  <p>The spirits do not recognize you...</p>
  <p><a href="login.html" style="color:#ff6347">Return to login</a></p>
</body>
</html>
